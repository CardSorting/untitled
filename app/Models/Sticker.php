<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Sticker extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'expression',
        'prompt',
        'image_path',
        'image_url',
        'size',
        'style',
        'custom_style',
        'user_id',
        'status',
        'metadata',
    ];

    protected $appends = ['image_url'];

    protected $casts = [
        'status' => 'string',
        'metadata' => 'array',
    ];

    public const STATUS_PROCESSING = 'processing';
    public const STATUS_COMPLETED = 'completed';
    public const STATUS_FAILED = 'failed';

    public function isProcessing(): bool
    {
        return $this->status === self::STATUS_PROCESSING;
    }

    public function isCompleted(): bool
    {
        return $this->status === self::STATUS_COMPLETED;
    }

    public function isFailed(): bool
    {
        return $this->status === self::STATUS_FAILED;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function variations(): HasMany
    {
        return $this->hasMany(StickerVariation::class);
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

    public function getStyledPromptAttribute(): string
    {
        $style = "digital art, vibrant colors, clean lines, expressive, sticker style, white background";
        return "{$this->prompt}, {$style}";
    }
}
