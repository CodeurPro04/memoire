@section('title', __('Dashboard'))
<x-layouts.app :title="__('Dashboard')">
    <div class="row g-4">
        <!-- Statistiques principales -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <div class="card-body d-flex align-items-center justify-content-between text-white">
                    <div>
                        <h6 class="card-subtitle mb-2 text-white-50">Patients inscrits</h6>
                        <h2 class="card-title mb-0 fw-bold">{{ number_format($totalPatients ?? 1247) }}</h2>
                        <small class="text-white-50">
                            <i class="fas fa-arrow-up me-1"></i>+12% ce mois
                        </small>
                    </div>
                    <div class="text-white" style="font-size: 3rem; opacity: 0.3;">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                <div class="card-body d-flex align-items-center justify-content-between text-white">
                    <div>
                        <h6 class="card-subtitle mb-2 text-white-50">Professionnels actifs</h6>
                        <h2 class="card-title mb-0 fw-bold">{{ number_format($totalDoctors ?? 89) }}</h2>
                        <small class="text-white-50">
                            <i class="fas fa-arrow-up me-1"></i>+5% ce mois
                        </small>
                    </div>
                    <div class="text-white" style="font-size: 3rem; opacity: 0.3;">
                        <i class="fas fa-user-md"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                <div class="card-body d-flex align-items-center justify-content-between text-white">
                    <div>
                        <h6 class="card-subtitle mb-2 text-white-50">Rendez-vous aujourd'hui</h6>
                        <h2 class="card-title mb-0 fw-bold">{{ number_format($todayAppointments ?? 156) }}</h2>
                        <small class="text-white-50">
                            <i class="fas fa-calendar-check me-1"></i>{{ number_format($pendingAppointments ?? 23) }} en attente
                        </small>
                    </div>
                    <div class="text-white" style="font-size: 3rem; opacity: 0.3;">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistiques par région -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-transparent border-0 pb-0">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-map-marker-alt text-primary me-2"></i>
                        Répartition par région
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="fas fa-city text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0">Abidjan</h6>
                                    <small class="text-muted">{{ number_format($abidjanUsers ?? 456) }} utilisateurs</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="bg-success rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="fas fa-building text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0">Yamoussoukro</h6>
                                    <small class="text-muted">{{ number_format($yamoussoukroUsers ?? 123) }} utilisateurs</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="fas fa-tree text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0">Bouaké</h6>
                                    <small class="text-muted">{{ number_format($bouakeUsers ?? 89) }} utilisateurs</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="bg-info rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="fas fa-mountain text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0">Zones rurales</h6>
                                    <small class="text-muted">{{ number_format($ruralUsers ?? 234) }} utilisateurs</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Spécialités les plus demandées -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-transparent border-0 pb-0">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-stethoscope text-success me-2"></i>
                        Spécialités populaires
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        @php
                        $specialties = [
                            ['name' => 'Médecine générale', 'count' => 345, 'icon' => 'user-md', 'color' => 'primary'],
                            ['name' => 'Pédiatrie', 'count' => 189, 'icon' => 'baby', 'color' => 'success'],
                            ['name' => 'Gynécologie', 'count' => 156, 'icon' => 'female', 'color' => 'warning'],
                            ['name' => 'Sage-femme', 'count' => 134, 'icon' => 'heart', 'color' => 'info'],
                        ];
                        @endphp
                        
                        @foreach($specialties as $specialty)
                        <div class="col-12">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="bg-{{ $specialty['color'] }} rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                        <i class="fas fa-{{ $specialty['icon'] }} text-white" style="font-size: 0.8rem;"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0">{{ $specialty['name'] }}</h6>
                                        <span class="badge bg-light text-dark">{{ $specialty['count'] }}</span>
                                    </div>
                                    <div class="progress mt-1" style="height: 4px;">
                                        <div class="progress-bar bg-{{ $specialty['color'] }}" style="width: {{ ($specialty['count'] / 345) * 100 }}%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Graphique des rendez-vous et notifications récentes -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-chart-line text-info me-2"></i>
                        Évolution des rendez-vous
                    </h5>
                    <div class="btn-group" role="group">
                        <input type="radio" class="btn-check" name="period" id="week" checked>
                        <label class="btn btn-outline-primary btn-sm" for="week">7J</label>
                        <input type="radio" class="btn-check" name="period" id="month">
                        <label class="btn btn-outline-primary btn-sm" for="month">30J</label>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="appointmentsChart" height="100"></canvas>
                </div>
            </div>
        </div>

        <!-- Activités récentes -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-transparent border-0 pb-0">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-bell text-warning me-2"></i>
                        Activités récentes
                    </h5>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker bg-success"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Nouveau praticien</h6>
                                <p class="text-muted mb-1">Dr. Kouamé s'est inscrit</p>
                                <small class="text-muted">Il y a 2h</small>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-primary"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Rendez-vous confirmé</h6>
                                <p class="text-muted mb-1">45 rendez-vous confirmés aujourd'hui</p>
                                <small class="text-muted">Il y a 4h</small>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-warning"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Message de sensibilisation</h6>
                                <p class="text-muted mb-1">Campagne vaccination envoyée</p>
                                <small class="text-muted">Il y a 6h</small>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-info"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Nouveaux patients</h6>
                                <p class="text-muted mb-1">23 nouveaux patients inscrits</p>
                                <small class="text-muted">Hier</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alertes système -->
        <div class="col-lg-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-transparent border-0">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-exclamation-triangle text-danger me-2"></i>
                        Alertes système
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-lg-3">
                            <div class="alert alert-warning border-0 shadow-sm">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-wifi text-warning me-2"></i>
                                    <div>
                                        <h6 class="alert-heading mb-1">Connectivité</h6>
                                        <p class="mb-0 small">12% d'utilisateurs en mode hors-ligne</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="alert alert-info border-0 shadow-sm">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-sms text-info me-2"></i>
                                    <div>
                                        <h6 class="alert-heading mb-1">SMS</h6>
                                        <p class="mb-0 small">89% de taux de livraison SMS</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="alert alert-success border-0 shadow-sm">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-mobile-alt text-success me-2"></i>
                                    <div>
                                        <h6 class="alert-heading mb-1">Orange Money</h6>
                                        <p class="mb-0 small">156 paiements traités</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="alert alert-primary border-0 shadow-sm">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-language text-primary me-2"></i>
                                    <div>
                                        <h6 class="alert-heading mb-1">Langues</h6>
                                        <p class="mb-0 small">67% FR, 23% Dioula, 10% Baoulé</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Styles CSS personnalisés -->
    <style>
        .timeline {
            position: relative;
            padding-left: 30px;
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            left: 15px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #e9ecef;
        }
        
        .timeline-item {
            position: relative;
            margin-bottom: 20px;
        }
        
        .timeline-item:last-child {
            margin-bottom: 0;
        }
        
        .timeline-marker {
            position: absolute;
            left: -23px;
            top: 0;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: 2px solid #fff;
        }
        
        .timeline-content h6 {
            font-size: 0.9rem;
            font-weight: 600;
        }
        
        .timeline-content p {
            font-size: 0.8rem;
            margin-bottom: 4px;
        }
        
        .timeline-content small {
            font-size: 0.75rem;
        }
        
        .card {
            transition: transform 0.2s ease-in-out;
        }
        
        .card:hover {
            transform: translateY(-2px);
        }
        
        .progress {
            background-color: rgba(0,0,0,0.1);
        }
    </style>

    <!-- Script pour le graphique -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('appointmentsChart').getContext('2d');
            
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
                    datasets: [{
                        label: 'Rendez-vous confirmés',
                        data: [65, 78, 90, 81, 56, 55, 40],
                        border: '#667eea',
                        backgroundColor: 'rgba(102, 126, 234, 0.1)',
                        tension: 0.4,
                        fill: true
                    }, {
                        label: 'Nouveaux patients',
                        data: [28, 35, 40, 45, 30, 25, 20],
                        border: '#f093fb',
                        backgroundColor: 'rgba(240, 147, 251, 0.1)',
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                usePointStyle: true,
                                padding: 20
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0,0,0,0.1)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        });
    </script>
</x-layouts.app>