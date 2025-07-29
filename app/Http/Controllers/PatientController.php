<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Afficher la liste des patients
     */
    public function index(Request $request)
    {
        $query = Patient::query();

        // Recherche
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        // Filtrage par région
        if ($request->filled('region')) {
            $query->byRegion($request->region);
        }

        // Filtrage par statut
        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->active();
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        $patients = $query->orderBy('created_at', 'desc')
                         ->paginate(15)
                         ->withQueryString();

        // Récupérer les régions pour le filtre
        $regions = Patient::distinct()->pluck('region')->filter()->sort();

        return view('patients.index', compact('patients', 'regions'));
    }

    /**
     * Afficher l'espace patient (dashboard patient)
     */
    public function patientEspace()
    {
        // Si vous avez un système d'authentification patient séparé
        // $patient = auth('patient')->user();
        
        // Pour l'instant, on peut simuler ou récupérer les données autrement
        // Vous devrez adapter selon votre logique d'authentification
        
        // Exemple avec un patient fictif ou le premier patient
        $patient = Patient::first(); // À remplacer par votre logique
        

        // Charger les données nécessaires pour le dashboard
        $appointments = collect([
            [
                'id' => 1,
                'date' => '2025-07-28',
                'time' => '10:00',
                'doctor' => 'Dr. Martin',
                'type' => 'Consultation générale',
                'location' => 'Cabinet médical Centre-ville'
            ],
            [
                'id' => 2,
                'date' => '2025-08-05',
                'time' => '14:30',
                'doctor' => 'Dr. Dubois',
                'type' => 'Suivi spécialisé',
                'location' => 'Clinique Saint-Pierre'
            ]
        ]);

        $recentResults = collect([
            [
                'id' => 1,
                'type' => 'Analyse sanguine complète',
                'date' => '2025-07-25',
                'doctor' => 'Dr. Martin',
                'status' => 'nouveau'
            ],
            [
                'id' => 2,
                'type' => 'Radiographie thoracique',
                'date' => '2025-07-20',
                'doctor' => 'Dr. Dubois',
                'status' => 'normal'
            ]
        ]);

        $messages = collect([
            [
                'id' => 1,
                'from' => 'Dr. Martin',
                'subject' => 'Réponse à votre question sur...',
                'unread' => true
            ],
            [
                'id' => 2,
                'from' => 'Cabinet',
                'subject' => 'Confirmation de rendez-vous',
                'unread' => false
            ]
        ]);

        $alerts = collect([
            [
                'type' => 'warning',
                'title' => 'Nouveau résultat',
                'message' => 'Analyse sanguine disponible'
            ],
            [
                'type' => 'info',
                'title' => 'Rappel RDV',
                'message' => 'Rendez-vous dans 2 jours'
            ]
        ]);

        return view('patients.espace', compact('patient', 'appointments', 'recentResults', 'messages', 'alerts'));
    }

    /**
     * Afficher les détails d'un patient
     */
    public function show(Patient $patient)
    {
        // Charger les relations avec les rendez-vous récents
        $patient->load(['appointments' => function($query) {
            $query->orderBy('appointment_date', 'desc')->limit(5);
        }]);

        return view('patients.detail', compact('patient'));
    }

    /**
     * Afficher le formulaire de création
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Enregistrer un nouveau patient
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:patients',
            'phone' => 'required|string|max:20',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:M,F,Autre',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'emergency_contact_name' => 'required|string|max:255',
            'emergency_contact_phone' => 'required|string|max:20',
            'blood_type' => 'nullable|string|max:10',
            'allergies' => 'nullable|array',
            'medical_history' => 'nullable|array',
            'insurance_number' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $patient = Patient::create($validatedData);

        return redirect()->route('patients.detail', $patient)
                        ->with('success', 'Patient créé avec succès.');
    }

    /**
     * Afficher le formulaire d'édition
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Mettre à jour un patient
     */
    public function update(Request $request, Patient $patient)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email,' . $patient->id,
            'phone' => 'required|string|max:20',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:M,F,Autre',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'emergency_contact_name' => 'required|string|max:255',
            'emergency_contact_phone' => 'required|string|max:20',
            'blood_type' => 'nullable|string|max:10',
            'allergies' => 'nullable|array',
            'medical_history' => 'nullable|array',
            'insurance_number' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $patient->update($validatedData);

        return redirect()->route('patients.detail', $patient)
                        ->with('success', 'Patient mis à jour avec succès.');
    }

    /**
     * Supprimer (soft delete) un patient
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')
                        ->with('success', 'Patient supprimé avec succès.');
    }

    /**
     * Recherche de patients (pour l'API)
     */
    public function search(Request $request)
    {
        $query = Patient::query();

        if ($request->filled('q')) {
            $query->search($request->q);
        }

        $patients = $query->active()
                         ->limit(10)
                         ->get(['id', 'first_name', 'last_name', 'email']);

        return response()->json($patients);
    }
}