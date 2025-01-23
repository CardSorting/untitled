<?php

namespace App\Http\Controllers\Stickers;

use App\Http\Controllers\Controller;
use App\Models\Sticker;
use App\Templates\CountryRepository;
use App\Contracts\StickerGenerationServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

abstract class BaseStickerController extends Controller
{
    protected $stickerGenerationService;
    protected $countryRepository;

    public function __construct(
        StickerGenerationServiceInterface $stickerGenerationService,
        CountryRepository $countryRepository
    ) {
        $this->stickerGenerationService = $stickerGenerationService;
        $this->countryRepository = $countryRepository;
    }

    abstract public function create();

    protected function getViewData()
    {
        return [
            'countries' => $this->countryRepository->getAll(),
        ];
    }

    protected function storeSticker(Request $request, string $type)
    {
        $sticker = new Sticker([
            'user_id' => Auth::id(),
            'type' => $type,
            'subject' => $request->subject,
            'expression' => $request->expression,
            'size' => $request->size,
            'style' => $request->style,
            'country' => $request->country,
        ]);

        $sticker->save();

        $this->stickerGenerationService->generate($sticker);

        return redirect()->route('stickers.show', $sticker)
            ->with('status', 'Sticker creation initiated successfully.');
    }
}
