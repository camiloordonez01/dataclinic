<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcedimientoHistoria extends Model
{
    protected $table= 'procedimiento_historia';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'historia_clinica_id',
        'procedimientos_id'
    ];
}
