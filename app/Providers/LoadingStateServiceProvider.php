<?php

namespace App\Providers;

use App\Contracts\LoadingStateInterface;
use App\Services\LoadingStateService;
use Illuminate\Support\ServiceProvider;

class LoadingStateServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            LoadingStateInterface::class,
            LoadingStateService::class
        );
    }

    public function boot(): void
    {
        //
    }
}
