<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reuniones extends Model
{
    protected $table= 'reuniones';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'tema',
        'fecha',
        'hora',
        'contenido',
        'observaciones',
        'firmaInstructor',
        'cedulaInstructor',
        'cargoInstructor',
        'firmaCoordinador',
        'cedulaCoordinador'
    ];
}
