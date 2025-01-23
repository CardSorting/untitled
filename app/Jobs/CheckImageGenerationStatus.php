<?php

namespace App\Jobs;

use App\Models\Sticker;
use App\Services\GoAPIService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CheckImageGenerationStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $stickerId;
    protected $taskId;

    public function __construct(string $taskId, int $stickerId)
    {
        $this->taskId = $taskId;
        $this->stickerId = $stickerId;
    }

    public function handle(GoAPIService $goAPIService)
    {
        $sticker = Sticker::findOrFail($this->stickerId);
        
        try {
            $status = $goAPIService->checkStatus($this->taskId);
            
            switch ($status['status']) {
                case 'completed':
                    $sticker->update([
                        'status' => 'completed',
                        'image_url' => $status['output']['image_urls'][0],
                        'metadata->completed_at' => now(),
                    ]);
                    break;
                    
                case 'failed':
                    $sticker->update([
                        'status' => 'failed',
                        'metadata->failed_at' => now(),
                        'metadata->failure_reason' => $status['message'] ?? 'Unknown error'
                    ]);
                    break;
                    
                case 'processing':
                    // Re-dispatch with delay if still processing
                    self::dispatch($this->taskId, $this->stickerId)
                        ->delay(now()->addSeconds(10));
                    break;
            }
            
        } catch (\Exception $e) {
            Log::error('Failed to check image generation status', [
                'task_id' => $this->taskId,
                'error' => $e->getMessage()
            ]);
            
            // Retry with exponential backoff
            $this->release(now()->addMinutes(5));
        }
    }
}
