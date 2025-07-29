<x-layouts.app>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- En-tête -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="h3 mb-0">Modifier Patient</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('patients.index') }}">Patients</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('patients.show', $patient) }}">{{ $patient->full_name }}</a>
                            </li>
                            <li class="breadcrumb-item active">Modifier</li>
                        </ol>
                    </nav>
                </div>
                <div class="btn-group" role="group">
                    <a href="{{ route('patients.show', $patient) }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Retour aux détails
                    </a>
                    <a href="{{ route('patients.index') }}" class="btn btn-outline-info">
                        <i class="fas fa-list me-2"></i>Liste des patients
                    </a>
                </div>
            </div>

            <!-- Messages d'erreur -->
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h6><i class="fas fa-exclamation-triangle me-2"></i>Veuillez corriger les erreurs suivantes :</h6>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Aperçu du patient -->
            <div class="card mb-4 bg-light">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar-circle me-3">
                            {{ substr($patient->first_name, 0, 1) }}{{ substr($patient->last_name, 0, 1) }}
                        </div>
                        <div>
                            <h5 class="mb-1">{{ $patient->full_name }}</h5>
                            <p class="text-muted mb-0">
                                <i class="fas fa-envelope me-1"></i>{{ $patient->email }} | 
                                <i class="fas fa-phone me-1"></i>{{ $patient->phone }} | 
                                <i class="fas fa-birthday-cake me-1"></i>{{ $patient->age }} ans
                            </p>
                        </div>
                        <div class="ms-auto">
                            @if($patient->is_active)
                                <span class="badge bg-success fs-6">Actif</span>
                            @else
                                <span class="badge bg-secondary fs-6">Inactif</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulaire de modification -->
            <form action="{{ route('patients.update', $patient) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                
                <!-- Informations personnelles -->
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-user me-2"></i>Informations Personnelles
                        </h5>
                        <small class="text-muted">Dernière modification: {{ $patient->updated_at->format('d/m/Y à H:i') }}</small>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name" class="form-label">Prénom <span class="text-danger">*</span></label>
                                <input type="text" 
                                       class="form-control @error('first_name') is-invalid @enderror" 
                                       id="first_name" 
                                       name="first_name" 
                                       value="{{ old('first_name', $patient->first_name) }}" 
                                       required>
                                @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="last_name" class="form-label">Nom de famille <span class="text-danger">*</span></label>
                                <input type="text" 
                                       class="form-control @error('last_name') is-invalid @enderror" 
                                       id="last_name" 
                                       name="last_name" 
                                       value="{{ old('last_name', $patient->last_name) }}" 
                                       required>
                                @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email', $patient->email) }}" 
                                       required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Modifiez avec précaution - utilisé pour les communications</div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Téléphone <span class="text-danger">*</span></label>
                                <input type="tel" 
                                       class="form-control @error('phone') is-invalid @enderror" 
                                       id="phone" 
                                       name="phone" 
                                       value="{{ old('phone', $patient->phone) }}" 
                                       required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="date_of_birth" class="form-label">Date de naissance <span class="text-danger">*</span></label>
                                <input type="date" 
                                       class="form-control @error('date_of_birth') is-invalid @enderror" 
                                       id="date_of_birth" 
                                       name="date_of_birth" 
                                       value="{{ old('date_of_birth', $patient->date_of_birth->format('Y-m-d')) }}" 
                                       required>
                                @error('date_of_birth')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Âge calculé: <span id="calculated_age">{{ $patient->age }} ans</span></div>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="gender" class="form-label">Sexe <span class="text-danger">*</span></label>
                                <select class="form-select @error('gender') is-invalid @enderror" 
                                        id="gender" 
                                        name="gender" 
                                        required>
                                    <option value="">Sélectionner...</option>
                                    <option value="M" {{ old('gender', $patient->gender) == 'M' ? 'selected' : '' }}>Masculin</option>
                                    <option value="F" {{ old('gender', $patient->gender) == 'F' ? 'selected' : '' }}>Féminin</option>
                                    <option value="Autre" {{ old('gender', $patient->gender) == 'Autre' ? 'selected' : '' }}>Autre</option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="blood_type" class="form-label">Groupe sanguin</label>
                                <select class="form-select @error('blood_type') is-invalid @enderror" 
                                        id="blood_type" 
                                        name="blood_type">
                                    <option value="">Non spécifié</option>
                                    <option value="A+" {{ old('blood_type', $patient->blood_type) == 'A+' ? 'selected' : '' }}>A+</option>
                                    <option value="A-" {{ old('blood_type', $patient->blood_type) == 'A-' ? 'selected' : '' }}>A-</option>
                                    <option value="B+" {{ old('blood_type', $patient->blood_type) == 'B+' ? 'selected' : '' }}>B+</option>
                                    <option value="B-" {{ old('blood_type', $patient->blood_type) == 'B-' ? 'selected' : '' }}>B-</option>
                                    <option value="AB+" {{ old('blood_type', $patient->blood_type) == 'AB+' ? 'selected' : '' }}>AB+</option>
                                    <option value="AB-" {{ old('blood_type', $patient->blood_type) == 'AB-' ? 'selected' : '' }}>AB-</option>
                                    <option value="O+" {{ old('blood_type', $patient->blood_type) == 'O+' ? 'selected' : '' }}>O+</option>
                                    <option value="O-" {{ old('blood_type', $patient->blood_type) == 'O-' ? 'selected' : '' }}>O-</option>
                                </select>
                                @error('blood_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                        <div class="mb-3">
                            <label for="address" class="form-label">Adresse complète <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('address') is-invalid @enderror" 
                                      id="address" 
                                      name="address" 
                                      rows="3" 
                                      required>{{ old('address', $patient->address) }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="city" class="form-label">Ville <span class="text-danger">*</span></label>
                                <input type="text" 
                                       class="form-control @error('city') is-invalid @enderror" 
                                       id="city" 
                                       name="city" 
                                       value="{{ old('city', $patient->city) }}" 
                                       required>
                                @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="region" class="form-label">Région <span class="text-danger">*</span></label>
                                <select class="form-select @error('region') is-invalid @enderror" 
                                        id="region" 
                                        name="region" 
                                        required>
                                    <option value="">Sélectionner une région...</option>
                                    <option value="Lagunes" {{ old('region', $patient->region) == 'Lagunes' ? 'selected' : '' }}>Lagunes</option>
                                    <option value="Haut-Sassandra" {{ old('region', $patient->region) == 'Haut-Sassandra' ? 'selected' : '' }}>Haut-Sassandra</option>
                                    <option value="Savanes" {{ old('region', $patient->region) == 'Savanes' ? 'selected' : '' }}>Savanes</option>
                                    <option value="Vallée du Bandama" {{ old('region', $patient->region) == 'Vallée du Bandama' ? 'selected' : '' }}>Vallée du Bandama</option>
                                    <option value="Moyen-Comoé" {{ old('region', $patient->region) == 'Moyen-Comoé' ? 'selected' : '' }}>Moyen-Comoé</option>
                                    <option value="18 Montagnes" {{ old('region', $patient->region) == '18 Montagnes' ? 'selected' : '' }}>18 Montagnes</option>
                                    <option value="Lacs" {{ old('region', $patient->region) == 'Lacs' ? 'selected' : '' }}>Lacs</option>
                                    <option value="Zanzan" {{ old('region', $patient->region) == 'Zanzan' ? 'selected' : '' }}>Zanzan</option>
                                    <option value="Bas-Sassandra" {{ old('region', $patient->region) == 'Bas-Sassandra' ? 'selected' : '' }}>Bas-Sassandra</option>
                                    <option value="Denguélé" {{ old('region', $patient->region) == 'Denguélé' ? 'selected' : '' }}>Denguélé</option>
                                    <option value="N'zi-Comoé" {{ old('region', $patient->region) == 'N\'zi-Comoé' ? 'selected' : '' }}>N'zi-Comoé</option>
                                    <option value="Marahoué" {{ old('region', $patient->region) == 'Marahoué' ? 'selected' : '' }}>Marahoué</option>
                                    <option value="Sud-Comoé" {{ old('region', $patient->region) == 'Sud-Comoé' ? 'selected' : '' }}>Sud-Comoé</option>
                                    <option value="Worodougou" {{ old('region', $patient->region) == 'Worodougou' ? 'selected' : '' }}>Worodougou</option>
                                    <option value="Sud-Bandama" {{ old('region', $patient->region) == 'Sud-Bandama' ? 'selected' : '' }}>Sud-Bandama</option>
                                    <option value="Agnéby" {{ old('region', $patient->region) == 'Agnéby' ? 'selected' : '' }}>Agnéby</option>
                                    <option value="Bafing" {{ old('region', $patient->region) == 'Bafing' ? 'selected' : '' }}>Bafing</option>
                                    <option value="Fromager" {{ old('region', $patient->region) == 'Fromager' ? 'selected' : '' }}>Fromager</option>
                                    <option value="Moyen-Cavally" {{ old('region', $patient->region) == 'Moyen-Cavally' ? 'selected' : '' }}>Moyen-Cavally</option>
                                </select>
                                @error('region')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact d'urgence -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-phone-alt me-2"></i>Contact d'Urgence
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="emergency_contact_name" class="form-label">Nom du contact <span class="text-danger">*</span></label>
                                <input type="text" 
                                       class="form-control @error('emergency_contact_name') is-invalid @enderror" 
                                       id="emergency_contact_name" 
                                       name="emergency_contact_name" 
                                       value="{{ old('emergency_contact_name', $patient->emergency_contact_name) }}" 
                                       required>
                                @error('emergency_contact_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="emergency_contact_phone" class="form-label">Téléphone du contact <span class="text-danger">*</span></label>
                                <input type="tel" 
                                       class="form-control @error('emergency_contact_phone') is-invalid @enderror" 
                                       id="emergency_contact_phone" 
                                       name="emergency_contact_phone" 
                                       value="{{ old('emergency_contact_phone', $patient->emergency_contact_phone) }}" 
                                       required>
                                @error('emergency_contact_phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                        <div class="mb-3">
                            <label for="insurance_number" class="form-label">Numéro d'assurance</label>
                            <input type="text" 
                                   class="form-control @error('insurance_number') is-invalid @enderror" 
                                   id="insurance_number" 
                                   name="insurance_number" 
                                   value="{{ old('insurance_number', $patient->insurance_number) }}">
                            @error('insurance_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="allergies" class="form-label">Allergies connues</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="allergies[]" value="Pénicilline" id="allergy1"
                                       {{ in_array('Pénicilline', old('allergies', $patient->allergies ?? [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="allergy1">Pénicilline</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="allergies[]" value="Aspirine" id="allergy2"
                                       {{ in_array('Aspirine', old('allergies', $patient->allergies ?? [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="allergy2">Aspirine</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="allergies[]" value="Latex" id="allergy3"
                                       {{ in_array('Latex', old('allergies', $patient->allergies ?? [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="allergy3">Latex</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="allergies[]" value="Arachides" id="allergy4"
                                       {{ in_array('Arachides', old('allergies', $patient->allergies ?? [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="allergy4">Arachides</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="allergies[]" value="Autre" id="allergy5"
                                       {{ in_array('Autre', old('allergies', $patient->allergies ?? [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="allergy5">Autre</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="medical_history" class="form-label">Antécédents médicaux</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="medical_history[]" value="Diabète" id="history1"
                                       {{ in_array('Diabète', old('medical_history', $patient->medical_history ?? [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="history1">Diabète</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="medical_history[]" value="Hypertension" id="history2"
                                       {{ in_array('Hypertension', old('medical_history', $patient->medical_history ?? [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="history2">Hypertension</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="medical_history[]" value="Maladie cardiovasculaire" id="history3"
                                       {{ in_array('Maladie cardiovasculaire', old('medical_history', $patient->medical_history ?? [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="history3">Maladie cardiovasculaire</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="medical_history[]" value="Asthme" id="history4"
                                       {{ in_array('Asthme', old('medical_history', $patient->medical_history ?? [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="history4">Asthme</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="medical_history[]" value="Cancer" id="history5"
                                       {{ in_array('Cancer', old('medical_history', $patient->medical_history ?? [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="history5">Cancer</label>
                            </div>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" 
                                   class="form-check-input" 
                                   id="is_active" 
                                   name="is_active" 
                                   value="1" 
                                   {{ old('is_active', $patient->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Patient actif
                            </label>
                            <div class="form-text">Décochez pour marquer le patient comme inactif</div>
                        </div>
                    </div>
                </div>

                <!-- Historique des modifications -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-history me-2"></i>Historique
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <small class="text-muted">
                                    <strong>Créé le:</strong> {{ $patient->created_at->format('d/m/Y à H:i') }}
                                </small>
                            </div>
                            <div class="col-md-6">
                                <small class="text-muted">
                                    <strong>Dernière modification:</strong> {{ $patient->updated_at->format('d/m/Y à H:i') }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Boutons d'action -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <a href="{{ route('patients.show', $patient) }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-times me-2"></i>Annuler
                                </a>
                                <button type="button" class="btn btn-outline-warning ms-2" onclick="resetForm()">
                                    <i class="fas fa-undo me-2"></i>Réinitialiser
                                </button>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success" name="action" value="save">
                                    <i class="fas fa-save me-2"></i>Enregistrer les modifications
                                </button>
                                <button type="submit" class="btn btn-primary ms-2" name="action" value="save_and_continue">
                                    <i class="fas fa-check me-2"></i>Enregistrer et voir les détails
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.avatar-circle {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: linear-gradient(45deg, #007bff, #0056b3);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 16px;
    flex-shrink: 0;
}

.card-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
}

.form-label {
    font-weight: 500;
    color: #495057;
}

.text-danger {
    color: #dc3545 !important;
}

.breadcrumb {
    background: none;
    padding: 0;
    margin: 0;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: ">";
}

.form-check {
    margin-bottom: 0.5rem;
}

.card {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    border: 1px solid rgba(0, 0, 0, 0.125);
}

.btn {
    padding: 0.5rem 1rem;
    font-weight: 500;
}

.invalid-feedback {
    display: block;
}

.bg-light {
    background-color: #f8f9fa !important;
}

.form-text {
    font-size: 0.875rem;
    color: #6c757d;
}

/* Highlight des champs modifiés */
.form-control:focus,
.form-select:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}

.btn-group .btn {
    border-radius: 0.375rem;
    margin-left: 0.25rem;
}

.btn-group .btn:first-child {
    margin-left: 0;
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
// Validation du formulaire côté client
(function() {
    'use strict';
    
    var forms = document.querySelectorAll('.needs-validation');
    
    Array.prototype.slice.call(forms).forEach(function(form) {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            
            form.classList.add('was-validated');
        }, false);
    });
})();

// Calcul automatique de l'âge
document.getElementById('date_of_birth').addEventListener('change', function() {
    var birthDate = new Date(this.value);
    var today = new Date();
    var age = today.getFullYear() - birthDate.getFullYear();
    var monthDiff = today.getMonth() - birthDate.getMonth();
    
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    
    if (age >= 0 && age <= 120) {
        document.getElementById('age').value = age;
    }
});

</x-backend-layout>
