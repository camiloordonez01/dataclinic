<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Storage;
use App\Desinfeccion;
use App\DesinfeccionAmbulancias;

class DesinfeccionAmbulanciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = DB::table('desinfeccion_ambulancias')->
                    select('desinfeccion_ambulancias.*')->
                    get();
        $aux = DB::table('desinfeccion')->
                    select('desinfeccion.*')->
                    where('año','=',date('Y'))->
                    get();
        $observaciones = [
            '01' => '',
            '02' => '',
            '03' => '',
            '04' => '',
            '05' => '',
            '06' => '',
            '07' => '',
            '08' => '',
            '09' => '',
            '10' => '',
            '11' => '',
            '12' => '',
        ];
        foreach($aux as $a){
            $observaciones[$a->mes] = $a->observaciones;
        }

        return view('panel.desinfeccion.index',['datos' => $datos,'observaciones' => $observaciones,'name' => 'Lista de control de desinfección de ambulancias']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.desinfeccion.create',['name' => 'Registrar desinfección de ambulancia ']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mes_actual = DB::table('desinfeccion')->
                        select('desinfeccion.*')->
                        where('mes','=',date('m'))->
                        where('año','=',date('Y'))->get();
        $desinfeccion;
        if(count($mes_actual)==0){
            $desinfeccion = new Desinfeccion;
            $desinfeccion->mes = date('m');
            $desinfeccion->año = date('Y');
            $desinfeccion->save();
        }else{
            $desinfeccion = $mes_actual[0];
        }

        $ambulancia = new DesinfeccionAmbulancias;
        $ambulancia->ambulancia = $request->get('ambulancia');
        $ambulancia->fecha = $request->get('fecha');
        $ambulancia->hora = $request->get('hora');
        $ambulancia->desinfectante = $request->get('desinfectante');
        $ambulancia->motivo = $request->get('motivo');
        $ambulancia->desinfeccion_id = $desinfeccion->id;
        $ambulancia->save();

        if(!($request->get('firmaPaciente1')=='')){
            $encoded_image = explode(",", $request->get('firmaPaciente1'))[1];
            $decoded_image = base64_decode($encoded_image);
            Storage::disk('desinfeccion')->put('desinfeccion'.$desinfeccion->id.'Firma.png', $decoded_image);

            $ambulancia->firma = 'desinfeccion'.$desinfeccion->id.'Firma.png';
            $ambulancia->update();
        }
        return Redirect::to('desinfeccion')->withSuccess('Desinfeccion de la ambulancia registrada exitosamente');
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
        $desinfeccion = DB::table('desinfeccion_ambulancias')->
                            select('desinfeccion_ambulancias.*')->
                            where('id','=',$id)->
                            get();
        return view('panel.desinfeccion.edit',['desinfeccion' => $desinfeccion[0],'name' => 'Editar control de desinfección de ambulancia']);
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
        $desinfeccion = DesinfeccionAmbulancias::findOrFail($id);
        $desinfeccion->ambulancia = $request->get('ambulancia');
        $desinfeccion->fecha = $request->get('fecha');
        $desinfeccion->hora = $request->get('hora');
        $desinfeccion->desinfectante = $request->get('desinfectante');
        $desinfeccion->motivo = $request->get('motivo');
        $desinfeccion->update();

        if(!($request->get('firmaPaciente1')=='')){
            $encoded_image = explode(",", $request->get('firmaPaciente1'))[1];
            $decoded_image = base64_decode($encoded_image);
            Storage::disk('desinfeccion')->put('desinfeccion'.$desinfeccion->id.'Firma.png', $decoded_image);

            $desinfeccion->firma = 'desinfeccion'.$desinfeccion->id.'Firma.png';
            $desinfeccion->update();
        }
        return Redirect::to('desinfeccion')->withSuccess('Desinfeccion de ambulancia editado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desinfeccion = DesinfeccionAmbulancias::findOrFail($id);
        $desinfeccion->delete();

        return Redirect::to('desinfeccion')->withSuccess('Desinfeccion de ambulancia eliminado exitosamente');
    }
    public function generatePdf(Request $request, $id){
        $fecha =array(
            'Enero' => ['01','31'],
            'Febrero' => ['02','28'],
            'Marzo' => ['03','31'],
            'Abril' => ['04'.'30'],
            'Mayo' => ['05','31'],
            'Junio' => ['06'.'30'],
            'Julio' => ['07','31'],
            'Agosto' => ['08','31'],
            'Septiembre' => ['09'.'30'],
            'Octubre' => ['10','31'],
            'Noviembre' => ['11'.'30'],
            'Diciembre' => ['12','31']
        );
        if(date("L")){
            $fecha['Febrero'] = ['02','29'];
        }

        $idDesinfeccion = DB::table('desinfeccion')->
                        select('desinfeccion.id')->
                        where('mes','=',$fecha[$id][0])->
                        where('año','=',date('Y'))->get();
        
        $desinfeccion = Desinfeccion::findOrFail($idDesinfeccion[0]->id);
        $desinfeccion->observaciones = $request->input('observacion');
        $desinfeccion->update();

        $fecha1 = date("Y").'-'.$fecha[$id][0].'-'.'01';
        $fecha2 = date("Y").'-'.$fecha[$id][0].'-'.$fecha[$id][1];

        $datos = DB::table('desinfeccion_ambulancias')->
                    select('desinfeccion_ambulancias.*')->
                    where('desinfeccion_ambulancias.fecha', '>=', $fecha1)->
                    where('desinfeccion_ambulancias.fecha', '<=', $fecha2)->
                    get();
        $pdf = \PDF::loadView("panel.desinfeccion.pdf",['datos' => $datos,'mes' => $id ,'observaciones' => $request->input('observacion')]);

        return $pdf->download('desinfeccion_'.$id.'.pdf');
    }
}
