<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lavadero extends Model
{
    protected $table= 'lavadero';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'observaciones',
        'mes'
    ];
}
