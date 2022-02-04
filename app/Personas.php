<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    protected $table= 'personas';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'nombres',
        'apellidos',
        'tipo_documento',
        'documento',
        'fecha_nacimiento',
        'telefono',
        'celular',
        'correo',
        'genero',
        'usuarios_id'
    ];
}
