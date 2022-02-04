<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PersonasFormRequest;
use Caffeinated\Shinobi\Models\Role;
use App\Personas;
use App\User;
use DB;
use View;
use Auth;
use caffeinated\shinobi\src\Concerns\HasRoles;

class UsuariosController extends Controller
{

    public function index(Request $request)
    {
        if($request)
        {
            $datos = DB::table('personas')->
                join('users', 'users.id', '=', 'personas.usuarios_id')->
                join('role_user', 'role_user.user_id', '=', 'users.id')->
                join('roles', 'roles.id', '=', 'role_user.role_id')->
                select('personas.*' ,'roles.name as perfil')->
                get();
            //dd($datos);
            return view('panel.usuarios.index',['usuarios' => $datos,'name' => 'Lista de usuarios']);
        }
    }
    public function create()
    {
        $roles = Role::get();
        return view("panel.usuarios.create",['name' => 'Crear un usuario','roles' =>$roles]);
    }
    public function store(PersonasFormRequest $request)
    {
        try{
            $this->validate($request, [
                'password' => 'required|min:8',
            ]);
            $user = new User;
            $user->email = $request->get('correo');
            $user->password = bcrypt($request->get('password'));
            $user->created_at = date("Y-m-d H:i:s");
            $user->updated_at = date("Y-m-d H:i:s");
            $user->save();
            
            $user->assignRoles($request->get('perfil'));

            $persona= new Personas;
            $persona->nombres=$request->get('nombres');
            $persona->apellidos=$request->get('apellidos');
            $persona->correo=$request->get('correo');
            $persona->tipo_documento=$request->get('tipo_documento');
            $persona->documento=$request->get('documento');
            $persona->fecha_nacimiento=$request->get('fecha_nacimiento');
            $persona->telefono=$request->get('telefono');
            $persona->celular=$request->get('celular');
            $persona->genero=$request->get('genero');
            $persona->usuarios_id = $user->id;
            $persona->save();

            return Redirect::to('usuarios')->withSuccess('Usuario creado exitosamente');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            return Redirect::back()->withErrors($e->errorInfo[2]);
        }
    }
    public function edit($id)
    {
        $roles = Role::get();
        $datos = DB::table('personas')->
                join('users', 'users.id', '=', 'personas.usuarios_id')->
                join('role_user', 'role_user.user_id', '=', 'users.id')->
                join('roles', 'roles.id', '=', 'role_user.role_id')->
                select('personas.*' ,'roles.name as perfil')->
                where('personas.id','=',$id)->
                get();
        return view("panel.usuarios.edit",["persona"=> $datos[0], 'name' => 'Editar Perfil','roles' =>$roles]);
    }
    public function update(PersonasFormRequest $request, $id)
    {
        try{
            $this->validate($request, [
                'password' => 'required|min:8',
            ]);
            $user = User::findOrFail($request->get('usuarios_id'));
            $user->email = $request->get('correo');
            $user->password = bcrypt($request->get('password'));
            $user->updated_at = date("Y-m-d H:i:s");
            $user->update();

            $user->syncRoles($request->get('perfil'));

            $persona= Personas::findOrFail($id);
            $persona->nombres=$request->get('nombres');
            $persona->apellidos=$request->get('apellidos');
            $persona->correo=$request->get('correo');
            $persona->tipo_documento=$request->get('tipo_documento');
            $persona->documento=$request->get('documento');
            $persona->fecha_nacimiento=$request->get('fecha_nacimiento');
            $persona->telefono=$request->get('telefono');
            $persona->celular=$request->get('celular');
            $persona->genero=$request->get('genero');
            $persona->usuarios_id = $user->id;
            $persona->update();

            return Redirect::to('usuarios')->withSuccess('Usuario actualizado exitosamente');
        }
        catch(\Illuminate\Database\QueryException $e)
		{
            return Redirect::back()->withErrors($e->errorInfo[2]);
		}
    }
    public function show($id){
        $datos = DB::table('personas')->
                join('users', 'users.id', '=', 'personas.usuarios_id')->
                join('role_user', 'role_user.user_id', '=', 'users.id')->
                join('roles', 'roles.id', '=', 'role_user.role_id')->
                select('personas.*' ,'roles.name as perfil')->
                where('personas.id','=',$id)->
                get();
        return view("panel.usuarios.show",["persona"=> $datos[0], 'name' => 'Ver usuario']);
    }
    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();

        return Redirect::to('usuarios')->withSuccess('Usuario eliminado exitosamente');

    }
}
