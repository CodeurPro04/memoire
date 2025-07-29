@php
    use App\Services\MenuService;
    $menuItems = MenuService::getMenuStructure();
    $connectivityStats = MenuService::getConnectivityStats();
@endphp

<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme elephant-menu">
  <!-- Logo/Brand -->
  <div class="app-brand demo">
    <a href="{{ url('/') }}" class="app-brand-link d-flex align-items-center">
      <div class="app-brand-logo me-2">
        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M16 2C8.268 2 2 8.268 2 16s6.268 14 14 14 14-6.268 14-14S23.732 2 16 2zm0 2c6.617 0 12 5.383 12 12s-5.383 12-12 12S4 22.617 4 16 9.383 4 16 4z" fill="#667eea"/>
          <path d="M12 10h8v2h-8zm0 4h8v2h-8zm0 4h6v2h-6z" fill="#667eea"/>
          <circle cx="22" cy="10" r="3" fill="#f093fb"/>
        </svg>
      </div>
      <span class="app-brand-text demo menu-text fw-bold text-primary">ÉLÉPHANT</span>
    </a>
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    @foreach($menuItems as $menuItem)
      @if(isset($menuItem['type']) && $menuItem['type'] === 'divider')
        <!-- Divider -->
        <li class="menu-header small text-uppercase">
          <span class="menu-header-text">{{ $menuItem['title'] }}</span>
        </li>
      @else
        @if(empty($menuItem['children']))
          <!-- Menu simple -->
          <li class="menu-item {{ MenuService::isMenuActive($menuItem['active_patterns']) ? 'active' : '' }}">
            <a class="menu-link" href="{{ $menuItem['route'] ? route($menuItem['route']) : '#' }}" wire:navigate>
              <div class="menu-content">
                <div class="menu-left">
                  <i class="menu-icon tf-icons {{ $menuItem['icon'] }} {{ $menuItem['icon_color'] ?? '' }}" 
                     @if(isset($menuItem['icon_style'])) style="{{ $menuItem['icon_style'] }}" @endif></i>
                  <div class="menu-text">{{ $menuItem['title'] }}</div>
                </div>
                <div class="menu-right">
                  @if($menuItem['badge'])
                    <div class="menu-badge">
                      <span class="badge {{ $menuItem['badge']['color'] }} rounded-pill">{{ $menuItem['badge']['text'] }}</span>
                    </div>
                  @endif
                  @if(MenuService::isMenuActive($menuItem['active_patterns']))
                    <div class="menu-badge">
                      <span class="badge bg-primary rounded-pill">•</span>
                    </div>
                  @endif
                </div>
              </div>
            </a>
          </li>
        @else
          <!-- Menu avec sous-menus -->
          <li class="menu-item {{ MenuService::isMenuOpen($menuItem) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <div class="menu-content">
                <div class="menu-left">
                  <i class="menu-icon tf-icons {{ $menuItem['icon'] }} {{ $menuItem['icon_color'] ?? '' }}"></i>
                  <div class="menu-text">{{ $menuItem['title'] }}</div>
                </div>
                <div class="menu-right">
                  @if($menuItem['badge'])
                    <div class="menu-badge">
                      <span class="badge {{ $menuItem['badge']['color'] }} rounded-pill">{{ $menuItem['badge']['text'] }}</span>
                    </div>
                  @endif
                </div>
              </div>
            </a>
            <ul class="menu-sub">
              @foreach($menuItem['children'] as $child)
                <li class="menu-item {{ MenuService::isMenuActive($child['active_patterns']) ? 'active' : '' }}">
                  <a class="menu-link" href="{{ $child['route'] ? route($child['route']) : '#' }}" wire:navigate>
                    <div class="menu-content">
                      <div class="menu-left">
                        <i class="menu-icon tf-icons {{ $child['icon'] }}"
                           @if(isset($child['icon_style'])) style="{{ $child['icon_style'] }}" @endif></i>
                        <div class="menu-text">{{ $child['title'] }}</div>
                      </div>
                      <div class="menu-right">
                        @if(isset($child['badge']))
                          <div class="menu-badge">
                            <span class="badge {{ $child['badge']['color'] }} rounded-pill">{{ $child['badge']['text'] }}</span>
                          </div>
                        @endif
                      </div>
                    </div>
                  </a>
                </li>
              @endforeach
            </ul>
          </li>
        @endif
      @endif
    @endforeach
  </ul>

  <!-- Informations sur la connectivité -->
  <div class="menu-footer p-3">
    <div class="card bg-light border-0 shadow-sm">
      <div class="card-body p-2">
        <div class="d-flex align-items-center mb-2">
          <i class="bx bx-wifi text-success me-2"></i>
          <small class="text-muted">{{ __('Connectivité') }}</small>
        </div>
        <div class="d-flex justify-content-between">
          <small class="text-success">{{ __('En ligne') }}: {{ $connectivityStats['online_percentage'] }}%</small>
          <small class="text-warning">{{ __('Hors ligne') }}: {{ $connectivityStats['offline_percentage'] }}%</small>
        </div>
        <div class="progress mt-1" style="height: 3px;">
          <div class="progress-bar bg-success" style="width: {{ $connectivityStats['online_percentage'] }}%"></div>
          <div class="progress-bar bg-warning" style="width: {{ $connectivityStats['offline_percentage'] }}%"></div>
        </div>
      </div>
    </div>
  </div>
