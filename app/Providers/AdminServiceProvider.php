<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /* Repository Interface Binding */
        $this->repos();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Registering Blade Directives
        Paginator::useBootstrap();
    }

    // Repository Interface Binding
    protected function repos()
    {
        // $this->app->bind(AnnouncementRepositoryInterface::class, AnnouncementRepository::class);
    $this->app->bind(\App\Contracts\PlantsRepositoryInterface::class, \App\Repositories\PlantsRepository::class);
    $this->app->bind(\App\Contracts\PlantRepositoryInterface::class, \App\Repositories\PlantRepository::class);
    $this->app->bind(\App\Contracts\DiseaseRepositoryInterface::class, \App\Repositories\DiseaseRepository::class);
}
}
