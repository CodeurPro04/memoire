<x-layouts.app>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- En-tête -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="h3 mb-0">{{ $patient->full_name }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('patients.index') }}">Patients</a>
                            </li>
                            <li class="breadcrumb-item active">{{ $patient->full_name }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="btn-group" role="group">
                    <a href="{{ route('patients.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Retour à la liste
                    </a>
                    <a href="{{ route('patients.edit', $patient) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Modifier
                    </a>
                    <button type="button" 
                            class="btn btn-danger" 
                            onclick="confirmDelete({{ $patient->id }})">
                        <i class="fas fa-trash me-2"></i>Supprimer
                    </button>
                </div>
            </div>

            <!-- Messages de succès -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="row">
                <!-- Colonne principale -->
                <div class="col-lg-8">
                    <!-- Informations personnelles -->
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center">
                            <div class="avatar-circle me-3">
                                {{ substr($patient->first_name, 0, 1) }}{{ substr($patient->last_name, 0, 1) }}
                            </div>
                            <div>
                                <h5 class="card-title mb-0">{{ $patient->full_name }}</h5>
                                <small class="text-muted">Patient ID: #{{ $patient->id }}</small>
                            </div>
                            <div class="ms-auto">
                                @if($patient->is_active)
                                    <span class="badge bg-success fs-6">Actif</span>
                                @else
                                    <span class="badge bg-secondary fs-6">Inactif</span>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-item mb-3">
                                        <label class="info-label">Email</label>
                                        <div class="info-value">
                                            <a href="mailto:{{ $patient->email }}">{{ $patient->email }}</a>
                                        </div>
                                    </div>
                                    <div class="info-item mb-3">
                                        <label class="info-label">Téléphone</label>
                                        <div class="info-value">
                                            <a href="tel:{{ $patient->phone }}">{{ $patient->phone }}</a>
                                        </div>
                                    </div>
                                    <div class="info-item mb-3">
                                        <label class="info-label">Date de naissance</label>
                                        <div class="info-value">{{ $patient->date_of_birth->format('d/m/Y') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-item mb-3">
                                        <label class="info-label">Âge</label>
                                        <div class="info-value">{{ $patient->age }} ans</div>
                                    </div>
                                    <div class="info-item mb-3">
                                        <label class="info-label">Sexe</label>
                                        <div class="info-value">
                                            @if($patient->gender == 'M')
                                                Masculin
                                            @elseif($patient->gender == 'F')
                                                Féminin
                                            @else
                                                {{ $patient->gender }}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="info-item mb-3">
                                        <label class="info-label">Groupe sanguin</label>
                                        <div class="info-value">
                                            @if($patient->blood_type)
                                                <span class="badge bg-info">{{ $patient->blood_type }}</span>
                                            @else
                                                <span class="text-muted">Non spécifié</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Adresse -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-map-marker-alt me-2"></i>Adresse
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="info-item mb-3">
                                <label class="info-label">Adresse complète</label>
                                <div class="info-value">{{ $patient->address }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-item mb-3">
                                        <label class="info-label">Ville</label>
                                        <div class="info-value">{{ $patient->city }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-item mb-3">
                                        <label class="info-label">Région</label>
                                        <div class="info-value">
                                            <span class="badge bg-primary">{{ $patient->region }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informations médicales -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-heartbeat me-2"></i>Informations Médicales
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="info-item mb-3">
                                <label class="info-label">Numéro d'assurance</label>
                                <div class="info-value">
                                    {{ $patient->insurance_number ?: 'Non spécifié' }}
                                </div>
                            </div>
                            
                            <div class="info-item mb-3">
                                <label class="info-label">Allergies connues</label>
                                <div class="info-value">
                                    @if($patient->allergies && count($patient->allergies) > 0)
                                        @foreach($patient->allergies as $allergy)
                                            <span class="badge bg-warning text-dark me-1 mb-1">{{ $allergy }}</span>
                                        @endforeach
                                    @else
                                        <span class="text-muted">Aucune allergie connue</span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="info-item mb-3">
                                <label class="info-label">Antécédents médicaux</label>
                                <div class="info-value">
                                    @if($patient->medical_history && count($patient->medical_history) > 0)
                                        @foreach($patient->medical_history as $history)
                                            <span class="badge bg-secondary me-1 mb-1">{{ $history }}</span>
                                        @endforeach
                                    @else
                                        <span class="text-muted">Aucun antécédent médical</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Rendez-vous récents -->
                    @if($patient->appointments && $patient->appointments->count() > 0)
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-calendar-alt me-2"></i>Rendez-vous Récents
                            </h5>
                            <a href="#" class="btn btn-sm btn-outline-primary">Voir tous</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Date</th>
                                            <th>Heure</th>
                                            <th>Type</th>
                                            <th>Statut</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($patient->appointments as $appointment)
                                        <tr>
                                            <td>{{ $appointment->appointment_date->format('d/m/Y') }}</td>
                                            <td>{{ $appointment->appointment_time }}</td>
                                            <td>{{ $appointment->type }}</td>
                                            <td>
                                                <span class="badge bg-{{ $appointment->status == 'completed' ? 'success' : ($appointment->status == 'cancelled' ? 'danger' : 'warning') }}">
                                                    {{ ucfirst($appointment->status) }}
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Colonne latérale -->
                <div class="col-lg-4">
                    <!-- Contact d'urgence -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-phone-alt me-2"></i>Contact d'Urgence
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="info-item mb-3">
                                <label class="info-label">Nom</label>
                                <div class="info-value">{{ $patient->emergency_contact_name }}</div>
                            </div>
                            <div class="info-item">
                                <label class="info-label">Téléphone</label>
                                <div class="info-value">
                                    <a href="tel:{{ $patient->emergency_contact_phone }}" class="btn btn-outline-success btn-sm">
                                        <i class="fas fa-phone me-1"></i>{{ $patient->emergency_contact_phone }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Statistiques -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-chart-bar me-2"></i>Statistiques
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="stat-item mb-3">
                                <div class="d-flex justify-content-between">
                                    <span>Rendez-vous totaux</span>
                                    <strong>{{ $patient->appointments ? $patient->appointments->count() : 0 }}</strong>
                                </div>
                            </div>
                            <div class="stat-item mb-3">
                                <div class="d-flex justify-content-between">
                                    <span>Patient depuis</span>
                                    <strong>{{ $patient->created_at->format('d/m/Y') }}</strong>
                                </div>
                            </div>
                            <div class="stat-item">
                                <div class="d-flex justify-content-between">
                                    <span>Dernière mise à jour</span>
                                    <strong>{{ $patient->updated_at->format('d/m/Y') }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions rapides -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-bolt me-2"></i>Actions Rapides
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <a href="#" class="btn btn-outline-primary">
                                    <i class="fas fa-calendar-plus me-2"></i>Nouveau RDV
                                </a>
                                <a href="#" class="btn btn-outline-info">
                                    <i class="fas fa-file-medical me-2"></i>Dossier médical
                                </a>
                                <a href="#" class="btn btn-outline-success">
                                    <i class="fas fa-prescription-bottle me-2"></i>Prescriptions
                                </a>
                                <a href="mailto:{{ $patient->email }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-envelope me-2"></i>Envoyer un email
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmer la suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <i class="fas fa-exclamation-triangle fa-3x text-warning"></i>
                </div>
                <p class="text-center">
                    Êtes-vous sûr de vouloir supprimer le patient <strong>{{ $patient->full_name }}</strong> ?
                </p>
                <p class="text-center text-muted">
                    Cette action peut être annulée ultérieurement.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Annuler
                </button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-2"></i>Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.avatar-circle {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(45deg, #007bff, #0056b3);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 18px;
    flex-shrink: 0;
}

.card-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
}

.info-item {
    border-bottom: 1px solid #f1f3f4;
    padding-bottom: 0.5rem;
}

.info-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
}

.info-label {
    font-size: 0.875rem;
    font-weight: 600;
    color: #6c757d;
    margin-bottom: 0.25rem;
    display: block;
}

.info-value {
    font-size: 0.95rem;
    color: #495057;
    margin-bottom: 0;
}

.stat-item {
    padding: 0.5rem 0;
    border-bottom: 1px solid #f1f3f4;
}

.stat-item:last-child {
    border-bottom: none;
}

.breadcrumb {
    background: none;
    padding: 0;
    margin: 0;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: ">";
}

.card {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    border: 1px solid rgba(0, 0, 0, 0.125);
}

.badge {
    font-size: 0.75rem;
}

.btn-group .btn {
    border-radius: 0.375rem;
    margin-left: 0.25rem;
}

.btn-group .btn:first-child {
    margin-left: 0;
}

.table-hover tbody tr:hover {
    background-color: rgba(0, 123, 255, 0.05);
}

@media (max-width: 768px) {
    .btn-group {
        flex-direction: column;
        align-items: stretch;
    }
    
    .btn-group .btn {
        margin-left: 0;
        margin-bottom: 0.25rem;
    }
}
</style>

<script>
function confirmDelete(patientId) {
    const form = document.getElementById('deleteForm');
    form.action = `{{ route('patients.index') }}/${patientId}`;
    
    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}

// Animation d'apparition des cartes
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.card');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            card.style.transition = 'all 0.3s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });
});
</script>
</x-layouts.app>