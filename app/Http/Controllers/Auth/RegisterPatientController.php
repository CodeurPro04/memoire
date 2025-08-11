<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterPatientController extends Controller
{

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'first_name'              => ['required', 'string', 'max:255'],
                'last_name'               => ['required', 'string', 'max:255'],
                'email'                   => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone'                   => ['required', 'string', 'max:20'],
                'date_of_birth'           => ['required', 'date'],
                'gender'                  => ['required', 'in:male,female,other'],
                'address'                 => ['required', 'string', 'max:255'],
                'city'                    => ['required', 'string', 'max:255'],
                'region'                  => ['required', 'string', 'max:255'],
                'emergency_contact_name'  => ['required', 'string', 'max:255'],
                'emergency_contact_phone' => ['required', 'string', 'max:20'],
                'blood_type'              => ['nullable', 'string', 'max:3'],
                'allergies'               => ['nullable', 'string'],
                'medical_history'         => ['nullable', 'string'],
                'insurance_number'        => ['nullable', 'string', 'max:50'],
                'is_active'               => ['nullable', 'boolean'],
                'password'                => ['required', 'string', 'min:8', 'confirmed'],
            ],
            [
                // Champs obligatoires
                'first_name.required' => 'Le prénom est obligatoire.',
                'last_name.required'  => 'Le nom est obligatoire.',
                'email.required'      => 'L’adresse e-mail est obligatoire.',
                'phone.required'      => 'Le numéro de téléphone est obligatoire.',
                'date_of_birth.required' => 'La date de naissance est obligatoire.',
                'gender.required'     => 'Veuillez sélectionner votre genre.',
                'address.required'    => 'L’adresse est obligatoire.',
                'city.required'       => 'La ville est obligatoire.',
                'region.required'     => 'La région est obligatoire.',
                'emergency_contact_name.required' => 'Le nom du contact d’urgence est obligatoire.',
                'emergency_contact_phone.required' => 'Le numéro du contact d’urgence est obligatoire.',
                'password.required'   => 'Le mot de passe est obligatoire.',

                // Formats / règles spécifiques
                'email.email'         => 'Veuillez entrer une adresse e-mail valide.',
                'email.unique'        => 'Cette adresse e-mail est déjà utilisée.',
                'phone.max'           => 'Le numéro de téléphone ne doit pas dépasser 20 caractères.',
                'date_of_birth.date'  => 'Veuillez entrer une date valide.',
                'gender.in'           => 'Le genre sélectionné est invalide.',
                'blood_type.max'      => 'Le groupe sanguin ne doit pas dépasser 3 caractères.',
                'insurance_number.max' => 'Le numéro d’assurance ne doit pas dépasser 50 caractères.',
                'password.min'        => 'Le mot de passe doit contenir au moins 8 caractères.',
                'password.confirmed'  => 'Les mots de passe ne correspondent pas.',
            ]
        );
    }

    /**
     * Création de l'utilisateur
     */
    protected function create(array $data)
    {
        return Patient::create([
            'first_name'              => $data['first_name'],
            'last_name'               => $data['last_name'],
            'email'                   => $data['email'],
            'phone'                   => $data['phone'],
            'date_of_birth'           => $data['date_of_birth'],
            'gender'                  => $data['gender'],
            'address'                 => $data['address'],
            'city'                    => $data['city'],
            'region'                  => $data['region'],
            'emergency_contact_name'  => $data['emergency_contact_name'],
            'emergency_contact_phone' => $data['emergency_contact_phone'],
            'blood_type'              => $data['blood_type'] ?? null,
            'allergies'               => $data['allergies'] ?? null,
            'medical_history'         => $data['medical_history'] ?? null,
            'insurance_number'        => $data['insurance_number'] ?? null,
            'is_active'               => $data['is_active'] ?? false,
            'password'                => Hash::make($data['password']),
        ]);
    }
}
