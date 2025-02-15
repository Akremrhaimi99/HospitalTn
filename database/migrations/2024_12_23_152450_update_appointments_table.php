<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
      // Vérifiez si la colonne 'status' existe déjà
      if (!Schema::hasColumn('appointments', 'status')) {
        Schema::table('appointments', function (Blueprint $table) {
            $table->string('status')->default('pending'); // Ajouter la colonne 'status'
        });
    }
}

public function down()
{
    Schema::table('appointments', function (Blueprint $table) {
        $table->dropColumn('appointment_date');
        $table->dropColumn('status');
    });
}

};