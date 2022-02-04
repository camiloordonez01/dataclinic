<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmbulanciasDocumentos extends Model
{
    protected $table= 'ambulancias_documentos';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'ambulancias_id',
        'url'
    ];
}
