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
            $table->id(); // ID unique pour chaque rendez-vous.
            $table->unsignedBigInteger('patient_id');  // Référence à l'utilisateur patient.
            $table->unsignedBigInteger('doctor_id'); // Référence à l'utilisateur docteur.
            $table->dateTime('appointment_time')->nullable(); // Date et heure du rendez-vous.
            $table->string('status')->default('pending'); // Statut du rendez-vous
            $table->timestamps(); // Horodatage pour la création et la mise à jour


            $table->foreign('patient_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments'); // Supprime la table si la migration est annulée.
    }
};