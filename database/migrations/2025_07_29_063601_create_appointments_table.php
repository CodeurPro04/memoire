<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            
            // Relations
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->foreignId('doctor_id')->constrained('doctors')->onDelete('cascade');
            
            // Informations de base du rendez-vous
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->integer('duration')->default(30); // Durée en minutes
            $table->enum('type', [
                'consultation',
                'follow_up', 
                'emergency',
                'routine'
            ])->default('consultation');
            
            // Statut du rendez-vous
            $table->enum('status', [
                'scheduled',
                'confirmed',
                'in_progress',
                'completed',
                'cancelled',
                'no_show'
            ])->default('scheduled');
            
            // Détails du rendez-vous
            $table->text('reason')->nullable(); // Motif de consultation
            $table->text('notes')->nullable();  // Notes du médecin
            
            // Informations financières
            $table->decimal('consultation_fee', 10, 2)->nullable();
            $table->enum('payment_status', [
                'pending',
                'paid',
                'refunded'
            ])->default('pending');
            $table->enum('payment_method', [
                'cash',
                'card',
                'mobile_money',
                'insurance',
                'bank_transfer'
            ])->nullable();
            
            // Code de confirmation
            $table->string('confirmation_code', 8)->nullable()->unique();
            
            // Informations d'annulation
            $table->timestamp('cancelled_at')->nullable();
            $table->foreignId('cancelled_by')->nullable()->constrained('users')->nullOnDelete();
            $table->text('cancellation_reason')->nullable();
            
            // Rappel
            $table->timestamp('reminded_at')->nullable();
            
            // Timestamps et soft delete
            $table->timestamps();
            $table->softDeletes();
            
            // Index pour optimiser les requêtes
            $table->index(['appointment_date', 'appointment_time']);
            $table->index(['patient_id', 'appointment_date']);
            $table->index(['doctor_id', 'appointment_date']);
            $table->index('status');
            $table->index('confirmation_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};