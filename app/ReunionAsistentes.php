<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReunionAsistentes extends Model
{
    protected $table= 'reunion_asistentes';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'nombre',
        'telefono',
        'cargo',
        'firma',
        'reuniones_id'
    ];
}
