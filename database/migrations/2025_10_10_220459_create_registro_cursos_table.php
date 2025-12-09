<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
{
    Schema::create('registros_cursos', function (Blueprint $table) {
        $table->string('folio', 20)->primary();
        $table->string('nombre_completo', 150);
        $table->string('curp', 18);
        $table->string('ocupacion', 100);
        $table->string('puesto', 100);
        $table->string('razon_social', 150);
        $table->string('rfc', 13);
        $table->string('nombre_curso', 150);
        $table->string('duracion_curso', 50);
        $table->string('anio_ejecucion', 4);
        $table->string('mes_ejecucion', 10);
        $table->string('dia_inicio', 2);
        $table->string('dia_final', 2);
        $table->string('area_tematica', 150);
        $table->string('agente_capacitador', 150);
        $table->string('representante_legal', 150);
        $table->string('representante_trabajadores', 150);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_cursos');
    }
};
