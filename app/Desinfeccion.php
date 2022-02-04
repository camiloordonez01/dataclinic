<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desinfeccion extends Model
{
    protected $table= 'desinfeccion';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'observaciones',
        'mes'
    ];
}
