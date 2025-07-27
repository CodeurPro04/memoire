<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

// Page d'accueil
Route::get('/', function () {
    return view('index');
})->name('home');

// Anciennes routes à réorganiser ou supprimer
Route::get('/login', function () {
    return route('patients.login');
})->name('login');

Route::get('/patient', function () {
    return route('patients.dashboard');
});

Route::get('/dashboard', function () {
    return route('docteurs.dashboard');
});

Route::get('/rdv', function () {
    return view('patients.rdv');
})->name('rdv');
