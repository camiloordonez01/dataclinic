<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direcciones extends Model
{
    protected $table= 'direcciones';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'direccion',
        'zona',
        'barrio',
        'ciudades_id',
        'personas_id'
    ];
}
