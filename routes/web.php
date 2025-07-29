<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\EstablishmentController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\PatientController;

use Livewire\Volt\Volt;

// =====================================
// ROUTES PUBLIQUES
// =====================================

// Page d'accueil
Route::get('/', function () {
    return view('index');
})->name('home');

// =====================================
// ROUTES D'AUTHENTIFICATION LIVEWIRE
// =====================================

// Authentification avec Livewire Volt
Route::middleware('guest')->group(function () {
    // Page de connexion
    Route::get('/login', function () {
        return view('livewire.auth.login');
    })->middleware('guest')->name('login');
        
    // Page d'inscription
    Route::get('/register', function () {
        return view('livewire.auth.register');
    })->middleware('guest')->name('register');
        
    // Mot de passe oublié
    Volt::route('/forgot-password', 'livewire.auth.forgot-password')->name('password.request');
    
    // Réinitialisation du mot de passe
    Volt::route('/reset-password/{token}', 'livewire.auth.reset-password')->name('password.reset');
    
    // Vérification email
    Volt::route('/verify-email', 'livewire.auth.verify-email')->name('verification.notice');
});

// Routes pour utilisateurs authentifiés seulement
Route::middleware('auth')->group(function () {
    // Confirmation du mot de passe
    Volt::route('/confirm-password', 'auth.confirm-password')->name('password.confirm');
    
    // Vérification email (GET pour le lien de vérification)
    Route::get('/verify-email/{id}/{hash}', function ($id, $hash) {
        return redirect()->route('verification.verify', ['id' => $id, 'hash' => $hash]);
    })->middleware(['signed', 'throttle:6,1'])->name('verification.link');
    
    // Action de vérification d'email
    Volt::route('/email/verify/{id}/{hash}', 'auth.verify-email-action')
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
        
    // Renvoyer l'email de vérification
    Route::post('/email/verification-notification', function () {
        request()->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware('throttle:6,1')->name('verification.send');
    
    // Déconnexion
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    })->name('logout');
});
    // Dashboard principal
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/docteurs', [DoctorController::class, 'index'])->name('index');
    Route::get('/docteurs/create', function () {
        return view('doctors.create');
    })->name('doctors.create');
    Route::get('/docteurs/{id}', function () {
        return view('doctors.show');
    })->name('doctors.show');
    Route::get('/docteurs/{id}/edit', function () {
        return view('docteurs.edit');
    })->name('docteurs.edit');
    
    Route::get('/chat', function () {
        return view('chat');
    })->name('chat');
    Route::get('/espace-patient', [PatientController::class, 'patientEspace'])->name('patients.espace');

    // Dashboard principal

    // Routes pour la gestion des patients (CRUD complet)
    Route::resource('patients', PatientController::class);


// =====================================
// ROUTES PROTÉGÉES (AUTHENTIFIÉES)
// =====================================

