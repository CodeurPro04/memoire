<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Services\MenuService;

class MenuComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $view->with([
            'menuItems' => MenuService::getMenuStructure(),
            'connectivityStats' => MenuService::getConnectivityStats()
        ]);
    }
}