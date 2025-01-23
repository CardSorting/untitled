<?php

namespace App\Http\Controllers;

use App\Contracts\StickerGenerationServiceInterface;
use App\Http\Requests\GenerateStickerRequest;
use App\Models\Sticker;
use App\Templates\SubjectTemplateRepository;
use App\Templates\ExpressionTemplateRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StickerController extends Controller
{
    public function __construct(
        protected StickerGenerationServiceInterface $stickerService,
        protected SubjectTemplateRepository $subjectTemplates,
        protected ExpressionTemplateRepository $expressionTemplates
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
        return view('stickers.create', [
            'subjects' => $this->subjectTemplates->getSubjects(),
            'subjectCategories' => $this->subjectTemplates->getCategories(),
            'expressions' => $this->expressionTemplates->getExpressions()
        ]);
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
