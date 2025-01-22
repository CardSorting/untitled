<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Sticker extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'expression',
        'prompt',
        'image_path',
        'size',
        'style',
        'custom_style',
        'user_id',
    ];

    protected $appends = ['image_url'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getImageUrlAttribute()
    {
        // If image_path is a full URL (from Backblaze), return it directly
        if (filter_var($this->image_path, FILTER_VALIDATE_URL)) {
            return $this->image_path;
        }
        
        // Otherwise, try to get URL from public disk
        return $this->image_path ? Storage::disk('public')->url($this->image_path) : null;
    }
}
