<?php

namespace App\Http\Controllers;

use App\Models\Sticker;
use Illuminate\View\View;

class StickerController extends Controller
{

    public function index(): View
    {
        return view('stickers.index', [
            'stickers' => Sticker::where('user_id', auth()->id())
                ->latest()
                ->paginate(12)
        ]);
    }

    public function show(Sticker $sticker): View
    {
        $this->authorize('view', $sticker);

        return view('stickers.show', [
            'sticker' => $sticker
        ]);
    }
}
