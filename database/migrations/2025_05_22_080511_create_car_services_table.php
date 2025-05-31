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
        Schema::create('car_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_service_id')->references('id')->on('book_services');
            $table->foreignId('service_id')->references('id')->on('services');
            $table->boolean('oil')->default(false);
            $table->string('oil_name', 45)->nullable();
            $table->boolean('oil_filter')->default(false);
            $table->boolean('air_filter')->default(false);
            $table->boolean('inner_filter')->default(false);
            $table->boolean('fuel_filter')->default(false);

            $table->boolean('brake_pads_front')->default(false);
            $table->boolean('disc_front')->default(false);

            $table->boolean('brake_pads_rear')->default(false);
            $table->boolean('disc_rear')->default(false);

            $table->boolean('front_left_cylinder')->default(false);
            $table->boolean('front_right_cylinder')->default(false);
            $table->boolean('rear_left_cylinder')->default(false);
            $table->boolean('rear_right_cylinder')->default(false);

            $table->boolean('belt')->default(false);
            $table->boolean('water_pump')->default(false);
            $table->boolean('alt_pulley')->default(false);
            $table->boolean('spanner')->default(false);
            $table->boolean('roll')->default(false);
            $table->boolean('outside_belt')->default(false);
            $table->boolean('outside_spanner')->default(false);

            $table->text('description')->nullable();

            $table->string('kilometers', 20)->default('0');
            $table->decimal('price', 20, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_services');
    }
};
