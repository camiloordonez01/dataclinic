<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soportes extends Model
{
    protected $table= 'soportes';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'historia_clinica_id',
        'url'
    ];
}
