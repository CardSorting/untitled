<?php

namespace App\Http\Controllers\Stickers;

use App\Http\Controllers\Controller;
use App\Contracts\StickerGenerationServiceInterface;
use App\Templates\SubjectTemplateRepository;
use App\Templates\ExpressionTemplateRepository;
use App\Templates\CountryRepository;
use App\Http\Requests\GenerateStickerRequest;
use App\Models\Sticker;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AnimalStickerController extends BaseStickerController
{
    public function __construct(
        StickerGenerationServiceInterface $stickerService,
        SubjectTemplateRepository $subjectTemplates,
        ExpressionTemplateRepository $expressionTemplates,
        CountryRepository $countryRepository
    ) {
        parent::__construct($stickerService, $subjectTemplates, $expressionTemplates, $countryRepository);
    }

    public function create(): View
    {
        $countries = $this->countryRepository->getCountries();
        return view('stickers.animal.create', [
            'animalCategories' => $this->subjectTemplates->getAnimalCategories(),
            'animalTypes' => $this->subjectTemplates->getAnimalTypes(),
            'expressions' => $this->expressionTemplates->getExpressions(),
            'countries' => $countries,
        ]);
    }

    public function store(GenerateStickerRequest $request): RedirectResponse
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'animal_type' => 'required|string|max:255',
            'expression' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'style' => 'required|string|max:255',
            'country' => 'nullable|string|size:2'
        ]);

        $sticker = Sticker::create($validated);

        return redirect()->route('stickers.show', $sticker);
    }
}
