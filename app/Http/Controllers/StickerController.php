<?php

namespace App\Http\Controllers;

use App\Contracts\StickerGenerationServiceInterface;
use App\Http\Requests\GenerateStickerRequest;
use App\Models\Sticker;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StickerController extends Controller
{
    public function __construct(
        protected StickerGenerationServiceInterface $stickerService
    ) {}

    public function index(): View
    {
        return view('stickers.index', [
            'stickers' => Sticker::where('user_id', auth()->id())
                ->latest()
                ->paginate(12)
        ]);
    }

    public function create(): View
    {
        $expressions = [
            'hype' => 'Hype (Excited)',
            'tilted' => 'Tilted (Frustrated)',
            'gg' => 'GG (Good Game)',
            'sadge' => 'Sadge (Sad)',
            'clutch' => 'Clutch (Focused)',
            'pog' => 'POG (Amazed)',
            'facepalm' => 'Facepalm (Exasperated)',
            'monkas' => 'MonkaS (Anxious)',
            'ez' => 'EZ (Confident)',
            'nope' => 'Nope (Rejecting)',
            'sleepy' => 'Sleepy (Tired)',
            'blush' => 'Blush (Shy)',
            'surprise' => 'Surprise (Shocked)',
            'laugh' => 'Laugh (Joyful)',
            'determined' => 'Determined (Resolute)',
        ];

        return view('stickers.create', compact('expressions'));
    }

    public function store(GenerateStickerRequest $request): RedirectResponse
    {
        $sticker = $this->stickerService->generateSticker(
            $request->validated(),
            auth()->user()
        );

        return redirect()->route('stickers.show', $sticker)
            ->with('status', 'sticker-created');
    }

    public function show(Sticker $sticker): View
    {
        $this->authorize('view', $sticker);

        return view('stickers.show', [
            'sticker' => $sticker
        ]);
    }
}
