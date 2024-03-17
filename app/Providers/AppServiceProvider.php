<?php

namespace App\Providers;

use App\Repositories\BuildingRepository;
use App\Repositories\BuildingRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(BuildingRepositoryInterface::class, BuildingRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
