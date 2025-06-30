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
            if (!Schema::hasColumn('car_services', 'mechanic_id')) {
                $table->unsignedBigInteger('mechanic_id')->nullable()->after('service_id');
                $table->foreign('mechanic_id')->references('id')->on('mechanics')->onDelete('set null');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('car_services', function (Blueprint $table) {
            $table->dropForeign(['mechanic_id']);
            $table->dropColumn('mechanic_id');
        });
    }
};
