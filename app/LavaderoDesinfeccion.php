<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LavaderoDesinfeccion extends Model
{
    protected $table= 'lavadero_desinfeccion';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'fecha',
        'hora',
        'observaciones',
        'firma',
        'lavadero_id'
    ];
}
