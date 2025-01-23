<?php

namespace App\Services;

use App\Contracts\StickerGenerationServiceInterface;
use App\Models\Sticker;
use App\Models\User;
use App\Services\GoAPIService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Exceptions\StickerGenerationException;

class StickerGenerationService implements StickerGenerationServiceInterface
{
    protected $goAPIService;

    public function __construct(GoAPIService $goAPIService)
    {
        $this->goAPIService = $goAPIService;
    }

    public function generateSticker(array $data, User $user): Sticker
    {
        try {
            // Generate image with GoAPI
            $imageUrl = $this->goAPIService->generateSticker(
                $data['expression'],
                $data['subject']
            );

            // Download and save the image
            $imageData = file_get_contents($imageUrl);
            $filename = 'stickers/' . Str::uuid() . '.png';
            
            // Upload with public visibility
            Storage::disk('backblaze')->put($filename, $imageData, [
                'visibility' => 'public',
                'CacheControl' => 'max-age=31536000',
            ]);

            // Create and return sticker record
            return $user->stickers()->create([
                'subject' => $data['subject'],
                'expression' => $data['expression'],
                'prompt' => $this->goAPIService->getPrompt(
                    $data['expression'],
                    $data['subject']
                ),
                'image_path' => Storage::disk('backblaze')->url($filename),
                'size' => $data['size'] ?? '1024x1024',
                'style' => $data['style'] ?? 'default',
                'custom_style' => $data['custom_style'] ?? null,
            ]);
        } catch (\Exception $e) {
            throw new StickerGenerationException('Failed to generate sticker: ' . $e->getMessage());
        }
    }
}
