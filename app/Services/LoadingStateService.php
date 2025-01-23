<?php

namespace App\Services;

use App\Contracts\LoadingStateInterface;
use Illuminate\Support\Facades\Session;

class LoadingStateService implements LoadingStateInterface
{
    protected array $stages = [
        'pending' => [
            'message' => 'Initializing...',
            'progress' => 0,
            'icon' => 'loading'
        ],
        'processing' => [
            'message' => 'Generating...',
            'progress' => 25,
            'icon' => 'spinner'
        ],
        'completed' => [
            'message' => 'Completed!',
            'progress' => 100,
            'icon' => 'check'
        ],
        'failed' => [
            'message' => 'Failed',
            'progress' => 100,
            'icon' => 'x'
        ]
    ];

    public function start(string $taskId): void
    {
        Session::put('loading_state', [
            'task_id' => $taskId,
            'status' => 'pending',
            'started_at' => now(),
            'progress' => 0
        ]);
    }

    public function update(string $status, int $progress): void
    {
        $state = Session::get('loading_state', []);
        $state['status'] = $status;
        $state['progress'] = $progress;
        Session::put('loading_state', $state);
    }

    public function getCurrentState(): array
    {
        return Session::get('loading_state', []);
    }

    public function getStageDetails(string $status): array
    {
        return $this->stages[$status] ?? [];
    }

    public function clear(): void
    {
        Session::forget('loading_state');
    }
}
