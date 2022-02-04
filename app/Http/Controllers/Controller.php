<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Personas;
use Auth;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $name;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $persona = Personas::select('nombres','apellidos')->where('usuarios_id','=',Auth::user()->id)->firstOrFail();
            $nombres = $persona->nombres.' '.$persona->apellidos;

            $this->name = $nombres;
            View::share( 'name_user', $this->name);
            
            return $next($request);
        });
    }
}
