<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\TipoHistoria;
use DB;

class TipoHistoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = DB::table('tipo_historia')->select('tipo_historia.*')->get();
        return view('panel.historia.tipo.index',['datos' => $datos,'name' => 'Lista de tipos de servicios']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $encuesta = 0;

        if($request->get('encuesta')=='on'){
            $encuesta = 1;
        }
        $historia = new TipoHistoria;
        $historia->nombre = $request->get('nombre');
        $historia->encuesta = $encuesta;
        $historia->save();

        return Redirect::to('historia/tipo')->withSuccess('Tipo de servicio agregado exitosamente');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo=TipoHistoria::findOrFail($id);
        $tipo->delete();

        return Redirect::to('historia/tipo')->withSuccess('Tipo de servicio eliminada exitosamente');
    }
}
