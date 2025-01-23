<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StickerVariation extends Model
{
    use HasFactory;

    protected $fillable = [
        'sticker_id',
        'image_path',
        'variation_index'
    ];

    public function sticker(): BelongsTo
    {
        return $this->belongsTo(Sticker::class);
    }
}
