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
                        Connectez-vous à votre espace patient pour gérer vos rendez-vous et suivre votre santé en toute simplicité.
                    </p>
                </div>
            </div>

            <!-- Panneau droit avec formulaire -->
            <div class="col-lg-6">
                <div class="p-5 d-flex flex-column justify-content-center h-100">
                    <div class="text-center mb-4">
                        <h1 class="h2 fw-bold text-dark mb-2">Connexion</h1>
                        <p class="text-muted">Accédez à votre espace personnel</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold text-dark">
                                Adresse e-mail
                            </label>
                            <input id="email" 
                                   type="email" 
                                   class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   required 
                                   autocomplete="email" 
                                   autofocus
                                   placeholder="votre@email.com">
                            
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Mot de passe -->
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold text-dark">
                                Mot de passe
                            </label>
                            <input id="password" 
                                   type="password" 
                                   class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                   name="password" 
                                   required 
                                   autocomplete="current-password"
                                   placeholder="••••••••">
                            
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Se souvenir de moi -->
                        <div class="">
                            <div class="form-check">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       name="remember" 
                                       id="remember" 
                                       {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label text-muted" for="remember">
                                    Se souvenir de moi
                                </label>
                            </div>
                        </div>

                        <!-- Bouton de connexion -->
                        <div class="d-grid ">
                            <button type="submit" class="btn btn-primary btn-lg text-blue-600 fw-semibold">
                                Se connecter
                            </button>
                        </div>

                        <!-- Mot de passe oublié -->
                        @if (Route::has('password.request'))
                            <div class="text-center">
                                <a class="text-decoration-none text-gradient fw-semibold" 
                                   href="{{ route('password.request') }}">
                                    Mot de passe oublié ?
                                </a>
                            </div>
                        @endif

                        <!-- Lien d'inscription -->
                        <div class="text-center">
                            <span class="text-muted">Pas encore de compte ?</span>
                            <a href="{{ route('register') }}" 
                               class="text-decoration-none text-gradient fw-semibold ms-1">
                                Créer un compte
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection