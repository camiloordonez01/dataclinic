<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $table= 'encuestas';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'trato',
        'velocidad',
        'comodidad',
       'calificacion',
       'recomendacion',
       'sugerencias',
       'nombre',
       'telefono',
       'cedula',
       'historia_clinica_id'
    ];
}

