<nav class="layout-navbar  navbar " id="layout-navbar">
  
  <!-- Mobile Menu Toggle -->


  <!-- Right Navigation -->
  <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
    <ul class="navbar-nav flex-row align-items-center">
     <!-- Global Search -->
    <li class="nav-item me-3 d-none d-lg-block">
      <div class="search-container">
        <div class="input-group search-input-modern">
          <span class="input-group-text bg-transparent border-0">
            <i class="bx bx-search text-muted"></i>
          </span>
          <input 
            type="text" 
            class="form-control search-field border-0 bg-transparent" 
            placeholder="Rechercher patients, médecins..."
            autocomplete="off">
        </div>
        <div class="search-results dropdown-menu w-100 shadow-lg border-0" style="display: none;">
          <div class="dropdown-header">Résultats de recherche</div>
          <div class="search-results-content">
            <!-- Résultats dynamiques -->
          </div>
        </div>
      </div>
    </li>

      <!-- Notifications -->
      <li class="nav-item dropdown me-3">
        <a class="nav-link position-relative p-2 notification-trigger" href="javascript:void(0);" data-bs-toggle="dropdown">
          <i class="bx bx-bell fs-5 text-muted"></i>
          <span class="notification-badge">{{ $unreadNotifications ?? 4 }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-end notification-dropdown shadow-lg border-0">
          <div class="notification-header">
            <h6 class="mb-0">Notifications</h6>
            <span class="badge bg-primary rounded-pill">{{ $unreadNotifications ?? 4 }}</span>
          </div>
          
          <div class="notification-list">
            <!-- Notification Item -->
            <div class="notification-item">
              <div class="notification-avatar bg-success">
                <i class="bx bx-user-plus text-white"></i>
              </div>
              <div class="notification-content">
                <div class="notification-title">Nouveau médecin</div>
                <div class="notification-text">Dr. Kouamé Yao s'est inscrit</div>
                <div class="notification-time">Il y a 2 heures</div>
              </div>
            </div>

            <div class="notification-item">
              <div class="notification-avatar bg-warning">
                <i class="bx bx-calendar-x text-white"></i>
              </div>
              <div class="notification-content">
                <div class="notification-title">Rendez-vous annulé</div>
                <div class="notification-text">Marie Diabaté - 14h30</div>
                <div class="notification-time">Il y a 1 heure</div>
              </div>
            </div>

            <div class="notification-item">
              <div class="notification-avatar bg-info">
                <i class="bx bx-message-dots text-white"></i>
              </div>
              <div class="notification-content">
                <div class="notification-title">Campagne SMS</div>
                <div class="notification-text">Vaccination - 89% de succès</div>
                <div class="notification-time">Il y a 3 heures</div>
              </div>
            </div>
          </div>
          
          <div class="notification-footer">
            <a href="#" class="text-primary text-decoration-none">Voir toutes les notifications</a>
          </div>
        </div>
      </li>

      <!-- Language Selector -->
      <li class="nav-item dropdown me-3">
        <a class="nav-link p-2 language-selector" href="javascript:void(0);" data-bs-toggle="dropdown">
          <div class="d-flex align-items-center">
            <span class="flag-ci me-1"></span>
            <span class="d-none d-md-inline text-muted small">FR</span>
            <i class="bx bx-chevron-down fs-6 text-muted ms-1"></i>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end language-dropdown shadow-lg border-0">
          <div class="dropdown-header">Choisir la langue</div>
          <a class="dropdown-item active" href="#" data-lang="fr">
            <span class="flag-ci me-2"></span>
            <span>Français</span>
            <i class="bx bx-check ms-auto text-success"></i>
          </a>
          <a class="dropdown-item" href="#" data-lang="dioula">
            <span class="flag-ml me-2"></span>
            <span>Dioula</span>
          </a>
          <a class="dropdown-item" href="#" data-lang="baoule">
            <span class="flag-ci me-2"></span>
            <span>Baoulé</span>
          </a>
        </div>
      </li>

      <!-- User Profile -->
      <li class="nav-item navbar-dropdown dropdown-user dropdown">
        @if (Auth::check())
          <a class="nav-link dropdown-toggle hide-arrow user-avatar" href="javascript:void(0);" data-bs-toggle="dropdown">
            <div class="avatar-wrapper">
              <img src="{{ Auth::user()->profile_photo_url ?? asset('assets/img/avatars/1.png') }}" 
                   alt="{{ Auth::user()->name }}" 
                   class="avatar-img">
              <div class="avatar-status online"></div>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end user-dropdown shadow-lg border-0">
            <!-- User Info Header -->
            <div class="user-info-header">
              <div class="d-flex align-items-center">
                <div class="avatar-wrapper me-3">
                  <img src="{{ Auth::user()->profile_photo_url ?? asset('assets/img/avatars/1.png') }}" 
                       alt="{{ Auth::user()->name }}" 
                       class="avatar-img">
                  <div class="avatar-status online"></div>
                </div>
                <div class="user-details">
                  <h6 class="user-name mb-0">{{ Auth::user()->name }}</h6>
                  <div class="user-role">
                    @if(Auth::user()->role == 'admin')
                      <i class="bx bx-shield-check text-primary me-1"></i>
                      <span class="text-primary">Administrateur</span>
                    @elseif(Auth::user()->role == 'doctor')
                      <i class="bx bx-user-check text-success me-1"></i>
                      <span class="text-success">Médecin</span>
                    @else
                      <i class="bx bx-user text-muted me-1"></i>
                      <span class="text-muted">Utilisateur</span>
                    @endif
                  </div>
                </div>
              </div>
            </div>

            <div class="dropdown-divider"></div>

            <!-- Menu Items -->
            <a class="dropdown-item menu-item {{ request()->routeIs('settings.profile') ? 'active' : '' }}" 
               href="{{ route('settings.profile') }}" wire:navigate>
              <i class="bx bx-user menu-icon"></i>
              <span>Mon profil</span>
            </a>

            <a class="dropdown-item menu-item {{ request()->routeIs('settings.password') ? 'active' : '' }}" 
               href="{{ route('settings.password') }}" wire:navigate>
              <i class="bx bx-cog menu-icon"></i>
              <span>Paramètres</span>
            </a>

            <a class="dropdown-item menu-item" href="#">
              <i class="bx bx-help-circle menu-icon"></i>
              <span>Centre d'aide</span>
            </a>

            <div class="dropdown-divider"></div>

            <!-- System Status in User Menu -->
            <div class="system-info">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="small text-muted">Statut système</span>
                <span class="badge bg-success small">Opérationnel</span>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <span class="small text-muted">SMS Gateway</span>
                <span class="badge bg-success small">89% OK</span>
              </div>
            </div>

            <div class="dropdown-divider"></div>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button class="dropdown-item menu-item logout-btn" type="submit">
                <i class="bx bx-power-off menu-icon text-danger"></i>
                <span class="text-danger">Se déconnecter</span>
              </button>
            </form>
          </div>
        @else
          <!-- Not logged in -->
          <a class="nav-link dropdown-toggle hide-arrow user-avatar" href="javascript:void(0);" data-bs-toggle="dropdown">
            <div class="avatar-wrapper">
              <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Guest" class="avatar-img">
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end user-dropdown shadow-lg border-0">
            <a class="dropdown-item menu-item" href="{{ route('login') }}">
              <i class="bx bx-log-in menu-icon text-primary"></i>
              <span class="text-primary">Se connecter</span>
            </a>
          </div>
        @endif
      </li>
    </ul>
  </div>
</nav>

<style>
/* Navbar Modern Styles */
.elephant-navbar-modern {
  background: #ffffff;
  border-bottom: 1px solid #e8ecf4;
  box-shadow: 0 2px 20px rgba(31, 45, 61, 0.05);
  backdrop-filter: blur(20px);
  height: 70px;
  padding: 0 1.5rem;
}

/* Page Title */
.page-title-wrapper .page-title {
  color: #1e293b;
  font-size: 1.25rem;
  font-weight: 700;
  line-height: 1.2;
}

.page-title-wrapper .page-subtitle {
  font-size: 0.75rem;
  color: #64748b;
  margin-top: 2px;
}

/* Search Container */
.search-container {
  position: relative;
  width: 320px;
}

.search-input-modern {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  transition: all 0.3s ease;
  overflow: hidden;
}

.search-input-modern:focus-within {
  background: #ffffff;
  border-color: #667eea;
  box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.search-field {
  height: 42px;
  font-size: 0.875rem;
  color: #374151;
}

.search-field::placeholder {
  color: #9ca3af;
}

.search-field:focus {
  box-shadow: none;
  border: none;
  outline: none;
}

/* System Status */
.system-status-indicator {
  display: flex;
  align-items: center;
  gap: 6px;
}

.status-dot {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  animation: pulse 2s infinite;
}

.status-dot.online {
  background-color: #10b981;
}

.status-dot.offline {
  background-color: #ef4444;
}

@keyframes pulse {
  0%, 100% { opacity: 1; }
  50% { opacity: 0.6; }
}

/* Quick Stats */
.quick-stats {
  padding: 8px 12px;
  background: #f8fafc;
  border-radius: 10px;
  border: 1px solid #e2e8f0;
}

.stat-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
}

.stat-number {
  font-size: 0.875rem;
  line-height: 1.2;
}

.stat-label {
  font-size: 0.7rem;
  line-height: 1;
  white-space: nowrap;
}

/* Notifications */
.notification-trigger {
  position: relative;
  transition: all 0.2s ease;
}

.notification-trigger:hover {
  background-color: #f8fafc;
  border-radius: 8px;
}

.notification-badge {
  position: absolute;
  top: -4px;
  right: -4px;
  background: #ef4444;
  color: white;
  font-size: 0.7rem;
  font-weight: 600;
  padding: 2px 6px;
  border-radius: 10px;
  min-width: 18px;
  height: 18px;
  display: flex;
  align-items: center;
  justify-content: center;
  line-height: 1;
}

.notification-dropdown {
  width: 360px;
  border-radius: 12px;
  overflow: hidden;
  margin-top: 8px;
}

.notification-header {
  display: flex;
  justify-content: between;
  align-items: center;
  padding: 1rem 1.25rem;
  background: #f8fafc;
  border-bottom: 1px solid #e2e8f0;
}

.notification-list {
  max-height: 400px;
  overflow-y: auto;
}

.notification-item {
  display: flex;
  align-items: flex-start;
  padding: 1rem 1.25rem;
  border-bottom: 1px solid #f1f5f9;
  transition: background-color 0.2s ease;
}

.notification-item:hover {
  background-color: #f8fafc;
}

.notification-avatar {
  width: 36px;
  height: 36px;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-right: 12px;
  flex-shrink: 0;
}

.notification-content {
  flex: 1;
  min-width: 0;
}

.notification-title {
  font-weight: 600;
  font-size: 0.875rem;
  color: #1e293b;
  margin-bottom: 4px;
}

.notification-text {
  font-size: 0.8rem;
  color: #64748b;
  margin-bottom: 4px;
}

.notification-time {
  font-size: 0.75rem;
  color: #94a3b8;
}

.notification-footer {
  padding: 1rem 1.25rem;
  text-align: center;
  background: #f8fafc;
  border-top: 1px solid #e2e8f0;
}

/* Language Selector */
.language-selector {
  transition: all 0.2s ease;
}

.language-selector:hover {
  background-color: #f8fafc;
  border-radius: 8px;
}

.language-dropdown {
  width: 200px;
  border-radius: 12px;
  overflow: hidden;
  margin-top: 8px;
}

.language-dropdown .dropdown-item {
  padding: 0.75rem 1rem;
  display: flex;
  align-items: center;
  transition: all 0.2s ease;
}

.language-dropdown .dropdown-item:hover {
  background-color: #f8fafc;
}

.language-dropdown .dropdown-item.active {
  background-color: #eff6ff;
  color: #2563eb;
}

/* Flag Icons */
.flag-ci, .flag-ml {
  width: 20px;
  height: 15px;
  border-radius: 2px;
  display: inline-block;
  background-size: cover;
  background-position: center;
}

.flag-ci {
  background-image: linear-gradient(to right, #ff7900 0%, #ff7900 33%, #ffffff 33%, #ffffff 66%, #009639 66%);
}

.flag-ml {
  background-image: linear-gradient(to right, #14b53a 0%, #14b53a 33%, #fcd116 33%, #fcd116 66%, #ce1126 66%);
}

/* User Avatar */
.user-avatar {
  transition: all 0.2s ease;
}

.user-avatar:hover {
  transform: translateY(-1px);
}

.avatar-wrapper {
  position: relative;
  width: 40px;
  height: 40px;
}

.avatar-img {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  object-fit: cover;
  border: 2px solid #ffffff;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.avatar-status {
  position: absolute;
  bottom: 0;
  right: 0;
  width: 12px;
  height: 12px;
  border-radius: 50%;
  border: 2px solid #ffffff;
}

.avatar-status.online {
  background-color: #10b981;
}

.avatar-status.offline {
  background-color: #ef4444;
}

/* User Dropdown */
.user-dropdown {
  width: 280px;
  border-radius: 12px;
  overflow: hidden;
  margin-top: 8px;
}

.user-info-header {
  padding: 1.25rem;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
}

.user-info-header .user-name {
  color: white;
  font-weight: 600;
}

.user-info-header .user-role {
  font-size: 0.8rem;
  opacity: 0.9;
}

.user-info-header .avatar-img {
  border-color: rgba(255, 255, 255, 0.3);
}

.menu-item {
  display: flex;
  align-items: center;
  padding: 0.75rem 1.25rem;
  transition: all 0.2s ease;
  text-decoration: none;
  color: #374151;
}

.menu-item:hover {
  background-color: #f8fafc;
  color: #374151;
}

.menu-item.active {
  background-color: #eff6ff;
  color: #2563eb;
}

.menu-icon {
  width: 20px;
  margin-right: 12px;
  font-size: 1.1rem;
}

.system-info {
  padding: 0.75rem 1.25rem;
  background: #f8fafc;
  border-top: 1px solid #e2e8f0;
  border-bottom: 1px solid #e2e8f0;
}

.logout-btn {
  border: none;
  background: none;
  width: 100%;
  text-align: left;
}

.logout-btn:hover {
  background-color: #fef2f2;
}

/* Responsive */
@media (max-width: 1199px) {
  .search-container {
    width: 250px;
  }
}

@media (max-width: 991px) {
  .search-container {
    display: none;
  }
  
  .page-title-wrapper .page-title {
    font-size: 1.1rem;
  }
  
  .page-title-wrapper .page-subtitle {
    display: none;
  }
}

@media (max-width: 767px) {
  .elephant-navbar-modern {
    height: 60px;
    padding: 0 1rem;
  }
  
  .notification-dropdown,
  .user-dropdown {
    width: 300px;
  }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Search functionality
  const searchField = document.querySelector('.search-field');
  const searchResults = document.querySelector('.search-results');
  
  if (searchField && searchResults) {
    searchField.addEventListener('input', function() {
      const query = this.value.trim();
      
      if (query.length > 2) {
        // Show search results
        searchResults.style.display = 'block';
        
        // Simulate search results (replace with actual API call)
        const mockResults = [
          { type: 'patient', name: 'Marie Diabaté', info: 'Patient - Abidjan' },
          { type: 'doctor', name: 'Dr. Kouamé Yao', info: 'Cardiologue - Yamoussoukro' }
        ];
        
        // You can implement actual search logic here
        console.log('Searching for:', query);
      } else {
        searchResults.style.display = 'none';
      }
    });

    // Hide search results when clicking outside
    document.addEventListener('click', function(event) {
      if (!searchField.contains(event.target) && !searchResults.contains(event.target)) {
        searchResults.style.display = 'none';
      }
    });
  }

  // Language switcher
  document.querySelectorAll('[data-lang]').forEach(function(langItem) {
    langItem.addEventListener('click', function(e) {
      e.preventDefault();
      
      // Remove active class from all items
      document.querySelectorAll('[data-lang]').forEach(item => {
        item.classList.remove('active');
        item.querySelector('.bx-check')?.remove();
      });
      
      // Add active class to selected item
      this.classList.add('active');
      
      // Add check icon
      const checkIcon = document.createElement('i');
      checkIcon.className = 'bx bx-check ms-auto text-success';
      this.appendChild(checkIcon);
      
      // Here you would implement actual language switching
      const selectedLang = this.getAttribute('data-lang');
      console.log('Language changed to:', selectedLang);
    });
  });

  // Mark notifications as read when dropdown opens
  const notificationTrigger = document.querySelector('.notification-trigger');
  if (notificationTrigger) {
    notificationTrigger.addEventListener('click', function() {
      setTimeout(() => {
        const badge = this.querySelector('.notification-badge');
        if (badge) {
          badge.style.opacity = '0.5';
        }
      }, 1000);
    });
  }

  // Update time every minute
  function updateTime() {
    const timeElement = document.querySelector('.page-subtitle');
    if (timeElement) {
      const now = new Date();
      const options = { 
        weekday: 'long', 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
      };
      const currentTime = now.toLocaleDateString('fr-FR', options);
      timeElement.textContent = currentTime;
    }
  }

  // Update time immediately and then every minute
  updateTime();
  setInterval(updateTime, 60000);
});
</script>