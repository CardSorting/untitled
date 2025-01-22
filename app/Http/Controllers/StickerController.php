<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerateStickerRequest;
use App\Services\StickerGenerationService;
use Illuminate\Http\RedirectResponse;
use App\Models\Sticker;

class StickerController extends Controller
{
    protected $stickerGenerationService;

    public function __construct(StickerGenerationService $stickerGenerationService)
    {
        $this->stickerGenerationService = $stickerGenerationService;
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
            $sticker = $this->stickerGenerationService->generateSticker(
                $request->validated(),
                auth()->user()
            );

            return redirect()->route('stickers.show', $sticker)
                ->with('success', 'Sticker generated successfully!');
        } catch (\Exception $e) {
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
