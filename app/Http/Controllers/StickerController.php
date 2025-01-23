<?php

namespace App\Http\Controllers;

use App\Contracts\StickerGenerationServiceInterface;
use App\Http\Requests\GenerateStickerRequest;
use App\Models\Sticker;
use App\Templates\SubjectTemplateRepository;
use App\Templates\ExpressionTemplateRepository;
use App\Templates\CountryRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StickerController extends Controller
{
    public function __construct(
        protected StickerGenerationServiceInterface $stickerService,
        protected SubjectTemplateRepository $subjectTemplates,
        protected ExpressionTemplateRepository $expressionTemplates,
        protected CountryRepository $countryRepository
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
        $countries = $this->countryRepository->getCountries();
        return view('stickers.create', [
            'subjects' => $this->subjectTemplates->getSubjects(),
            'subjectCategories' => $this->subjectTemplates->getCategories(),
            'expressions' => $this->expressionTemplates->getExpressions(),
            'countries' => $countries,
        ]);
    }

    public function store(GenerateStickerRequest $request): RedirectResponse
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'expression' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'style' => 'required|string|max:255',
            'country' => 'nullable|string|size:2'
        ]);

        $sticker = Sticker::create($validated);

        return redirect()->route('stickers.show', $sticker);
    }

    public function show(Sticker $sticker): View
    {
        $this->authorize('view', $sticker);

        return view('stickers.show', [
            'sticker' => $sticker
        ]);
    }
}
