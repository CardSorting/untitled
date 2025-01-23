<?php

namespace App\Jobs;

use App\Models\Sticker;
use App\Services\GoAPIService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\WithoutOverlapping;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckImageGenerationStatus implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $stickerId;
    protected $taskId;

    public $tries = 5;
    public $maxExceptions = 3;
    public $backoff = [5, 10, 30];

    public function __construct(string $taskId, int $stickerId)
    {
        $this->taskId = $taskId;
        $this->stickerId = $stickerId;
    }

    public function uniqueId()
    {
        return $this->taskId;
    }

    public function middleware()
    {
        return [new WithoutOverlapping($this->taskId)];
    }

    public function handle(GoAPIService $goAPIService)
    {
        DB::transaction(function() use ($goAPIService) {
            $sticker = Sticker::where('id', $this->stickerId)
                ->lockForUpdate()
                ->firstOrFail();

            // Skip if already completed or failed
            if (in_array($sticker->status, ['completed', 'failed'])) {
                return;
            }

            try {
                $status = $goAPIService->checkStatus($this->taskId);
                
                switch ($status['status']) {
                    case 'completed':
                        $sticker->update([
                            'status' => 'completed',
                            'image_url' => $status['output']['image_urls'][0],
                            'metadata->completed_at' => now(),
                            'version' => DB::raw('version + 1')
                        ]);
                        break;
                        
                    case 'failed':
                        $sticker->update([
                            'status' => 'failed',
                            'metadata->failed_at' => now(),
                            'metadata->failure_reason' => $status['message'] ?? 'Unknown error',
                            'version' => DB::raw('version + 1')
                        ]);
                        break;
                        
                    case 'processing':
                        // Re-dispatch with delay if still processing
                        self::dispatch($this->taskId, $this->stickerId)
                            ->delay(now()->addSeconds(10))
                            ->onQueue('sticker-status');
                        break;
                }
                
            } catch (\Exception $e) {
                Log::error('Failed to check image generation status', [
                    'task_id' => $this->taskId,
                    'error' => $e->getMessage(),
                    'stack_trace' => $e->getTraceAsString()
                ]);
                
                throw $e; // Let the job retry
            }
        });
    }

    public function failed(\Throwable $exception)
    {
        Log::critical('Image generation status check failed permanently', [
            'task_id' => $this->taskId,
            'sticker_id' => $this->stickerId,
            'error' => $exception->getMessage()
        ]);
    }
}