</aside>
<!-- / Menu -->

<!-- Styles CSS personnalisés -->
<style>
  .elephant-menu {
    background: linear-gradient(135deg, #f8f9ff 0%, #ffffff 100%);
    border-right: 1px solid rgba(102, 126, 234, 0.1);
  }

  .elephant-menu .app-brand {
    padding: 1.5rem 1rem;
    border-bottom: 1px solid rgba(102, 126, 234, 0.1);
  }

  .elephant-menu .app-brand-text {
    font-size: 1.2rem;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }

  /* Structure principale du menu-link */
  .elephant-menu .menu-link {
    padding: 0.75rem 1rem;
    display: flex;
    align-items: center;
    text-decoration: none;
    color: inherit;
    transition: all 0.2s ease-in-out;
    width: 100%;
    box-sizing: border-box;
  }

  .elephant-menu .menu-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    min-height: 24px; /* Hauteur minimale pour éviter les variations */
  }

  .elephant-menu .menu-left {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    flex: 1;
    min-width: 0; /* Pour permettre au texte de se tronquer */
    overflow: hidden;
  }

  .elephant-menu .menu-right {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-left: 1rem; /* Espace entre le texte et les éléments de droite */
    flex-shrink: 0;
    height: 24px; /* Hauteur fixe pour alignement */
  }

  .elephant-menu .menu-icon {
    font-size: 1.2rem;
    flex-shrink: 0;
    width: 20px;
    height: 20px;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .elephant-menu .menu-text {
    flex: 1;
    min-width: 0;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    line-height: 1.2;
  }

  .elephant-menu .menu-arrow {
    font-size: 1rem;
    transition: transform 0.3s ease;
    color: #8a92a5;
    width: 16px;
    height: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .elephant-menu .menu-item.open > .menu-link .menu-arrow i {
    transform: rotate(90deg);
  }

  .elephant-menu .menu-badge {
    display: flex;
    align-items: center;
    height: 20px;
  }

  .elephant-menu .menu-badge .badge {
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
    line-height: 1;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 20px;
    height: 20px;
  }

  /* États actifs */
  .elephant-menu .menu-item.active > .menu-link {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(240, 147, 251, 0.1) 100%);
    border-left: 3px solid #667eea;
    color: #667eea;
    font-weight: 600;
  }

  .elephant-menu .menu-item.active > .menu-link .menu-icon {
    color: #667eea !important;
  }

  .elephant-menu .menu-link:hover {
    background: rgba(102, 126, 234, 0.05);
    transform: translateX(3px);
  }

  .elephant-menu .menu-sub .menu-item.active > .menu-link {
    background: linear-gradient(90deg, rgba(102, 126, 234, 0.1) 0%, transparent 100%);
    border-left: 2px solid #667eea;
    color: #667eea;
    font-weight: 500;
  }

  /* Sous-menus */
  .elephant-menu .menu-sub {
    transition: all 0.3s ease-in-out;
    padding-left: 0;
    list-style: none;
    margin: 0;
  }

  .elephant-menu .menu-sub .menu-link {
    padding-left: 3rem; /* Indentation pour les sous-menus */
    padding-right: 1rem;
  }

  .elephant-menu .menu-sub .menu-left {
    gap: 0.5rem; /* Gap réduit pour les sous-menus */
  }

  .elephant-menu .menu-item.open .menu-sub {
    background: rgba(102, 126, 234, 0.02);
  }

  /* Headers */
  .elephant-menu .menu-header {
    color: #8a92a5;
    font-weight: 600;
    font-size: 0.75rem;
    padding: 1rem 1.5rem 0.5rem;
    margin-top: 1rem;
  }

  /* Footer */
  .elephant-menu .menu-footer {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
  }

  .elephant-menu .menu-inner {
    padding-bottom: 120px; /* Space for footer */
  }

  /* Badges colorés */
  .badge.bg-primary { background-color: #667eea !important; }
  .badge.bg-success { background-color: #28a745 !important; }
  .badge.bg-info { background-color: #17a2b8 !important; }
  .badge.bg-warning { background-color: #ffc107 !important; }
  .badge.bg-danger { background-color: #dc3545 !important; }

  /* Couleurs spécifiques pour les icônes */
  .text-purple { color: #6f42c1 !important; }
  .text-orange { color: #fd7e14 !important; }
  .text-cyan { color: #20c997 !important; }
  .text-teal { color: #20c997 !important; }

  /* Responsive */
  @media (max-width: 1199px) {
    .elephant-menu .menu-footer {
      position: relative;
      bottom: auto;
    }
    
    .elephant-menu .menu-inner {
      padding-bottom: 1rem;
    }
  }

  /* Amélioration de l'espacement sur mobile */
  @media (max-width: 767px) {
    .elephant-menu .menu-right {
      margin-left: 0.5rem;
    }
    
    .elephant-menu .menu-left {
      gap: 0.5rem;
    }
    
    .elephant-menu .menu-link {
      padding: 0.75rem 0.75rem;
    }
    
    .elephant-menu .menu-sub .menu-link {
      padding-left: 2.5rem;
      padding-right: 0.75rem;
    }
  }

  /* Corrections supplémentaires pour l'alignement */
  .elephant-menu .menu-inner {
    padding-bottom: 120px;
    overflow-x: hidden; /* Éviter le débordement horizontal */
  }

  .elephant-menu .menu-item {
    width: 100%;
  }

  .elephant-menu .menu-link {
    overflow: hidden; /* Éviter le débordement */
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Toggle the 'open' class when the menu-toggle is clicked
    document.querySelectorAll('.menu-toggle').forEach(function(menuToggle) {
      menuToggle.addEventListener('click', function(e) {
        e.preventDefault();
        const menuItem = menuToggle.closest('.menu-item');
        
        // Close all other open menu items
        document.querySelectorAll('.menu-item.open').forEach(function(openItem) {
          if (openItem !== menuItem) {
            openItem.classList.remove('open');
          }
        });
        
        // Toggle the 'open' class on the clicked menu-item
        menuItem.classList.toggle('open');
      });
    });

    // Keep parent menu open if child is active
    document.querySelectorAll('.menu-sub .menu-item.active').forEach(function(activeSubmenu) {
      const parentMenuItem = activeSubmenu.closest('.menu-item');
      if (parentMenuItem) {
        parentMenuItem.classList.add('open');
      }
    });

    // Add smooth hover effects
    document.querySelectorAll('.menu-link').forEach(function(menuLink) {
      menuLink.addEventListener('mouseenter', function() {
        this.style.transform = 'translateX(3px)';
      });
      
      menuLink.addEventListener('mouseleave', function() {
        this.style.transform = 'translateX(0)';
      });
    });
  });
</script>