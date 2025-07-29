<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'license_number',
        'specialty_id',
        'establishment_id',
        'years_of_experience',
        'education',
        'certifications',
        'languages',
        'consultation_fee',
        'availability',
        'status',
        'bio',
        'profile_photo',
        'is_verified',
        'verification_date',
        'verified_by',
    ];

    protected $casts = [
        'education' => 'array',
        'certifications' => 'array',
        'languages' => 'array',
        'availability' => 'array',
        'is_verified' => 'boolean',
        'verification_date' => 'datetime',
        'consultation_fee' => 'decimal:2',
    ];

    protected $dates = [
        'deleted_at',
        'verification_date',
    ];

    // Statuts possibles
    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';
    const STATUS_SUSPENDED = 'suspended';

    /**
     * Relation avec la spécialité
     */
    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    /**
     * Relation avec l'établissement
     */
    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }

    /**
     * Relation avec les rendez-vous
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * Relation avec les consultations
     */
    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }

    /**
     * Relation avec l'utilisateur qui a vérifié
     */
    public function verifier()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    /**
     * Accesseur pour le nom complet
     */
    public function getFullNameAttribute()
    {
        return "Dr. {$this->first_name} {$this->last_name}";
    }

    /**
     * Scope pour les médecins approuvés
     */
    public function scopeApproved($query)
    {
        return $query->where('status', self::STATUS_APPROVED);
    }

    /**
     * Scope pour les médecins en attente
     */
    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    /**
     * Scope pour les médecins vérifiés
     */
    public function scopeVerified($query)
    {
        return $query->where('is_verified', true);
    }

    /**
     * Scope pour rechercher par nom ou spécialité
     */
    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('first_name', 'like', "%{$search}%")
              ->orWhere('last_name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhereHas('specialty', function ($sq) use ($search) {
                  $sq->where('name', 'like', "%{$search}%");
              });
        });
    }

    /**
     * Scope pour filtrer par spécialité
     */
    public function scopeBySpecialty($query, $specialtyId)
    {
        return $query->where('specialty_id', $specialtyId);
    }

    /**
     * Scope pour filtrer par établissement
     */
    public function scopeByEstablishment($query, $establishmentId)
    {
        return $query->where('establishment_id', $establishmentId);
    }

    /**
     * Vérifie si le médecin est disponible
     */
    public function isAvailable($date, $time)
    {
        // Logique pour vérifier la disponibilité
        // Basée sur le champ availability et les rendez-vous existants
        return true; // Placeholder
    }
}