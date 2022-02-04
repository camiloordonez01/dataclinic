<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ControlOxigeno extends Model
{
    protected $table= 'control_oxigeno';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'numeroCilindro',
        'fecha',
        'fugas',
        'abolladura',
        'nivelAdecuado',
        'cierreValvula',
        'personas_id'
    ];
}
