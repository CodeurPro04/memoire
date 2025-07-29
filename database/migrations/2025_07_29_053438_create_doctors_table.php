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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('license_number')->nullable();
            $table->foreignId('specialty_id')->constrained()->onDelete('cascade');
            $table->foreignId('establishment_id')->constrained()->onDelete('cascade');
            $table->integer('years_of_experience')->nullable();
            $table->json('education')->nullable();
            $table->json('certifications')->nullable();
            $table->json('languages')->nullable();
            $table->decimal('consultation_fee', 10, 2)->nullable();
            $table->json('availability')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected', 'suspended'])->default('pending');
            $table->text('bio')->nullable();
            $table->string('profile_photo')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->timestamp('verification_date')->nullable();
            $table->foreignId('verified_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes(); // important pour SoftDeletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
