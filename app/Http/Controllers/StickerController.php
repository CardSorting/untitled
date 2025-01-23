<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerateStickerRequest;
use App\Services\GoAPIService;
use Illuminate\Http\RedirectResponse;
use App\Models\Sticker;
use App\Jobs\CheckImageGenerationStatus;

class StickerController extends Controller
{
    protected $goAPIService;

    public function __construct(GoAPIService $goAPIService)
    {
        $this->goAPIService = $goAPIService;
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
            
            // Create sticker record first
            $sticker = Sticker::create([
                'user_id' => auth()->id(),
                'expression' => $data['expression'],
                'subject' => $data['subject'],
                'status' => Sticker::STATUS_PROCESSING
            ]);

            // Initiate async image generation
            $response = $this->goAPIService->generateImage([
                'prompt' => "{$data['expression']} {$data['subject']}",
                'aspect_ratio' => '1:1',
                'process_mode' => 'relax'
            ]);

            // Update sticker with task ID and status
            $sticker->update([
                'status' => Sticker::STATUS_PROCESSING,
                'metadata' => [
                    'task_id' => $response['task_id'],
                    'started_at' => now()
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
        return view('stickers.show', compact('sticker'));
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
