<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'appointment_date',
        'appointment_time',
        'duration',
        'type',
        'status',
        'reason',
        'notes',
        'consultation_fee',
        'payment_status',
        'payment_method',
        'confirmation_code',
        'cancelled_at',
        'cancelled_by',
        'cancellation_reason',
        'reminded_at',
    ];

    protected $casts = [
        'appointment_date' => 'date',
        'appointment_time' => 'datetime',
        'duration' => 'integer',
        'consultation_fee' => 'decimal:2',
        'cancelled_at' => 'datetime',
        'reminded_at' => 'datetime',
    ];

    protected $dates = [
        'deleted_at',
        'cancelled_at',
        'reminded_at',
    ];

    // Statuts possibles
    const STATUS_SCHEDULED = 'scheduled';
    const STATUS_CONFIRMED = 'confirmed';
    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_NO_SHOW = 'no_show';

    // Types de rendez-vous
    const TYPE_CONSULTATION = 'consultation';
    const TYPE_FOLLOW_UP = 'follow_up';
    const TYPE_EMERGENCY = 'emergency';
    const TYPE_ROUTINE = 'routine';

    // Statuts de paiement
    const PAYMENT_PENDING = 'pending';
    const PAYMENT_PAID = 'paid';
    const PAYMENT_REFUNDED = 'refunded';

    /**
     * Relation avec le patient
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Relation avec le médecin
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * Relation avec la consultation (après le rendez-vous)
     */
    public function consultation()
    {
        return $this->hasOne(Consultation::class);
    }

    /**
     * Relation avec l'utilisateur qui a annulé
     */
    public function cancelledBy()
    {
        return $this->belongsTo(User::class, 'cancelled_by');
    }

    /**
     * Accesseur pour la date et heure complète
     */
    public function getFullDateTimeAttribute()
    {
        return Carbon::parse($this->appointment_date->format('Y-m-d') . ' ' . $this->appointment_time->format('H:i:s'));
    }

    /**
     * Accesseur pour vérifier si le rendez-vous est aujourd'hui
     */
    public function getIsTodayAttribute()
    {
        return $this->appointment_date->isToday();
    }

    /**
     * Accesseur pour vérifier si le rendez-vous est passé
     */
    public function getIsPastAttribute()
    {
        return $this->full_date_time->isPast();
    }

    /**
     * Scope pour les rendez-vous d'aujourd'hui
     */
    public function scopeToday($query)
    {
        return $query->whereDate('appointment_date', today());
    }

    /**
     * Scope pour les rendez-vous à venir
     */
    public function scopeUpcoming($query)
    {
        return $query->where('appointment_date', '>=', today())
                    ->where('status', '!=', self::STATUS_CANCELLED);
    }

    /**
     * Scope pour les rendez-vous passés
     */
    public function scopePast($query)
    {
        return $query->where('appointment_date', '<', today());
    }

    /**
     * Scope pour les rendez-vous confirmés
     */
    public function scopeConfirmed($query)
    {
        return $query->where('status', self::STATUS_CONFIRMED);
    }

    /**
     * Scope pour les rendez-vous en attente
     */
    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_SCHEDULED);
    }

    /**
     * Scope pour les rendez-vous annulés
     */
    public function scopeCancelled($query)
    {
        return $query->where('status', self::STATUS_CANCELLED);
    }

    /**
     * Scope pour filtrer par médecin
     */
    public function scopeByDoctor($query, $doctorId)
    {
        return $query->where('doctor_id', $doctorId);
    }

    /**
     * Scope pour filtrer par patient
     */
    public function scopeByPatient($query, $patientId)
    {
        return $query->where('patient_id', $patientId);
    }

    /**
     * Scope pour les rendez-vous nécessitant un rappel
     */
    public function scopeNeedingReminder($query)
    {
        return $query->where('appointment_date', '>=', today())
                    ->where('status', self::STATUS_CONFIRMED)
                    ->whereNull('reminded_at');
    }

    /**
     * Génère un code de confirmation unique
     */
    public static function generateConfirmationCode()
    {
        do {
            $code = strtoupper(substr(md5(uniqid(rand(), true)), 0, 8));
        } while (self::where('confirmation_code', $code)->exists());

        return $code;
    }

    /**
     * Annule le rendez-vous
     */
    public function cancel($userId = null, $reason = null)
    {
        $this->update([
            'status' => self::STATUS_CANCELLED,
            'cancelled_at' => now(),
            'cancelled_by' => $userId,
            'cancellation_reason' => $reason,
        ]);
    }

    /**
     * Confirme le rendez-vous
     */
    public function confirm()
    {
        $this->update([
            'status' => self::STATUS_CONFIRMED,
            'confirmation_code' => self::generateConfirmationCode(),
        ]);
    }
}