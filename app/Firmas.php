<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Firmas extends Model
{
    protected $table= 'firmas';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'asignacion',
        'urlFirma',
        'historia_clinica_id'
    ];
}
