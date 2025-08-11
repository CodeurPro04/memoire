@extends('layouts.app')

@section('content')

<div class="auth-container">
    <div class="auth-card">
        <div class="row g-0 h-100">
            <!-- Panneau gauche avec illustration -->
            <div class="col-lg-6">
                <div class="auth-left d-flex flex-column align-items-center justify-content-center p-5">
                    <img src="{{ asset('assets/img/illustrations/boy-with-rocket-light.png') }}" 
                         alt="Illustration" 
                         class="auth-illustration mb-4"
                         style="max-width: 70%; height: auto;">

                    <h2 class="text-white fw-bold fs-2 mb-3 text-center position-relative" style="z-index: 2;">
                        Bienvenue !
                    </h2>
                    <p class="text-white-50 fs-5 text-center lh-base position-relative" style="z-index: 2;">
                        Créez votre compte pour gérer vos rendez-vous et suivre votre santé en toute simplicité.
                    </p>
                </div>
            </div>

            <!-- Panneau droit avec formulaire -->
            <div class="col-lg-6">
                <div class="p-5 d-flex flex-column justify-content-center h-100">
                    <div class="text-center mb-4">
                        <h1 class="h2 fw-bold text-dark mb-2">Inscription</h1>
                        <p class="text-muted">Remplissez le formulaire pour créer votre compte</p>
                    </div>

                    <form method="POST" action="{{ route('registerp') }}">
                        @csrf

                        <!-- Prénom -->
                        <div class="mb-3">
                            <label for="first_name" class="form-label fw-semibold text-dark">Prénom</label>
                            <input id="first_name" type="text" class="form-control form-control-lg @error('first_name') is-invalid @enderror" 
                                   name="first_name" value="{{ old('first_name') }}" required autofocus placeholder="Votre prénom">
                            @error('first_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Nom -->
                        <div class="mb-3">
                            <label for="last_name" class="form-label fw-semibold text-dark">Nom</label>
                            <input id="last_name" type="text" class="form-control form-control-lg @error('last_name') is-invalid @enderror" 
                                   name="last_name" value="{{ old('last_name') }}" required placeholder="Votre nom">
                            @error('last_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold text-dark">Adresse e-mail</label>
                            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required placeholder="votre@email.com">
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Téléphone -->
                        <div class="mb-3">
                            <label for="phone" class="form-label fw-semibold text-dark">Téléphone</label>
                            <input id="phone" type="text" class="form-control form-control-lg @error('phone') is-invalid @enderror" 
                                   name="phone" value="{{ old('phone') }}" required placeholder="+225 XX XX XX XX">
                            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Date de naissance -->
                        <div class="mb-3">
                            <label for="date_of_birth" class="form-label fw-semibold text-dark">Date de naissance</label>
                            <input id="date_of_birth" type="date" class="form-control form-control-lg @error('date_of_birth') is-invalid @enderror" 
                                   name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                            @error('date_of_birth')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Genre -->
                        <div class="mb-3">
                            <label for="gender" class="form-label fw-semibold text-dark">Genre</label>
                            <select id="gender" name="gender" class="form-control form-control-lg @error('gender') is-invalid @enderror" required>
                                <option value="">-- Sélectionnez --</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Homme</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Femme</option>
                                <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Autre</option>
                            </select>
                            @error('gender')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Adresse -->
                        <div class="mb-3">
                            <label for="address" class="form-label fw-semibold text-dark">Adresse</label>
                            <input id="address" type="text" class="form-control form-control-lg @error('address') is-invalid @enderror" 
                                   name="address" value="{{ old('address') }}" required placeholder="Votre adresse">
                            @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Ville -->
                        <div class="mb-3">
                            <label for="city" class="form-label fw-semibold text-dark">Ville</label>
                            <input id="city" type="text" class="form-control form-control-lg @error('city') is-invalid @enderror" 
                                   name="city" value="{{ old('city') }}" required placeholder="Votre ville">
                            @error('city')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Région -->
                        <div class="mb-3">
                            <label for="region" class="form-label fw-semibold text-dark">Région</label>
                            <input id="region" type="text" class="form-control form-control-lg @error('region') is-invalid @enderror" 
                                   name="region" value="{{ old('region') }}" required placeholder="Votre région">
                            @error('region')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Contact d'urgence -->
                        <div class="mb-3">
                            <label for="emergency_contact_name" class="form-label fw-semibold text-dark">Nom du contact d'urgence</label>
                            <input id="emergency_contact_name" type="text" class="form-control form-control-lg @error('emergency_contact_name') is-invalid @enderror" 
                                   name="emergency_contact_name" value="{{ old('emergency_contact_name') }}" required>
                            @error('emergency_contact_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="emergency_contact_phone" class="form-label fw-semibold text-dark">Téléphone du contact d'urgence</label>
                            <input id="emergency_contact_phone" type="text" class="form-control form-control-lg @error('emergency_contact_phone') is-invalid @enderror" 
                                   name="emergency_contact_phone" value="{{ old('emergency_contact_phone') }}" required>
                            @error('emergency_contact_phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Groupe sanguin -->
                        <div class="mb-3">
                            <label for="blood_type" class="form-label fw-semibold text-dark">Groupe sanguin</label>
                            <input id="blood_type" type="text" class="form-control form-control-lg @error('blood_type') is-invalid @enderror" 
                                   name="blood_type" value="{{ old('blood_type') }}" placeholder="Ex: O+, A-, B+">
                            @error('blood_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Allergies -->
                        <div class="mb-3">
                            <label for="allergies" class="form-label fw-semibold text-dark">Allergies</label>
                            <textarea id="allergies" class="form-control form-control-lg @error('allergies') is-invalid @enderror" 
                                      name="allergies" placeholder="Vos allergies">{{ old('allergies') }}</textarea>
                            @error('allergies')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Antécédents médicaux -->
                        <div class="mb-3">
                            <label for="medical_history" class="form-label fw-semibold text-dark">Antécédents médicaux</label>
                            <textarea id="medical_history" class="form-control form-control-lg @error('medical_history') is-invalid @enderror" 
                                      name="medical_history" placeholder="Vos antécédents">{{ old('medical_history') }}</textarea>
                            @error('medical_history')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Numéro d'assurance -->
                        <div class="mb-3">
                            <label for="insurance_number" class="form-label fw-semibold text-dark">Numéro d'assurance</label>
                            <input id="insurance_number" type="text" class="form-control form-control-lg @error('insurance_number') is-invalid @enderror" 
                                   name="insurance_number" value="{{ old('insurance_number') }}">
                            @error('insurance_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Statut actif -->
                        <div class="mb-3">
                            <label class="form-check-label text-dark" for="is_active">
                                <input type="checkbox" id="is_active" name="is_active" value="1" 
                                       {{ old('is_active') ? 'checked' : '' }}> Compte actif
                            </label>
                        </div>

                        <!-- Mot de passe -->
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold text-dark">Mot de passe</label>
                            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                   name="password" required placeholder="••••••••">
                            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Confirmation mot de passe -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label fw-semibold text-dark">Confirmez le mot de passe</label>
                            <input id="password_confirmation" type="password" class="form-control form-control-lg" 
                                   name="password_confirmation" required placeholder="••••••••">
                        </div>

                        <!-- Bouton -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg fw-semibold">
                                S'inscrire
                            </button>
                        </div>

                        <!-- Lien vers connexion -->
                        <div class="text-center mt-3">
                            <span class="text-muted">Déjà un compte ?</span>
                            <a href="{{ route('login') }}" class="text-decoration-none text-gradient fw-semibold ms-1">
                                Se connecter
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
