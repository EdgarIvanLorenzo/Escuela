<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carga_materias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idMateria')
                ->nullable()
                ->constrained('materias');
            $table->foreignId('idGrupo')
                ->nullable()
                ->constrained('grupos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carga_materias');
    }
};
