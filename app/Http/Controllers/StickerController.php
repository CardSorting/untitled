<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerateStickerRequest;
use App\Models\Sticker;
use App\Models\StickerVariation;
use App\Services\StickerGenerationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StickerController extends Controller
{
    public function __construct(
        protected StickerGenerationService $stickerService
    ) {}

    public function store(GenerateStickerRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            $user = Auth::user();

            // Generate sticker variations
            $generatedImages = $this->stickerService->generateSticker($data);

            // Create main sticker record
            $sticker = Sticker::create([
                'user_id' => $user->id,
                'subject' => $data['subject'],
                'expression' => $data['expression'],
                'status' => 'completed',
            ]);

            // Create variations
            foreach ($generatedImages as $image) {
                StickerVariation::create([
                    'sticker_id' => $sticker->id,
                    'image_url' => $image['url'],
                    'content_type' => $image['content_type'],
                    'file_name' => $image['file_name'],
                    'file_size' => $image['file_size'],
                    'style' => $data['style'] ?? 'realistic_image',
                    'size' => $data['size'] ?? 'square_hd',
                    'colors' => $data['colors'] ?? null,
                    'custom_style' => $data['custom_style'] ?? null,
                ]);
            }

            return response()->json([
                'message' => 'Sticker generated successfully',
                'data' => [
                    'sticker' => $sticker,
                    'variations' => $sticker->variations,
                ]
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to generate sticker',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // ... rest of the controller methods
}
