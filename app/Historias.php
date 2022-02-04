<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historias extends Model
{
    protected $table= 'historia_clinica';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'placa',
        'movil',
        'horas_espera',
        'fecha',
        'motivo',
        'diagnostico',
        'observacion',
        'des_entrada_paciente',
        'des_novedad_paciente',
        'triage',
        'sv_ta',
        'tam',
        'tc',
        'sapo2',
        'fr',
        'fc',
        'fcf',
        'hora_solicitud',
        'hora_salida',
        'hora_llegada',
        'hora_final',
        'tipo_traslado',
        'tipo_recorrido',
        'ips_remitente',
        'ips_receptora',
        'ips_contraremision',
        'medico',
        'conductor',
        'tipo_auxiliar',
        'auxiliar',
        'edad_paciente',
        'sintomas',
        'alergias',
        'patologias',
        'medicamentos',
        'eventos_previos',
        'ultima_ingesta',
        'toxicos',
        'gineco',
        'quirurgico',
        'examen_fisico',
        'tipo_seguridad',
        'seguridad',
        'pacientes_id'
    ];
}