Route::middleware(['auth', 'verified'])->group(function () {
    


    // =====================================
    // ROUTES PATIENTS
    // =====================================


    // Route de compatibilité pour l'ancien /rdv
    Route::get('/rdv', function () {
        return view('patients.rdv');
    })->name('rdv');

    // =====================================
    // ROUTES DOCTEURS/PROFESSIONNELS
    // =====================================
    Route::prefix('doctors')->name('doctors.')->group(function () {
        Route::get('/', [DoctorController::class, 'index'])->name('index');
        Route::get('/pending', [DoctorController::class, 'pending'])->name('pending');
        Route::get('/specialties', [DoctorController::class, 'specialties'])->name('specialties');
        Route::post('/{doctor}/approve', [DoctorController::class, 'approve'])->name('approve');
        Route::post('/{doctor}/reject', [DoctorController::class, 'reject'])->name('reject');
        Route::get('/create', [DoctorController::class, 'create'])->name('create');
        Route::post('/store', [DoctorController::class, 'store'])->name('store');
        Route::get('/{doctor}', [DoctorController::class, 'show'])->name('show');
        Route::get('/{doctor}/edit', [DoctorController::class, 'edit'])->name('edit');
        Route::put('/{doctor}', [DoctorController::class, 'update'])->name('update');
        Route::delete('/{doctor}', [DoctorController::class, 'destroy'])->name('destroy');
    });

    // =====================================
    // ROUTES RENDEZ-VOUS
    // =====================================
    Route::prefix('appointments')->name('appointments.')->group(function () {
        Route::get('/today', [AppointmentController::class, 'today'])->name('today');
        Route::get('/upcoming', [AppointmentController::class, 'upcoming'])->name('upcoming');
        Route::get('/history', [AppointmentController::class, 'history'])->name('history');
        Route::get('/', [AppointmentController::class, 'index'])->name('index');
        Route::get('/create', [AppointmentController::class, 'create'])->name('create');
        Route::post('/store', [AppointmentController::class, 'store'])->name('store');
        Route::get('/{appointment}', [AppointmentController::class, 'show'])->name('show');
        Route::get('/{appointment}/edit', [AppointmentController::class, 'edit'])->name('edit');
        Route::put('/{appointment}', [AppointmentController::class, 'update'])->name('update');
        Route::delete('/{appointment}', [AppointmentController::class, 'destroy'])->name('destroy');
        Route::post('/{appointment}/confirm', [AppointmentController::class, 'confirm'])->name('confirm');
        Route::post('/{appointment}/cancel', [AppointmentController::class, 'cancel'])->name('cancel');
    });

    // =====================================
    // ROUTES ÉTABLISSEMENTS
    // =====================================
    Route::prefix('establishments')->name('establishments.')->group(function () {
        Route::get('/hospitals', [EstablishmentController::class, 'hospitals'])->name('hospitals');
        Route::get('/clinics', [EstablishmentController::class, 'clinics'])->name('clinics');
        Route::get('/community', [EstablishmentController::class, 'community'])->name('community');
        Route::get('/', [EstablishmentController::class, 'index'])->name('index');
        Route::get('/create', [EstablishmentController::class, 'create'])->name('create');
        Route::post('/store', [EstablishmentController::class, 'store'])->name('store');
        Route::get('/{establishment}', [EstablishmentController::class, 'show'])->name('show');
        Route::get('/{establishment}/edit', [EstablishmentController::class, 'edit'])->name('edit');
        Route::put('/{establishment}', [EstablishmentController::class, 'update'])->name('update');
        Route::delete('/{establishment}', [EstablishmentController::class, 'destroy'])->name('destroy');
    });

    // =====================================
    // ROUTES RÉGIONS/LOCATIONS
    // =====================================
    Route::prefix('locations')->name('locations.')->group(function () {
        Route::get('/abidjan', [LocationController::class, 'abidjan'])->name('abidjan');
        Route::get('/yamoussoukro', [LocationController::class, 'yamoussoukro'])->name('yamoussoukro');
        Route::get('/rural', [LocationController::class, 'rural'])->name('rural');
        Route::get('/', [LocationController::class, 'index'])->name('index');
        Route::get('/{location}', [LocationController::class, 'show'])->name('show');
    });

    // =====================================
    // ROUTES PAIEMENTS
    // =====================================
    Route::prefix('payments')->name('payments.')->group(function () {
        Route::get('/orange', [PaymentController::class, 'orange'])->name('orange');
        Route::get('/mtn', [PaymentController::class, 'mtn'])->name('mtn');
        Route::get('/history', [PaymentController::class, 'history'])->name('history');
        Route::get('/', [PaymentController::class, 'index'])->name('index');
        Route::post('/process', [PaymentController::class, 'process'])->name('process');
        Route::get('/{payment}', [PaymentController::class, 'show'])->name('show');
    });

    // =====================================
    // ROUTES COMMUNICATIONS
    // =====================================
    Route::prefix('communications')->name('communications.')->group(function () {
        Route::get('/sms', [CommunicationController::class, 'sms'])->name('sms');
        Route::get('/campaigns', [CommunicationController::class, 'campaigns'])->name('campaigns');
        Route::get('/languages', [CommunicationController::class, 'languages'])->name('languages');
        Route::get('/', [CommunicationController::class, 'index'])->name('index');
        Route::post('/send-sms', [CommunicationController::class, 'sendSms'])->name('send.sms');
        Route::get('/campaigns/create', [CommunicationController::class, 'createCampaign'])->name('campaigns.create');
        Route::post('/campaigns/store', [CommunicationController::class, 'storeCampaign'])->name('campaigns.store');
    });

    // =====================================
    // ROUTES RAPPORTS
    // =====================================
    Route::prefix('reports')->name('reports.')->group(function () {
        Route::get('/usage', [ReportController::class, 'usage'])->name('usage');
        Route::get('/health', [ReportController::class, 'health'])->name('health');
        Route::get('/', [ReportController::class, 'index'])->name('index');
        Route::get('/export/{type}', [ReportController::class, 'export'])->name('export');
        Route::post('/generate', [ReportController::class, 'generate'])->name('generate');
    });

    // =====================================
    // ROUTES PARAMÈTRES (LIVEWIRE)
    // =====================================
    Route::prefix('settings')->name('settings.')->group(function () {
        // Redirection par défaut vers le profil
        Route::redirect('/', 'settings/profile');
        
        // Routes Volt pour Livewire
        Volt::route('/profile', 'settings.profile')->name('profile');
        Volt::route('/password', 'settings.password')->name('password');
        
        // Route système (si vous avez un contrôleur dédié)
        Route::get('/system', [SettingsController::class, 'system'])->name('system');
        Route::post('/system/update', [SettingsController::class, 'updateSystem'])->name('system.update');
        
        // Routes supplémentaires pour les paramètres
        Route::get('/notifications', [SettingsController::class, 'notifications'])->name('notifications');
        Route::post('/notifications/update', [SettingsController::class, 'updateNotifications'])->name('notifications.update');
    });

    // =====================================
    // ROUTE SUPPORT
    // =====================================
    Route::get('/support', [SupportController::class, 'index'])->name('support');
    Route::post('/support/ticket', [SupportController::class, 'createTicket'])->name('support.ticket');
    Route::get('/support/ticket/{ticket}', [SupportController::class, 'showTicket'])->name('support.ticket.show');

    // =====================================
    // ROUTES DE REDIRECTION POUR COMPATIBILITÉ
    // =====================================
    
    // Redirections pour les anciennes URLs
    Route::get('/patient', function () {
        return redirect()->route('patients.index');
    });
    
    Route::get('/patient/espace', function () {
        return redirect()->route('patients.espace');
    });
        
    Route::get('/patient/create', function () {
        return redirect()->route('patients.create');
    });
    
    Route::get('/patient/rdv', function () {
        return redirect()->route('patients.rdv');
    });
});

// =====================================
// WEBHOOKS (sans authentification)
// =====================================
Route::prefix('webhooks')->name('webhooks.')->group(function () {
    Route::post('/orange-money', [PaymentController::class, 'orangeWebhook'])->name('orange');
    Route::post('/mtn-money', [PaymentController::class, 'mtnWebhook'])->name('mtn');
});

// =====================================
// ROUTES API (si nécessaire)
// =====================================
Route::prefix('api')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/patients/search', [PatientController::class, 'search'])->name('api.patients.search');
    Route::get('/doctors/available', [DoctorController::class, 'available'])->name('api.doctors.available');
    Route::get('/appointments/calendar', [AppointmentController::class, 'calendar'])->name('api.appointments.calendar');
    Route::get('/notifications/unread', function () {
        return response()->json(['count' => auth()->user()->unreadNotifications()->count()]);
    })->name('api.notifications.unread');
});
Auth::routes();

