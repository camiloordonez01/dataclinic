<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmbulanciasControl extends Model
{
    protected $table= 'ambulancias_control';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'empresa',
        'placa',
        'servicios',
        'inspector',
        'razon',
        'revision'
    ];
}