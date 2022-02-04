<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model
{
    protected $table= 'departamentos';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'codigo',
        'nombre'
    ];
}
