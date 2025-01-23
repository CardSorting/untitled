<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Exceptions\StickerGenerationException;

class GoAPIService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.goapi.api_key');
        if (empty($this->apiKey)) {
            throw new \RuntimeException('GOAPI_KEY is not configured');
        }
    }

    public function generateSticker(string $expression, string $subject): string
    {
        try {
            $prompt = $this->getPrompt($expression, $subject);
            
            $response = Http::withHeaders([
                'x-api-key' => $this->apiKey,
                'Content-Type' => 'application/json',
            ])->post('https://api.goapi.ai/api/v1/task', [
                'model' => 'midjourney',
                'task_type' => 'imagine',
                'input' => [
                    'prompt' => $prompt,
                    'aspect_ratio' => '1:1',
                    'process_mode' => 'relax',
                    'skip_prompt_check' => false
                ]
            ]);

            if ($response->successful()) {
                $taskId = $response->json('data.task_id');
                return $this->getImageUrl($taskId);
            }

            throw new StickerGenerationException('API request failed: ' . $response->json('message'));
        } catch (\Exception $e) {
            Log::error('GoAPI sticker generation failed', ['error' => $e->getMessage()]);
            throw new StickerGenerationException('Failed to generate sticker: ' . $e->getMessage());
        }
    }

    protected function getImageUrl(string $taskId): string
    {
        $maxAttempts = 10;
        $attempt = 0;
        
        while ($attempt < $maxAttempts) {
            sleep(5); // Wait between status checks
            
            $response = Http::withHeaders([
                'x-api-key' => $this->apiKey,
            ])->get("https://api.goapi.ai/api/v1/task/{$taskId}");

            if ($response->successful()) {
                $data = $response->json('data');
                
                if ($data['status'] === 'completed') {
                    return $data['output']['image_urls'][0];
                }
                
                if ($data['status'] === 'failed') {
                    throw new StickerGenerationException('Image generation failed');
                }
            }
            
            $attempt++;
        }

        throw new StickerGenerationException('Image generation timed out');
    }

    public function getPrompt(string $expression, string $subject): string
    {
        $style = "digital art, vibrant colors, clean lines, expressive, sticker style, white background";
        
        $expressionsMap = [
            'hype' => 'excited and energetic',
            'tilted' => 'angry and frustrated',
            'gg' => 'cool and confident',
            'sadge' => 'sad and disappointed',
            'clutch' => 'surprised and shocked',
            'pog' => 'amazed and astonished',
            'facepalm' => 'embarrassed and frustrated',
            'monkas' => 'scared and anxious',
            'ez' => 'smug and confident',
            'nope' => 'refusing and rejecting',
            'sleepy' => 'tired and bored',
            'blush' => 'shy and embarrassed',
            'surprise' => 'shocked and surprised',
            'laugh' => 'laughing and happy',
            'determined' => 'focused and determined',
        ];

        $expressionText = $expressionsMap[$expression] ?? $expression;
        
        return "A {$expressionText} {$subject}, {$style}";
    }
}
