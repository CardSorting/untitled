<?php

namespace App\Providers;

use App\Contracts\StickerGenerationServiceInterface;
use App\Services\StickerGenerationService;
use App\Templates\SubjectTemplateRepository;
use App\Templates\ExpressionTemplateRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(StickerGenerationServiceInterface::class, StickerGenerationService::class);
        
        // Register template repositories as singletons since they contain static data
        $this->app->singleton(SubjectTemplateRepository::class);
        $this->app->singleton(ExpressionTemplateRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
