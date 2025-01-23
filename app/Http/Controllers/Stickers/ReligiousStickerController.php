<?php

namespace App\Http\Controllers\Stickers;

use App\Http\Requests\GenerateStickerRequest;
use App\Templates\ReligiousTemplateRepository;

class ReligiousStickerController extends BaseStickerController
{
    protected $religiousTemplates;

    public function __construct(
        ReligiousTemplateRepository $religiousTemplates
    ) {
        parent::__construct(
            app()->make('App\Contracts\StickerGenerationServiceInterface'),
            app()->make('App\Templates\CountryRepository')
        );
        $this->religiousTemplates = $religiousTemplates;
    }

    public function create()
    {
        return view('stickers.religious.create', array_merge(
            $this->getViewData(),
            ['templates' => $this->religiousTemplates->getAll()]
        ));
    }

    public function store(GenerateStickerRequest $request)
    {
        return $this->storeSticker($request, 'religious');
    }
}
