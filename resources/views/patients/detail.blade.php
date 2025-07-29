<x-layouts.app>
<div class="container-fluid">
    <!-- En-tête -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center">
            <a href="{{ route('patients.index') }}" class="btn btn-outline-secondary me-3">
                <i class="fas fa-arrow-left"></i> Retour
            </a>
            <div>
                <h1 class="h3 mb-0">{{ $patient->full_name }}</h1>
                <p class="text-muted mb-0">
                    Patient #{{ $patient->id }} • 
                    @if($patient->is_active)
                        <span class="badge bg-success">Actif</span>
                    @else
                        <span class="badge bg-secondary">Inactif</span>
                    @endif
                </p>
            </div>
        </div>
        
        <div class="btn-group">
            <a href="{{ route('patients.edit', $patient) }}" class="btn btn-warning">
                <i class="fas fa-edit me-2"></i>Modifier
            </a>
            <button type="button" class="btn btn-danger" onclick="confirmDelete()">
                <i class="fas fa-trash me-2"></i>Supprimer
            </button>
        </div>
    </div>

    <!-- Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <!-- Informations personnelles -->
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-user me-2"></i>Informations Personnelles
                    </h5>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <div class="avatar-large mx-auto mb-3">
                            {{ substr($patient->first_name, 0, 1) }}{{ substr($patient->last_name, 0, 1) }}
                        </div>
                        <h4>{{ $patient->full_name }}</h4>
                        <p class="text-muted">{{ $patient->age }} ans</p>
                    </div>
                    
                    <div class="info-group">
                        <div class="info-item">
                            <strong>Email:</strong>
                            <a href="mailto:{{ $patient->email }}">{{ $patient->email }}</a>
                        </div>
                        
                        <div class="info-item">
                            <strong>Téléphone:</strong>
                            <a href="tel:{{ $patient->phone }}">{{ $patient->phone }}</a>
                        </div>
                        
                        <div class="info-item">
                            <strong>Date de naissance:</strong>
                            {{ $patient->date_of_birth->format('d/m/Y') }}
                        </div>
                        
                        <div class="info-item">
                            <strong>Genre:</strong>
                            {{ $patient->gender }}
                        </div>
                        
                        <div class="info-item">
                            <strong>Groupe sanguin:</strong>
                            @if($patient->blood_type)
                                <span class="badge bg-info">{{ $patient->blood_type }}</span>
                            @else
                                <span class="text-muted">Non renseigné</span>
                            @endif
                        </div>
                        
                        <div class="info-item">
                            <strong>N° Assurance:</strong>
                            {{ $patient->insurance_number ?? 'Non renseigné' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Adresse et contact d'urgence -->
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-map-marker-alt me-2"></i>Adresse & Contact d'Urgence
                    </h5>
                </div>
                <div class="card-body">
                    <h6 class="fw-bold">Adresse</h6>
                    <address class="mb-4">
                        {{ $patient->address }}<br>
                        {{ $patient->city }}<br>
                        {{ $patient->region }}
                    </address>
                    
                    <h6 class="fw-bold">Contact d'Urgence</h6>
                    <div class="info-group">
                        <div class="info-item">
                            <strong>Nom:</strong>
                            {{ $patient->emergency_contact_name }}
                        </div>
                        <div class="info-item">
                            <strong>Téléphone:</strong>
                            <a href="tel:{{ $patient->emergency_contact_phone }}">
                                {{ $patient->emergency_contact_phone }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informations médicales -->
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-stethoscope me-2"></i>Informations Médicales
                    </h5>
                </div>
                <div class="card-body">
                    <h6 class="fw-bold">Allergies</h6>
                    @if($patient->allergies && count($patient->allergies) > 0)
                        <div class="mb-3">
                            @foreach($patient->allergies as $allergy)
                                <span class="badge bg-warning text-dark me-1 mb-1">{{ $allergy }}</span>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted mb-3">Aucune allergie connue</p>
                    @endif
                    
                    <h6 class="fw-bold">Antécédents Médicaux</h6>
                    @if($patient->medical_history && count($patient->medical_history) > 0)
                        <ul class="list-unstyled">
                            @foreach($patient->medical_history as $history)
                                <li class="mb-1">
                                    <i class="fas fa-circle fa-xs text-primary me-2"></i>
                                    {{ $history }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">Aucun antécédent médical</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Rendez-vous récents -->
    @if($patient->appointments && $patient->appointments->count() > 0)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-calendar-alt me-2"></i>Rendez-vous Récents
                        </h5>
                        <a href="#" class="btn btn-sm btn-outline-primary">
                            Voir tous les rendez-vous
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Heure</th>
                                        <th>Type</th>
                                        <th>Médecin</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($patient->appointments as $appointment)
                                        <tr>
                                            <td>{{ $appointment->appointment_date->format('d/m/Y') }}</td>
                                            <td>{{ $appointment->appointment_date->format('H:i') }}</td>
                                            <td>{{ $appointment->type ?? 'Consultation' }}</td>
                                            <td>{{ $appointment->doctor_name ?? 'Dr. Non assigné' }}</td>
                                            <td>
                                                <span class="badge bg-{{ $appointment->status === 'completed' ? 'success' : ($appointment->status === 'cancelled' ? 'danger' : 'warning') }}">
                                                    {{ ucfirst($appointment->status ?? 'Programmé') }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-outline-primary">Voir</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Informations système -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">
                        <i class="fas fa-info-circle me-2"></i>Informations Système
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <small class="text-muted">Date de création:</small><br>
                            <strong>{{ $patient->created_at->format('d/m/Y H:i') }}</strong>
                        </div>
                        <div class="col-md-4">
                            <small class="text-muted">Dernière modification:</small><br>
                            <strong>{{ $patient->updated_at->format('d/m/Y H:i') }}</strong>
                        </div>
                        <div class="col-md-4">
                            <small class="text-muted">ID Patient:</small><br>
                            <strong>#{{ $patient->id }}</strong>
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
                <p>Êtes-vous sûr de vouloir supprimer le patient <strong>{{ $patient->full_name }}</strong> ?</p>
                <p class="text-warning">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Cette action peut être annulée (suppression douce).
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <form action="{{ route('patients.destroy', $patient) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.avatar-large {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: linear-gradient(45deg, #007bff, #0056b3);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 24px;
}

.info-group {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.info-item {
    padding-bottom: 10px;
    border-bottom: 1px solid #eee;
}

.info-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
}

.info-item strong {
    display: block;
    margin-bottom: 5px;
    color: #495057;
}

.card {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    border: 1px solid rgba(0, 0, 0, 0.125);
}

.card-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
}
</style>

<script>
function confirmDelete() {
    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}
</script>
</x-layouts.app>
