<?php

namespace App\Http\Controllers\Stickers;

use App\Templates\ReligiousTemplateRepository;
use Illuminate\View\View;

class ReligiousStickerController extends BaseStickerController
{
    protected ReligiousTemplateRepository $religiousTemplates;

    public function __construct(
        ReligiousTemplateRepository $religiousTemplates
    ) {
        $this->religiousTemplates = $religiousTemplates;
        parent::__construct(app()->make('StickerGenerationServiceInterface'), app()->make('CountryRepository'));
    }

    protected function getTemplateRepository()
    {
        return $this->religiousTemplates;
    }

    protected function getViewPath(): string
    {
        return 'stickers.religious.create';
    }

    public function create(): View
    {
        $templateData = parent::create()->getData();
        return view($this->getViewPath(), array_merge($templateData, [
            'religiousFigures' => $this->religiousTemplates->getReligiousFigures(),
            'religiousSymbols' => $this->religiousTemplates->getReligiousSymbols(),
            'religiousCategories' => $this->religiousTemplates->getReligiousCategories(),
        ]));
    }
}
