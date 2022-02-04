<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PersonasFormRequest;
use App\Personas;
use App\Departamentos;
use App\Ciudades;
use App\Direcciones;
use App\Paciente;
use DB;

class PacientesController extends Controller
{

    public function index(Request $request)
    {
        if($request)
        {
            $datos = DB::table('personas')->
                join('pacientes', 'personas.id', '=', 'pacientes.personas_id')->
                select('personas.*' )->
                get();
            //dd($datos);
            return view('panel.pacientes.index',['pacientes' => $datos,'name' => 'Lista de pacientes']);
        }
    }
    public function create()
    {
        $datos = DB::table('departamentos')->get();
        return view("panel.pacientes.create",['departamentos' => $datos,'name' => 'Crear un paciente']);
    }
    public function store(PersonasFormRequest $request)
    {
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
        $persona->save();

        $direccion = new Direcciones;
        $direccion->direccion = $request->get('direccion');
        $direccion->zona = $request->get('zona');
        $direccion->ciudades_id = $request->get('ciudad');
        $direccion->barrio = $request->get('barrio');
        $direccion->personas_id = $persona->id;
        $direccion->save();

        $paciente = new Paciente;
        $paciente->personas_id = $persona->id;
        $paciente->save();

        return Redirect::to('pacientes')->withSuccess('Paciente creado exitosamente');
    }
    public function show($id){
        $datos = DB::table('personas')->
                join('pacientes', 'personas.id', '=', 'pacientes.personas_id')->
                join('direcciones', 'personas.id', '=', 'direcciones.personas_id')->
                select('personas.*','direcciones.zona','direcciones.barrio', 'direcciones.direccion', 'direcciones.ciudades_id','direcciones.id as direcciones_id','pacientes.id as paciente_id')->
                where('personas.id',$id)->
                get();
        $departamentos = DB::table('departamentos')->get();
        $ciudad = DB::table('ciudades')->where('id' , '=', $datos[0]->ciudades_id)->get();
        $ciudades = DB::table('ciudades')->where('departamentos_id' , '=', $ciudad[0]->departamentos_id)->get();
        //dd($datos[0]);
        return view("panel.pacientes.show",[ "paciente"=> $datos[0],'departamentos' => $departamentos,'ciudad' => $ciudad[0],'ciudades' => $ciudades,'name' => 'Ver paciente']);
    }
    public function edit($id)
    {
        $datos = DB::table('personas')->
                join('pacientes', 'personas.id', '=', 'pacientes.personas_id')->
                join('direcciones', 'personas.id', '=', 'direcciones.personas_id')->
                select('personas.*','direcciones.zona','direcciones.barrio', 'direcciones.direccion', 'direcciones.ciudades_id','direcciones.id as direcciones_id','pacientes.id as paciente_id')->
                where('personas.id','=',$id)->
                get();
        $departamentos = DB::table('departamentos')->get();
        $ciudad = DB::table('ciudades')->where('id' , '=', $datos[0]->ciudades_id)->get();
        $ciudades = DB::table('ciudades')->where('departamentos_id' , '=', $ciudad[0]->departamentos_id)->get();
        //dd($datos[0]);
        return view("panel.pacientes.edit",[ "paciente"=> $datos[0],'departamentos' => $departamentos,'ciudad' => $ciudad[0],'ciudades' => $ciudades,'name' => 'Editar Paciente']);
    }
    public function update(PersonasFormRequest $request, $id)
    {
        try{
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
            $persona->update();

            $direccion = Direcciones::findOrFail($request->get('direcciones_id'));
            $direccion->direccion = $request->get('direccion');
            $direccion->zona = $request->get('zona');
            $direccion->barrio = $request->get('barrio');
            $direccion->ciudades_id = $request->get('ciudad');
            $direccion->update();
            
            $paciente= Paciente::findOrFail($request->get('paciente_id'));
            $paciente->update();

            return Redirect::to('pacientes')->withSuccess('Paciente editado exitosamente');
        }
        catch(\Illuminate\Database\QueryException $e)
		{
            return Redirect::back()->withErrors($e->errorInfo[2]);
		}
    }
    public function destroy($id)
    {
        $paciente=Personas::findOrFail($id);
        $paciente->delete();

        return Redirect::to('pacientes')->withSuccess('Paciente eliminado exitosamente');

    }
    
    public function getCiudades(Request $request)
    {
        $departamento = $request->get('codigo');
        $ciudades = DB::table('ciudades')->where('departamentos_id','=',$departamento)->get();
        echo $ciudades;
    }
}
