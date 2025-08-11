<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Patient extends Authenticatable

{
    use HasFactory, SoftDeletes, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'date_of_birth',
        'gender',
        'address',
        'city',
        'region',
        'emergency_contact_name',
        'emergency_contact_phone',
        'blood_type',
        'allergies',
        'medical_history',
        'insurance_number',
        'is_active',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'allergies' => 'array',
        'medical_history' => 'array',
        'is_active' => 'boolean',
    ];

    // Accessor pour le nom complet
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    // Accessor pour l'âge
    public function getAgeAttribute()
    {
        return $this->date_of_birth ? $this->date_of_birth->age : null;
    }

    // Scope pour la recherche
    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('first_name', 'LIKE', "%{$search}%")
                ->orWhere('last_name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('phone', 'LIKE', "%{$search}%");
        });
    }

    // Scope pour filtrer par région
    public function scopeByRegion($query, $region)
    {
        return $query->where('region', $region);
    }

    // Scope pour les patients actifs
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Relation avec les rendez-vous (si vous avez une table appointments)
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
