<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\View\Composers\MenuComposer;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Enregistrer le composer pour les vues qui utilisent le menu
        View::composer([
            'layouts.sidebar',
            'components.sidebar',
            'partials.sidebar'
        ], MenuComposer::class);
    }
}