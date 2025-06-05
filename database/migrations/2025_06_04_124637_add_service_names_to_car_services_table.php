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
        Schema::table('car_services', function (Blueprint $table) {
            $table->string('small_service_name')->after('service_id')->nullable();
            $table->string('big_service_name')->after('small_service_name')->nullable();
            $table->string('brakes_service_name')->after('big_service_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('car_services', function (Blueprint $table) {
            $table->dropColumn('small_service_name');
            $table->dropColumn('big_service_name');
            $table->dropColumn('brakes_service_name');
        });
    }
};
