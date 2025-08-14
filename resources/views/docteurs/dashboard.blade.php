@section('title', __('Espace Docteur'))
<x-layouts.app :title="__('Espace Docteur')">
    <div class="container-fluid">

        <h2 class="mb-4">👨‍⚕️ Bonjour Dr. {{ Auth::user()->name ?? 'Nom' }} !</h2>

        <div class="row g-4">
            <!-- Stats principales du doc -->
            <div class="col-lg-3">
                <div class="card card-mini text-white"
                    style="background: linear-gradient(135deg, #4e54c8 0%, #8f94fb 100%)">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="mb-1 text-white-50">Patients suivis</h6>
                            <h4 class="card-title fw-bold">{{ number_format($myPatientsCount ?? 78) }}</h4>
                        </div>
                        <div><i class="bx bx-user-check icon-stat"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-mini text-white"
                style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%)">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="mb-1 text-white-50">Rendez-vous à venir</h6>
                        <h4 class="card-title fw-bold">{{ number_format($upcomingAppointments ?? 15) }}</h4>
                    </div>
                    <div><i class="bx bx-calendar-check icon-stat"></i></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-mini text-white"
                style="background: linear-gradient(135deg, #ff6a00 0%, #ee0979 100%)">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="mb-1 text-white-50">Consultations ce mois</h6>
                        <h4 class="card-title fw-bold">{{ number_format($consultationsThisMonth ?? 42) }}</h4>
                    </div>
                    <div><i class="bx bx-stethoscope icon-stat"></i></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-mini text-white"
                style="background: linear-gradient(135deg, #7b4397 0%, #dc2430 100%)">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="mb-1 text-white-50">Messages reçus</h6>
                        <h4 class="card-title fw-bold">{{ number_format($messagesCount ?? 9) }}</h4>
                    </div>
                    <div><i class="bx bx-message-dots icon-stat"></i></div>
                </div>
            </div>
        </div>

        <!-- Liste des prochains rendez-vous -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-transparent border-0 pb-0 d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <i class="bx bx-calendar-event text-primary me-2"></i>
                        Prochains rendez-vous
                    </h5>
                    <a href="{{ route('doctor.appointments') }}" class="btn btn-sm btn-outline-primary">Voir
                        tout</a>
                </div>
                <div class="card-body">
                    @if (count($upcomingAppointmentsList ?? []) > 0)
                        <ul class="list-group list-group-flush">
                            @foreach ($upcomingAppointmentsList as $appt)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $appt->patient_name }}</strong><br>
                                        <small class="text-muted">{{ $appt->date->format('d M Y, H:i') }}</small>
                                    </div>
                                    <span class="badge bg-success">{{ ucfirst($appt->status) }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted mb-0">Aucun rendez-vous à venir.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Liste des patients récents -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-transparent border-0 pb-0 d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <i class="bx bx-user-circle text-info me-2"></i>
                        Patients récents
                    </h5>
                    <a href="{{ route('doctor.patients') }}" class="btn btn-sm btn-outline-info">Voir tout</a>
                </div>
                <div class="card-body">
                    @if (count($recentPatients ?? []) > 0)
                        <ul class="list-group list-group-flush">
                            @foreach ($recentPatients as $patient)
                                <li class="list-group-item">
                                    {{ $patient->name }} - {{ $patient->age }} ans
                                    <small
                                        class="text-muted d-block">{{ $patient->last_visit ? $patient->last_visit->format('d M Y') : 'Jamais consulté' }}</small>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted mb-0">Aucun patient récent.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Fil d'actualité rapide -->
        <div class="col-lg-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-transparent border-0">
                    <h5 class="card-title mb-0">
                        <i class="bx bx-bell text-warning me-2"></i>
                        Activités récentes
                    </h5>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        @foreach ($doctorActivities ?? [] as $activity)
                            <div class="timeline-item">
                                <div class="timeline-marker bg-{{ $activity['color'] ?? 'primary' }}"></div>
                                <div class="timeline-content">
                                    <h6 class="mb-1">{{ $activity['title'] }}</h6>
                                    <p class="text-muted mb-1">{{ $activity['desc'] }}</p>
                                    <small class="text-muted">{{ $activity['time'] }}</small>
                                </div>
                            </div>
                        @endforeach
                        @if (empty($doctorActivities))
                            <p class="text-muted">Pas d'activité récente.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Styles CSS personnalisés réutilisables -->
    <style>
        .icon-stat {
            font-size: 2rem;
            opacity: 0.7;
        }

        .card-mini {
            min-height: 120px;
        }

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
    </style>
    </div>
</x-layouts.app>
