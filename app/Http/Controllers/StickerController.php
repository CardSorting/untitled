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
            
            // Build prompt with custom style and default styling
            $defaultStyle = "digital art, vibrant colors, clean lines, expressive, sticker style, white background";
            $prompt = "{$data['expression']} {$data['subject']}, {$defaultStyle}";
            if (!empty($data['custom_style'])) {
                $prompt .= ", {$data['custom_style']}";
            }

            // Start loading state with unique task ID
            $taskId = 'sticker_' . uniqid();
            $this->loadingStateService->start($taskId);

            // Create sticker record first
            $sticker = Sticker::create([
                'user_id' => auth()->id(),
                'expression' => $data['expression'],
                'subject' => $data['subject'],
                'prompt' => $prompt,
                'custom_style' => $data['custom_style'] ?? null,
                'status' => Sticker::STATUS_PROCESSING,
                'metadata' => [
                    'task_id' => $taskId,
                    'started_at' => now()
                ]
            ]);

            // Initiate async image generation
            $response = $this->goAPIService->generateImage([
                'prompt' => $prompt,
                'aspect_ratio' => '1:1',
                'process_mode' => 'relax'
            ]);

            // Update loading state
            $this->loadingStateService->update('processing', 25);

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
        
        // Get loading state from metadata
        $taskId = $sticker->metadata['task_id'] ?? null;
        $currentState = $this->loadingStateService->getCurrentState();
        $loadingState = ($taskId && isset($currentState['task_id']) && $currentState['task_id'] === $taskId)
            ? $currentState
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
