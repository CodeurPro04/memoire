<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\MenuService;

class MainLayout extends Component
{
    public $currentPage = 'dashboard';
    public $currentComponent = 'dashboard.main';
    public $menuItems = [];
    public $connectivityStats = [];
    
    // Rendre les variables disponibles dans la vue
    public function getMenuItemsProperty()
    {
        return $this->menuItems;
    }
    
    public function getConnectivityStatsProperty()
    {
        return $this->connectivityStats;
    }
    
    protected $listeners = [
        'navigate-to' => 'navigateTo',
        'refresh-menu' => 'refreshMenu',
        'update-badges' => 'updateBadges'
    ];

    public function mount()
    {
        $this->loadMenuData();
    }

    public function loadMenuData()
    {
        $this->menuItems = MenuService::getMenuStructure();
        $this->connectivityStats = MenuService::getConnectivityStats();
    }

    public function navigateTo($route, $component = null)
    {
        $this->currentPage = $route;
        
        if ($component) {
            $this->currentComponent = $component;
        } else {
            // Chercher le composant dans la structure du menu
            $this->currentComponent = $this->findComponentForRoute($route);
        }

        // Mettre à jour l'URL sans rechargement
        $this->dispatch('url-changed', route: $route);
    }

    private function findComponentForRoute($route)
    {
        foreach ($this->menuItems as $menuItem) {
            if (isset($menuItem['route']) && $menuItem['route'] === $route) {
                return $menuItem['livewire_component'] ?? 'dashboard.main';
            }
            
            if (!empty($menuItem['children'])) {
                foreach ($menuItem['children'] as $child) {
                    if (isset($child['route']) && $child['route'] === $route) {
                        return $child['livewire_component'] ?? 'dashboard.main';
                    }
                }
            }
        }
        
        return 'dashboard.main';
    }

    public function refreshMenu()
    {
        MenuService::clearMenuCache();
        $this->loadMenuData();
    }

    public function updateBadges()
    {
        $badges = MenuService::updateMenuBadges();
        $this->dispatch('badges-updated', badges: $badges);
    }

    public function render()
    {
        return view('livewire.main-layout');
    }
}