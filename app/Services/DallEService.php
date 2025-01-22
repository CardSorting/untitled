<?php

namespace App\Services;

use OpenAI\Client;
use OpenAI;

class DallEService
{
    private $client;
    
    private const EXPRESSIONS = [
        'hype' => "A headshot sticker of {subject} with wide, sparkling eyes filled with excitement, mouth open in a joyful shout. Bold, jagged 'burst lines' radiate around its head, capturing an electrifying 'hype' vibe for celebrating intense or victorious gaming moments. The design is vibrant, with exaggerated expressions that convey pure excitement.",
        
        'tilted' => "A headshot sticker of {subject} showing frustration, with one eye twitching and a subtle gritting of teeth. Thin, wavy 'anger lines' float around its head, capturing a relatable 'tilted' reaction perfect for venting after unlucky plays or moments of bad RNG. The design emphasizes irritation with expressive details.",
        
        'gg' => "A headshot sticker of {subject} with a serene, content smile and closed eyes, radiating calm satisfaction. Soft sparkle icons and a tiny thumbs-up float nearby, adding a positive and respectful 'GG' touch. The design is simple and clean, perfect for celebrating a fair game or a well-played match.",
        
        'sadge' => "A headshot sticker of {subject} with big, sad eyes gazing downward, mouth in a tiny, quivering frown. Its ears droop, enhancing the defeated look. Soft tear lines under its eyes add to the sadness, creating a sympathetic 'Sadge' emote perfect for sharing disappointment or empathy during tough game moments.",
        
        'clutch' => "A headshot sticker of {subject} with narrowed, laser-focused eyes and a determined mouth, showing it's in full concentration. Tiny sweat droplets appear on its forehead. Faint motion blur lines around the head convey the intense focus of a 'clutch' play moment, ideal for high-stakes situations.",
        
        'pog' => "A headshot sticker of {subject} with wide, sparkling eyes and mouth open in awe, capturing the classic 'Pog' reaction. Several exclamation points or sparkles float around the head. This emote conveys pure amazement, perfect for epic or surprising moments in gameplay.",
        
        'facepalm' => "A headshot sticker of {subject} with one paw over its forehead, eyes closed in visible exasperation. A subtle sweat drop appears near the paw, emphasizing the frustration. This 'facepalm' emote is ideal for reacting to silly mistakes or cringe moments, adding a humorous 'why me?' touch.",
        
        'monkas' => "A headshot sticker of {subject} with wide, anxious eyes, looking to the side with small sweat beads on its forehead. Faint 'shaking lines' around its head capture the suspenseful 'MonkaS' feeling. This emote is perfect for expressing anxiety during nerve-wracking gameplay moments.",
        
        'ez' => "A headshot sticker of {subject} with a smug grin and half-lidded eyes, exuding relaxed confidence. A tiny 'EZ' bubble floats nearby. This emote captures a cocky, effortless vibe, ideal for showing off an easy win or lighthearted teasing after a smooth victory.",
        
        'nope' => "A headshot sticker of {subject} with tightly shut eyes and a straight-lined mouth, turning slightly away in rejection or disapproval. Small 'X' icons float around the head, reinforcing the 'nope' vibe. This emote is perfect for expressing rejection, cringing, or avoiding awkward moments.",

        'sleepy' => "A headshot sticker of {subject} with eyes closed in a big, sleepy yawn. A little droplet appears near its mouth, emphasizing its tiredness. The design is simple and expressive, with soft lines and muted colors, perfect for a cozy 'sleepy' emote.",

        'blush' => "A headshot sticker of {subject} with eyes wide open with a shy expression and cheeks lightly blushing. The mouth is a small, nervous smile, giving a cute and bashful vibe. The design is clean and minimal, with warm colors, making it ideal for a 'shy' or 'flattered' emote.",

        'surprise' => "A headshot sticker of {subject} with its mouth slightly open and eyes wide in surprise, as if it just saw something unexpected. The design is simple, with bold lines and bright expressions, perfect for a 'surprised' emote.",

        'laugh' => "A headshot sticker of {subject} with its eyes closed in laughter, mouth wide open in a joyful grin. Little lines near its eyes emphasize the laughter. The design is clean and cheerful, making it an ideal 'laughing' or 'happy' emote.",

        'determined' => "A headshot sticker of {subject} with narrowed eyes and a small smirk, showing a look of determination. The design is minimal and expressive, using simple lines to capture a focused, 'determined' look, making it great for an emote showing resolve."
    ];

    public function __construct()
    {
        $this->client = OpenAI::client(config('services.openai.api_key'));
    }

    public function generateSticker(string $subject, string $expression, ?string $customStyle = null)
    {
        $template = self::EXPRESSIONS[strtolower($expression)] ?? throw new \InvalidArgumentException("Invalid expression: {$expression}");
        $prompt = str_replace('{subject}', $subject, $template);
        
        // Add custom style if provided
        if ($customStyle) {
            $prompt .= " Style: {$customStyle}.";
        }
        
        $response = $this->client->images()->create([
            'prompt' => $prompt . ", digital sticker art, clean vectorized style, white background, high quality, detailed",
            'n' => 1,
            'size' => '1024x1024',
            'response_format' => 'b64_json'
        ]);

        return $response->data[0]->b64_json;
    }

    public function processImage($base64Image)
    {
        // Convert base64 to image and remove background if needed
        $imageData = base64_decode($base64Image);
        return $imageData;
    }
}
