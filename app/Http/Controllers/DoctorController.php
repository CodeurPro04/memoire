<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialty;
use App\Models\Establishment;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    
    /**
     * Afficher tous les médecins
     */
    public function index(Request $request)
    {
        $query = Doctor::query();

        if ($search = $request->input('search')) {
            $query->search($search);
        }

        if ($specialty = $request->input('specialty_id')) {
            $query->bySpecialty($specialty);
        }

        if ($establishment = $request->input('establishment_id')) {
            $query->byEstablishment($establishment);
        }

        $doctors = $query->paginate(15);

        return view('docteurs.index', compact('doctors'));
    }

    /**
     * Afficher le formulaire de création
     */
    public function create()
    {
        $specialties = Specialty::all();
        $establishments = Establishment::all();
        return view('docteurs.create', compact('specialties', 'establishments'));
    }
    

    /**
     * Enregistrer un nouveau médecin
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:doctors',
            'phone' => 'nullable|string',
            'license_number' => 'required|string|unique:doctors',
            'specialty_id' => 'nullable|exists:specialties,id',
            'establishment_id' => 'nullable|exists:establishments,id',
            'years_of_experience' => 'nullable|integer',
            'education' => 'nullable|array',
            'certifications' => 'nullable|array',
            'languages' => 'nullable|array',
            'consultation_fee' => 'nullable|numeric',
            'availability' => 'nullable|array',
            'status' => 'nullable|string',
            'bio' => 'nullable|string',
            'profile_photo' => 'nullable|string',
        ]);

        Doctor::create($validated);

        return redirect()->route('doctors.index')->with('success', 'Médecin créé avec succès.');
    }

    /**
     * Afficher les détails d’un médecin
     */
    public function show(Doctor $doctor)
    {
        return view('docteurs.show', compact('doctor'));
    }

    /**
     * Afficher le formulaire de modification
     */
    public function edit(Doctor $doctor)
    {
        $specialties = Specialty::all();
        $establishments = Establishment::all();
        return view('docteurs.edit', compact('doctor', 'specialties', 'establishments'));
    }

    /**
     * Enregistrer les modifications
     */
    public function update(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:doctors,email,' . $doctor->id,
            'phone' => 'nullable|string',
            'license_number' => 'required|string|unique:doctors,license_number,' . $doctor->id,
            'specialty_id' => 'nullable|exists:specialties,id',
            'establishment_id' => 'nullable|exists:establishments,id',
            'years_of_experience' => 'nullable|integer',
            'education' => 'nullable|array',
            'certifications' => 'nullable|array',
            'languages' => 'nullable|array',
            'consultation_fee' => 'nullable|numeric',
            'availability' => 'nullable|array',
            'status' => 'nullable|string',
            'bio' => 'nullable|string',
            'profile_photo' => 'nullable|string',
        ]);

        $doctor->update($validated);

        return redirect()->route('doctors.index')->with('success', 'Médecin mis à jour avec succès.');
    }

    /**
     * Supprimer un médecin (soft delete)
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()->route('doctors.index')->with('success', 'Médecin supprimé.');
    }
}
