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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->references('id')->on('types');
            $table->foreignId('transmission_id')->references('id')->on('transmissions');
            $table->foreignId('fuel_id')->references('id')->on('fuels');
            $table->foreignId('service_id')->references('id')->on('services');
            $table->string('chassis_number');
            $table->string('engine_number');
            $table->string('year');
            $table->string('plate_number')->nullable();
            $table->string('volume');
            $table->string('power');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
