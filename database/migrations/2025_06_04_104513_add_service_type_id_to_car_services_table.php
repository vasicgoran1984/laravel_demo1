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
//            $table->unsignedBigInteger('service_type_id')
//                ->after('service_id')
//                ->default(1);

//            $table->foreign('service_type_id')
//                ->references('id')
//                ->on('service_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('car_services', function (Blueprint $table) {
//            $table->dropConstrainedForeignId('service_type_id');
        });

    }
};
