<?php

namespace App\Http\Controllers\Stickers;

use App\Http\Controllers\Controller;
use App\Contracts\StickerGenerationServiceInterface;
use App\Templates\CountryRepository;
use Illuminate\View\View;
use App\Http\Requests\GenerateStickerRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Sticker;

abstract class BaseStickerController extends Controller
{
    public function __construct(
        protected StickerGenerationServiceInterface $stickerService,
        protected CountryRepository $countryRepository
    ) {}

    abstract protected function getTemplateRepository();
    abstract protected function getViewPath(): string;

    public function create(): View
    {
        $countries = $this->countryRepository->getCountries();
        $templateRepo = $this->getTemplateRepository();

        return view($this->getViewPath(), [
            'subjects' => $templateRepo->getSubjects(),
            'subjectCategories' => $templateRepo->getCategories(),
            'expressions' => $templateRepo->getExpressions(),
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
}
