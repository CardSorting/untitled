<?php

namespace App\Providers;

use App\Contracts\StickerGenerationServiceInterface;
use App\Services\StickerGenerationService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(StickerGenerationServiceInterface::class, StickerGenerationService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
