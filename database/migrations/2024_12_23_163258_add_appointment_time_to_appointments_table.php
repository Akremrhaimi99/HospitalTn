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
    Schema::table('appointments', function (Blueprint $table) {
        $table->datetime('appointment_time')->nullable(false); // Ajoutez la colonne datetime
    });
}

public function down()
{
    Schema::table('appointments', function (Blueprint $table) {
        $table->dropColumn('appointment_time'); // Supprimez la colonne si nécessaire
    });
}

};