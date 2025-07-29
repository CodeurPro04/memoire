<x-layouts.app>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- En-tête -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="h3 mb-0">Nouveau Patient</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('patients.index') }}">Patients</a>
                            </li>
                            <li class="breadcrumb-item active">Nouveau Patient</li>
                        </ol>
                    </nav>
                </div>
                <a href="{{ route('patients.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Retour à la liste
                </a>
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

            <!-- Formulaire principal -->
            <form action="{{ route('patients.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                
                <!-- Informations personnelles -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-user me-2"></i>Informations Personnelles
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name" class="form-label">Prénom <span class="text-danger">*</span></label>
                                <input type="text" 
                                       class="form-control @error('first_name') is-invalid @enderror" 
                                       id="first_name" 
                                       name="first_name" 
                                       value="{{ old('first_name') }}" 
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
                                       value="{{ old('last_name') }}" 
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
                                       value="{{ old('email') }}" 
                                       required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Téléphone <span class="text-danger">*</span></label>
                                <input type="tel" 
                                       class="form-control @error('phone') is-invalid @enderror" 
                                       id="phone" 
                                       name="phone" 
                                       value="{{ old('phone') }}" 
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
                                       value="{{ old('date_of_birth') }}" 
                                       required>
                                @error('date_of_birth')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="gender" class="form-label">Sexe <span class="text-danger">*</span></label>
                                <select class="form-select @error('gender') is-invalid @enderror" 
                                        id="gender" 
                                        name="gender" 
                                        required>
                                    <option value="">Sélectionner...</option>
                                    <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Masculin</option>
                                    <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Féminin</option>
                                    <option value="Autre" {{ old('gender') == 'Autre' ? 'selected' : '' }}>Autre</option>
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
                                    <option value="A+" {{ old('blood_type') == 'A+' ? 'selected' : '' }}>A+</option>
                                    <option value="A-" {{ old('blood_type') == 'A-' ? 'selected' : '' }}>A-</option>
                                    <option value="B+" {{ old('blood_type') == 'B+' ? 'selected' : '' }}>B+</option>
                                    <option value="B-" {{ old('blood_type') == 'B-' ? 'selected' : '' }}>B-</option>
                                    <option value="AB+" {{ old('blood_type') == 'AB+' ? 'selected' : '' }}>AB+</option>
                                    <option value="AB-" {{ old('blood_type') == 'AB-' ? 'selected' : '' }}>AB-</option>
                                    <option value="O+" {{ old('blood_type') == 'O+' ? 'selected' : '' }}>O+</option>
                                    <option value="O-" {{ old('blood_type') == 'O-' ? 'selected' : '' }}>O-</option>
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
                                      required>{{ old('address') }}</textarea>
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
                                       value="{{ old('city') }}" 
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
                                    <option value="Lagunes" {{ old('region') == 'Lagunes' ? 'selected' : '' }}>Lagunes</option>
                                    <option value="Haut-Sassandra" {{ old('region') == 'Haut-Sassandra' ? 'selected' : '' }}>Haut-Sassandra</option>
                                    <option value="Savanes" {{ old('region') == 'Savanes' ? 'selected' : '' }}>Savanes</option>
                                    <option value="Vallée du Bandama" {{ old('region') == 'Vallée du Bandama' ? 'selected' : '' }}>Vallée du Bandama</option>
                                    <option value="Moyen-Comoé" {{ old('region') == 'Moyen-Comoé' ? 'selected' : '' }}>Moyen-Comoé</option>
                                    <option value="18 Montagnes" {{ old('region') == '18 Montagnes' ? 'selected' : '' }}>18 Montagnes</option>
                                    <option value="Lacs" {{ old('region') == 'Lacs' ? 'selected' : '' }}>Lacs</option>
                                    <option value="Zanzan" {{ old('region') == 'Zanzan' ? 'selected' : '' }}>Zanzan</option>
                                    <option value="Bas-Sassandra" {{ old('region') == 'Bas-Sassandra' ? 'selected' : '' }}>Bas-Sassandra</option>
                                    <option value="Denguélé" {{ old('region') == 'Denguélé' ? 'selected' : '' }}>Denguélé</option>
                                    <option value="N'zi-Comoé" {{ old('region') == 'N\'zi-Comoé' ? 'selected' : '' }}>N'zi-Comoé</option>
                                    <option value="Marahoué" {{ old('region') == 'Marahoué' ? 'selected' : '' }}>Marahoué</option>
                                    <option value="Sud-Comoé" {{ old('region') == 'Sud-Comoé' ? 'selected' : '' }}>Sud-Comoé</option>
                                    <option value="Worodougou" {{ old('region') == 'Worodougou' ? 'selected' : '' }}>Worodougou</option>
                                    <option value="Sud-Bandama" {{ old('region') == 'Sud-Bandama' ? 'selected' : '' }}>Sud-Bandama</option>
                                    <option value="Agnéby" {{ old('region') == 'Agnéby' ? 'selected' : '' }}>Agnéby</option>
                                    <option value="Bafing" {{ old('region') == 'Bafing' ? 'selected' : '' }}>Bafing</option>
                                    <option value="Fromager" {{ old('region') == 'Fromager' ? 'selected' : '' }}>Fromager</option>
                                    <option value="Moyen-Cavally" {{ old('region') == 'Moyen-Cavally' ? 'selected' : '' }}>Moyen-Cavally</option>
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
                                       value="{{ old('emergency_contact_name') }}" 
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
                                       value="{{ old('emergency_contact_phone') }}" 
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
                                   value="{{ old('insurance_number') }}">
                            @error('insurance_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="allergies" class="form-label">Allergies connues</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="allergies[]" value="Pénicilline" id="allergy1">
                                <label class="form-check-label" for="allergy1">Pénicilline</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="allergies[]" value="Aspirine" id="allergy2">
                                <label class="form-check-label" for="allergy2">Aspirine</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="allergies[]" value="Latex" id="allergy3">
                                <label class="form-check-label" for="allergy3">Latex</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="allergies[]" value="Arachides" id="allergy4">
                                <label class="form-check-label" for="allergy4">Arachides</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="allergies[]" value="Autre" id="allergy5">
                                <label class="form-check-label" for="allergy5">Autre</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="medical_history" class="form-label">Antécédents médicaux</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="medical_history[]" value="Diabète" id="history1">
                                <label class="form-check-label" for="history1">Diabète</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="medical_history[]" value="Hypertension" id="history2">
                                <label class="form-check-label" for="history2">Hypertension</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="medical_history[]" value="Maladie cardiovasculaire" id="history3">
                                <label class="form-check-label" for="history3">Maladie cardiovasculaire</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="medical_history[]" value="Asthme" id="history4">
                                <label class="form-check-label" for="history4">Asthme</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="medical_history[]" value="Cancer" id="history5">
                                <label class="form-check-label" for="history5">Cancer</label>
                            </div>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" 
                                   class="form-check-input" 
                                   id="is_active" 
                                   name="is_active" 
                                   value="1" 
                                   {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Patient actif
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Boutons d'action -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('patients.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-2"></i>Annuler
                            </a>
                            <div>
                                <button type="reset" class="btn btn-outline-warning me-2">
                                    <i class="fas fa-undo me-2"></i>Réinitialiser
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Enregistrer le Patient
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
</style>

<script>
// Validation du formulaire côté client
(function() {
    'use strict';
    
    // Récupérer tous les formulaires à valider
    var forms = document.querySelectorAll('.needs-validation');
    
    // Parcourir et empêcher la soumission
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
        // Vous pouvez afficher l'âge quelque part si nécessaire
        console.log('Âge calculé:', age + ' ans');
    }
});
</script>
</x-layouts.app>