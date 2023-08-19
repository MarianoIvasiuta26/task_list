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
        Schema::table('tareas', function (Blueprint $table) {
            $table->unsignedBigInteger('estado_tarea_id')->default(1);
            $table->foreign('estado_tarea_id')->references('id')->on('estado_tareas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tareas', function (Blueprint $table) {
            $table->dropForeign(['estado_tarea_id']);
            $table->dropColumn('estado_tarea_id');
        });
    }
};
