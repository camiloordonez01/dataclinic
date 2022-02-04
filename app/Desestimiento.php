<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desestimiento extends Model
{
    protected $table= 'desestimiento';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'nombre',
        'cedula',
        'expedida',
        'paciente',
        'parentesco',
        'causas',
        'dia',
        'mes',
        'año',
        'testigo',
        'cedulaTestigo',
        'auxiliarAmbulancia',
        'firmaPaciente',
        'cedulaPaciente',
        'historia_clinica_id',
    ];
}
