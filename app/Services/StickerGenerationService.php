<?php

namespace App\Services;

use App\Exceptions\StickerGenerationException;
use App\Models\Sticker;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class StickerGenerationService implements StickerGenerationServiceInterface
{
    protected string $apiKey;
    protected string $apiUrl = 'https://fal.run/fal-ai/recraft-v3';

    public function __construct()
    {
        $this->apiKey = config('services.fal.key');
        if (empty($this->apiKey)) {
            throw new StickerGenerationException('FAL API key is not configured');
        }
    }

    public function generateSticker(array $data, User $user): Sticker
    {
        try {
            $prompt = $this->buildPrompt($data['subject'], $data['expression']);
            
            $response = Http::withHeaders([
                'Authorization' => $this->apiKey,
                'Content-Type' => 'application/json',
            ])->post($this->apiUrl, [
                'input' => [
                    'prompt' => $prompt,
                    'image_size' => $data['size'] ?? 'square_hd',
                    'style' => $data['style'] ?? 'realistic_image',
                    'colors' => $data['colors'] ?? [],
                    'style_id' => $data['custom_style'] ?? null,
                ],
                'logs' => true,
            ]);

            if ($response->failed()) {
                throw new StickerGenerationException(
                    'API request failed: ' . $response->body()
                );
            }

            $result = $response->json();
            $images = $this->processResponse($result);
            
            return Sticker::create([
                'user_id' => $user->id,
                'prompt' => $prompt,
                'subject' => $data['subject'],
                'expression' => $data['expression'],
                'style' => $data['style'] ?? 'realistic_image',
                'size' => $data['size'] ?? 'square_hd',
                'custom_style' => $data['custom_style'] ?? null,
                'image_path' => $images[0]['url'],
                'status' => Sticker::STATUS_COMPLETED,
                'metadata' => [
                    'content_type' => $images[0]['content_type'],
                    'file_name' => $images[0]['file_name'],
                    'file_size' => $images[0]['file_size'],
                    'response' => $result,
                ],
                'version' => 'v1',
            ]);
            
        } catch (\Exception $e) {
            Log::error('Sticker generation failed', ['error' => $e->getMessage()]);
            throw new StickerGenerationException('Failed to generate sticker: ' . $e->getMessage());
        }
    }

    protected function buildPrompt(string $subject, string $expression): string
    {
        $templates = array(
            'hype' => 'A headshot sticker of a cartoon {subject} with wide, sparkling eyes filled with excitement, mouth open in a joyful shout. The {subject} wears a small red mushroom cap that tilts up as if bouncing with energy. Bold, jagged "burst lines" radiate around its head, capturing an electrifying "hype" vibe for celebrating intense or victorious gaming moments. The design is vibrant, with exaggerated expressions that convey pure excitement.',
            'tilted' => 'A headshot sticker of a cartoon {subject} showing frustration, with one eye twitching and a subtle gritting of teeth. Its small red mushroom cap droops forward, adding to the "over it" look. Thin, wavy "anger lines" float around its head, capturing a relatable "tilted" reaction perfect for venting after unlucky plays or moments of bad RNG. The design emphasizes irritation with expressive details.',
            'gg' => 'A headshot sticker of a cartoon {subject} with a serene, content smile and closed eyes, radiating calm satisfaction. The small red mushroom cap sits snugly on one ear, while soft sparkle icons and a tiny thumbs-up float nearby, adding a positive and respectful "GG" touch. The design is simple and clean, perfect for celebrating a fair game or a well-played match.',
            'sadge' => 'A headshot sticker of a cartoon {subject} with big, sad eyes gazing downward, mouth in a tiny, quivering frown. Its ears droop, and the small red mushroom cap tilts slightly, enhancing the defeated look. Soft tear lines under its eyes add to the sadness, creating a sympathetic "Sadge" emote perfect for sharing disappointment or empathy during tough game moments.',
            'clutch' => 'A headshot sticker of a cartoon {subject} with narrowed, laser-focused eyes and a determined mouth, showing it is in full concentration. Tiny sweat droplets appear on its forehead, and its small red mushroom cap tilts back, capturing the tension. Faint motion blur lines around the head convey the intense focus of a "clutch" play moment, ideal for high-stakes situations.',
            'pog' => 'A headshot sticker of a cartoon {subject} with wide, sparkling eyes and mouth open in awe, capturing the classic "Pog" reaction. The small red mushroom cap tilts back as if blown away by excitement, and several exclamation points or sparkles float around the head. This emote conveys pure amazement, perfect for epic or surprising moments in gameplay.',
            'facepalm' => 'A headshot sticker of a cartoon {subject} with one paw over its forehead, eyes closed in visible exasperation. The small red mushroom cap sits forward, matching the frustrated vibe, and a subtle sweat drop appears near the paw, emphasizing the frustration. This "facepalm" emote is ideal for reacting to silly mistakes or cringe moments, adding a humorous "why me?" touch.',
            'monkas' => 'A headshot sticker of a cartoon {subject} with wide, anxious eyes, looking to the side with small sweat beads on its forehead. Its small red mushroom cap tilts forward, emphasizing its tension, while faint "shaking lines" around its head capture the suspenseful "MonkaS" feeling. This emote is perfect for expressing anxiety during nerve-wracking gameplay moments.',
            'ez' => 'A headshot sticker of a cartoon {subject} with a smug grin and half-lidded eyes, exuding relaxed confidence. Its small red mushroom cap sits slightly back, adding to the nonchalant look, while a tiny "EZ" bubble floats nearby. This emote captures a cocky, effortless vibe, ideal for showing off an easy win or lighthearted teasing after a smooth victory.',
            'nope' => 'A headshot sticker of a cartoon {subject} with tightly shut eyes and a straight-lined mouth, turning slightly away in rejection or disapproval. The small red mushroom cap droops subtly, and small "X" icons float around the head, reinforcing the "nope" vibe. This emote is perfect for expressing rejection, cringing, or avoiding awkward moments.'
        );

        return str_replace('{subject}', $subject, $templates[$expression] ?? $templates['hype']);
    }

    protected function processResponse(array $response): array
    {
        if (empty($response['images'])) {
            throw new StickerGenerationException('No images returned from API');
        }

        return array_map(function ($image) {
            return [
                'url' => $image['url'],
                'content_type' => $image['content_type'],
                'file_name' => $image['file_name'],
                'file_size' => $image['file_size'],
            ];
        }, $response['images']);
    }
}
