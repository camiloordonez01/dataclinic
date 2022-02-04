<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ambulancias extends Model
{
    protected $table= 'ambulancias';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'nombre',
        'placa',
        'movil',
        'marca',
        'modelo',
        'tipo_carroceria',
        'linea',
        'realizado',
        'revisado',
        'aprovado'
    ];
}
