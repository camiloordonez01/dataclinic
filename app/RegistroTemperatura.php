<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroTemperatura extends Model
{
    protected $table= 'registro_temperatura';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'temperatura',
        'humedad',
        'hora',
        'jornada',
        'fecha',
        'personas_id'
    ];
}
