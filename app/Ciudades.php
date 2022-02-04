<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudades extends Model
{
    protected $table= 'ciudades';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'codigo',
        'nombre',
        'departamentos_id'
    ];
}
