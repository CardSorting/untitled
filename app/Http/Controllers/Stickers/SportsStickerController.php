<?php

namespace App\Http\Controllers\Stickers;

use App\Templates\SportsTemplateRepository;
use Illuminate\View\View;

class SportsStickerController extends BaseStickerController
{
    protected SportsTemplateRepository $sportsTemplates;

    public function __construct(
        SportsTemplateRepository $sportsTemplates
    ) {
        $this->sportsTemplates = $sportsTemplates;
        parent::__construct(app()->make('StickerGenerationServiceInterface'), app()->make('CountryRepository'));
    }

    protected function getTemplateRepository()
    {
        return $this->sportsTemplates;
    }

    protected function getViewPath(): string
    {
        return 'stickers.sports.create';
    }

    public function create(): View
    {
        $templateData = parent::create()->getData();
        return view($this->getViewPath(), array_merge($templateData, [
            'sportsCategories' => $this->sportsTemplates->getSportsCategories(),
            'athleteTypes' => $this->sportsTemplates->getAthleteTypes(),
        ]));
    }
}
