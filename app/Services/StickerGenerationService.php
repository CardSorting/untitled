<?php

namespace App\Services;

use App\Contracts\StickerGenerationServiceInterface;
use App\Models\Sticker;
use App\Models\User;
use App\Services\DallEService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Exceptions\StickerGenerationException;

class StickerGenerationService implements StickerGenerationServiceInterface
{
    protected $dallEService;

    public function __construct(DallEService $dallEService)
    {
        $this->dallEService = $dallEService;
    }

    public function generateSticker(array $data, User $user): Sticker
    {
        try {
            // Generate image with DALL-E
            $imageData = $this->dallEService->generateSticker(
                $data['subject'],
                $data['expression'],
                $data['custom_style'] ?? null
            );

            // Process and save the image
            $processedImage = $this->dallEService->processImage($imageData);
            $filename = 'stickers/' . Str::uuid() . '.png';
            Storage::disk('public')->put($filename, $processedImage);

            // Create and return sticker record
            return $user->stickers()->create([
                'subject' => $data['subject'],
                'expression' => $data['expression'],
                'prompt' => $this->dallEService->getPrompt(
                    $data['subject'],
                    $data['expression'],
                    $data['custom_style'] ?? null
                ),
                'image_path' => $filename,
                'size' => $data['size'] ?? '1024x1024',
                'style' => $data['style'] ?? 'default',
                'custom_style' => $data['custom_style'] ?? null,
            ]);
        } catch (\Exception $e) {
            throw new StickerGenerationException('Failed to generate sticker: ' . $e->getMessage());
        }
    }
}