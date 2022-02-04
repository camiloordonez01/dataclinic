<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PersonasFormRequest;
use App\Http\Requests\PassResetFormRequest;
use App\Personas;
use App\User;
use DB;

class perfilController extends Controller
{
    public function __construct(){
        
    }

    public function index(Request $request)
    {
        if($request)
        {
            $persona = Personas::where('usuarios_id',Auth::user()->id)->firstOrFail();
            return view('panel.perfil.index', ["persona" =>$persona,'name' => 'Perfil']);
        }
    }
    public function edit($id)
    {
        return view("panel.perfil.edit",["persona"=> Personas::findOrFail($id), 'name' => 'Editar Perfil']);
    }
    public function update(PersonasFormRequest $request, $id)
    {
        $persona=Personas::findOrFail($id);
        $persona->nombres=$request->get('nombres');
        $persona->apellidos=$request->get('apellidos');
        $persona->correo=$request->get('correo');
        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->documento=$request->get('documento');
        $persona->fecha_nacimiento=$request->get('fecha_nacimiento');
        $persona->telefono=$request->get('telefono');
        $persona->celular=$request->get('celular');
        $persona->genero=$request->get('genero');
        $persona->update();

        return Redirect::to('perfil');

    }
    public function resetPassword(PassResetFormRequest $request)
    {
        $newPassword = bcrypt($request->get('new_password'));

        $user = Auth::user();
        $user->password = $newPassword;
        $user->update();

        return Redirect::to('perfil')->withSuccess('Contraseña actualizada correctamente');;
    }
}
