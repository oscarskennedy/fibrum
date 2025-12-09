<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistroCurso extends Model
{
    protected $table = 'registros_cursos';
    protected $primaryKey = 'folio';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'folio', 'nombre_completo', 'curp', 'ocupacion', 'puesto', 'razon_social',
        'rfc', 'nombre_curso', 'duracion_curso', 'anio_ejecucion', 'mes_ejecucion',
        'dia_inicio', 'dia_final', 'area_tematica', 'agente_capacitador',
        'representante_legal', 'representante_trabajadores', 'user_id'
    ];
}
