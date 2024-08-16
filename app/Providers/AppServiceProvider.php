<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
{
    $this->app->bind(
        \App\Repositories\CandyRepositoryInterface::class,
        \App\Repositories\CandyRepository::class
    );

    $this->app->bind(
        \App\Services\CandyService::class,
        \App\Services\CandyService::class
    );
}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
