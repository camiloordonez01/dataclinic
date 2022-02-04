<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cilindros extends Model
{
    protected $table= 'cilindros';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'numero'
    ];
}
