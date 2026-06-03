<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// Para paginacion con Bootstrap 5
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Para paginación con Bootstrap 5
        Paginator::useBootstrapFive();
    }
}
