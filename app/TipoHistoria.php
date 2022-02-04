<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoHistoria extends Model
{
    protected $table= 'tipo_historia';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'nombre'
    ];
}
