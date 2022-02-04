<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesinfeccionAmbulancias extends Model
{
    protected $table= 'desinfeccion_ambulancias';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'ambulancia',
        'fecha',
        'hora',
        'desinfectante',
        'motivo',
        'firma',
        'desinfectante_id'
    ];
}
