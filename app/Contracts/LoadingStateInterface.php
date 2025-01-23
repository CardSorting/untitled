<?php

namespace App\Contracts;

interface LoadingStateInterface
{
    public function start(string $taskId): void;
    public function update(string $status, int $progress): void;
    public function getCurrentState(): array;
    public function getStageDetails(string $status): array;
    public function clear(): void;
}
