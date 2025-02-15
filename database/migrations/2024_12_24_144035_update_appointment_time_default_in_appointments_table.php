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
            $table->dateTime('appointment_time')->default(now())->change();
        });
    }
    
    public function down()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dateTime('appointment_time')->nullable(false)->change();
        });
    }
};