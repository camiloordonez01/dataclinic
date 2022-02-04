<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmbulanciasMantenimientos extends Model
{
    protected $table= 'ambulancias_mantenimientos';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'kilometros',
        'fecha',
        'mantenimiento',
        'responsable',
        'observacion'
    ];
}
