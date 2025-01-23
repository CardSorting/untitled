<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerateStickerRequest;
use App\Services\GoAPIService;
use App\Contracts\LoadingStateInterface;
use Illuminate\Http\RedirectResponse;
use App\Models\Sticker;
use App\Jobs\CheckImageGenerationStatus;

class StickerController extends Controller
{
    protected $goAPIService;
    protected $loadingStateService;

    public function __construct(GoAPIService $goAPIService, LoadingStateInterface $loadingStateService)
    {
        $this->goAPIService = $goAPIService;
        $this->loadingStateService = $loadingStateService;
        $this->middleware(['auth']);
    }

    public function index()
    {
        $stickers = auth()->user()->stickers()->latest()->paginate(12);
        return view('stickers.index', compact('stickers'));
    }

    public function create()
    {
        $expressions = [
            'hype' => '😊 Hype',
            'tilted' => '😠 Tilted',
            'gg' => '😎 GG',
            'sadge' => '😢 Sadge',
            'clutch' => '😮 Clutch',
            'pog' => '😲 Pog',
            'facepalm' => '🤦 Facepalm',
            'monkas' => '😱 Monkas',
            'ez' => '😏 EZ',
            'nope' => '🙅 Nope',
            'sleepy' => '😴 Sleepy',
            'blush' => '😊 Blush',
            'surprise' => '😮 Surprise',
            'laugh' => '😂 Laugh',
            'determined' => '😤 Determined',
        ];

        return view('stickers.create', compact('expressions'));
    }

    public function store(GenerateStickerRequest $request): RedirectResponse
    {
        try {
            $data = $request->validated();
            
            // Build prompt with custom style if provided
            $prompt = "{$data['expression']} {$data['subject']}";
            if (!empty($data['custom_style'])) {
                $prompt .= ", {$data['custom_style']}";
            }

            // Start loading state
            $loadingState = $this->loadingStateService->startLoading([
                'message' => 'Initializing sticker generation...',
                'progress' => 0,
                'substages' => [
                    'Analyzing your creative vision',
                    'Gathering artistic inspiration',
                    'Preparing the digital canvas',
                    'Setting up creative elements'
                ]
            ]);

            // Create sticker record first
            $sticker = Sticker::create([
                'user_id' => auth()->id(),
                'expression' => $data['expression'],
                'subject' => $data['subject'],
                'custom_style' => $data['custom_style'] ?? null,
                'status' => Sticker::STATUS_PROCESSING,
                'loading_state_id' => $loadingState->id
            ]);

            // Initiate async image generation
            $response = $this->goAPIService->generateImage([
                'prompt' => $prompt,
                'aspect_ratio' => '1:1',
                'process_mode' => 'relax'
            ]);

            // Update loading state
            $this->loadingStateService->updateLoading($loadingState->id, [
                'message' => 'Crafting your sticker...',
                'progress' => 25,
                'substages' => [
                    'Sketching initial composition',
                    'Developing core elements',
                    'Adding artistic flourishes',
                    'Refining visual details'
                ]
            ]);

            // Update sticker with task ID and status
            $sticker->update([
                'status' => Sticker::STATUS_PROCESSING,
                'metadata' => [
                    'task_id' => $response['task_id'],
                    'started_at' => now(),
                    'prompt' => $prompt
                ]
            ]);

            // Dispatch status check job
            CheckImageGenerationStatus::dispatch($response['task_id'], $sticker->id)
                ->delay(now()->addSeconds(10));

            return redirect()->route('stickers.show', $sticker)
                ->with('success', 'Sticker generation started! Check back soon.');
        } catch (\Exception $e) {
            // Update sticker status if it exists
            if (isset($sticker)) {
                $sticker->update(['status' => 'failed']);
            }
            
            return back()
                ->withInput()
                ->with('error', 'Failed to generate sticker: ' . $e->getMessage());
        }
    }

    public function show(Sticker $sticker)
    {
        $this->authorize('view', $sticker);
        
        // Get loading state if exists
        $loadingState = $sticker->loading_state_id 
            ? $this->loadingStateService->getLoadingState($sticker->loading_state_id)
            : null;

        return view('stickers.show', [
            'sticker' => $sticker,
            'loadingState' => $loadingState
        ]);
    }

    public function destroy(Sticker $sticker): RedirectResponse
    {
        $this->authorize('delete', $sticker);
        
        try {
            if ($sticker->image_path) {
                Storage::disk('public')->delete($sticker->image_path);
            }
            
            $sticker->delete();
            
            return redirect()->route('stickers.index')
                ->with('success', 'Sticker deleted successfully!');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'Failed to delete sticker: ' . $e->getMessage());
        }
    }
}
