<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Storage;
use App\AmbulanciasMantenimientos;

class AmbulanciasMantenimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = DB::table('ambulancias_mantenimientos')->
                    select('ambulancias_mantenimientos.*')->
                    get();
        return view('panel.ambulancia.mantenimiento.index', ['datos' => $datos,'name' => 'Lista de mantenimientos a ambulancias']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.ambulancia.mantenimiento.create',['name' => 'Crear un mantenimiento de ambulancia']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mantenimiento = new AmbulanciasMantenimientos;
        $mantenimiento->movil = $request->get('movil');
        $mantenimiento->kilometros = $request->get('kilometraje');
        $mantenimiento->fecha = $request->get('fecha');
        $mantenimiento->mantenimiento = $request->get('mantenimiento');
        $mantenimiento->responsable = $request->get('responsable');
        $mantenimiento->observacion = $request->get('observaciones');
        $mantenimiento->save();

        return Redirect::to('ambulancias/mantenimientos')->withSuccess('Mantenimientos de ambulancia creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mantenimiento = DB::table('ambulancias_mantenimientos')->
                    select('ambulancias_mantenimientos.*')->
                    where('id','=',$id)->
                    get();
        return view("panel.ambulancia.mantenimiento.edit",['mantenimiento' => $mantenimiento[0], 'name' => 'Editar mantenimiento ambulancia']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mantenimiento = AmbulanciasMantenimientos::findOrFail($id);
        $mantenimiento->movil = $request->get('movil');
        $mantenimiento->kilometros = $request->get('kilometraje');
        $mantenimiento->fecha = $request->get('fecha');
        $mantenimiento->mantenimiento = $request->get('mantenimiento');
        $mantenimiento->responsable = $request->get('responsable');
        $mantenimiento->observacion = $request->get('observaciones');
        $mantenimiento->update();

        return Redirect::to('ambulancias/mantenimientos')->withSuccess('Mantenimientos de ambulancia editada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mantenimiento = AmbulanciasMantenimientos::findOrFail($id);
        $mantenimiento->delete();

        return Redirect::to('ambulancias/mantenimientos')->withSuccess('Mantenimientos de ambulancia eliminada exitosamente');
    }
    public function generatePdf(){
        $inicio = $_GET['fechaInicio'];
        $fin = $_GET['fechaFin'];

        $mantenimiento = DB::table('ambulancias_mantenimientos')->
                    select('ambulancias_mantenimientos.*')->
                    where('fecha','>=',$inicio)->
                    where('fecha','<=',$fin)->
                    get();
        //return view('panel.ambulancia.mantenimiento.pdf',['datos' => $mantenimiento]);
        $pdf = \PDF::loadView('panel.ambulancia.mantenimiento.pdf',['datos' => $mantenimiento]);
        return $pdf->download('mantenimientos_ambulancia.pdf');
    }
}
