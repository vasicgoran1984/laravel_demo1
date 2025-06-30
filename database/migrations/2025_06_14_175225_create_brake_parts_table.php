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
        Schema::create('brake_parts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model_type_id'); // veza ka model_types
            $table->enum('part_type', ['disc', 'pad']); // 'disc' ili 'pad'
            $table->string('producer'); // npr. Bosch, ATE, TRW
            $table->string('part_number'); // kataloški broj
            $table->enum('position', ['front', 'rear']); // 'front' ili 'rear'
            $table->string('part_group_code')->nullable(); // kod za grupisanje zamenskih delova
            $table->timestamps();

            $table->foreign('model_type_id')
                ->references('id')
                ->on('model_types')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brake_parts');
    }
};
