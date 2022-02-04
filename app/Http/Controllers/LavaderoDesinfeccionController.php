<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Storage;
use App\Lavadero;
use App\LavaderoDesinfeccion;

class LavaderoDesinfeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = DB::table('lavadero_desinfeccion')->
                    select('lavadero_desinfeccion.*')->
                    get();
        $aux = DB::table('lavadero')->
                            select('lavadero.*')->
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

        return view('panel.lavadero.index',['datos' => $datos,'observaciones' => $observaciones,'name' => 'Lista de control de desinfección del lavadero ']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.lavadero.create',['name' => 'Registrar desinfección del lavadero ']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mes_actual = DB::table('lavadero')->
                        select('lavadero.*')->
                        where('mes','=',date('m'))->
                        where('año','=',date('Y'))->get();
        $lavadero;
        if(count($mes_actual)==0){
            $lavadero = new Lavadero;
            $lavadero->mes = date('m');
            $lavadero->año = date('Y');
            $lavadero->save();
        }else{
            $lavadero = $mes_actual[0];
        }

        $desinfeccion = new LavaderoDesinfeccion;
        $desinfeccion->fecha = $request->get('fecha');
        $desinfeccion->hora = $request->get('hora');
        $desinfeccion->observaciones = $request->get('observaciones');
        $desinfeccion->lavadero_id = $lavadero->id;
        $desinfeccion->save();

        if(!($request->get('firmaPaciente1')=='')){
            $encoded_image = explode(",", $request->get('firmaPaciente1'))[1];
            $decoded_image = base64_decode($encoded_image);
            Storage::disk('lavadero')->put('lavadero'.$desinfeccion->id.'Firma.png', $decoded_image);

            $desinfeccion->firma = 'lavadero'.$desinfeccion->id.'Firma.png';
            $desinfeccion->update();
        }
        return Redirect::to('lavadero')->withSuccess('Desinfeccion del lavadero registrado exitosamente');
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
        $desinfeccion = DB::table('lavadero_desinfeccion')->
                            select('lavadero_desinfeccion.*')->
                            where('id','=',$id)->
                            get();
        return view('panel.lavadero.edit',['desinfeccion' => $desinfeccion[0],'name' => 'Editar control de desinfección del lavadero ']);
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
        $desinfeccion = LavaderoDesinfeccion::findOrFail($id);
        $desinfeccion->fecha = $request->get('fecha');
        $desinfeccion->hora = $request->get('hora');
        $desinfeccion->observaciones = $request->get('observaciones');
        $desinfeccion->update();

        if(!($request->get('firmaPaciente1')=='')){
            $encoded_image = explode(",", $request->get('firmaPaciente1'))[1];
            $decoded_image = base64_decode($encoded_image);
            Storage::disk('lavadero')->put('lavadero'.$desinfeccion->id.'Firma.png', $decoded_image);

            $desinfeccion->firma = 'lavadero'.$desinfeccion->id.'Firma.png';
            $desinfeccion->update();
        }
        return Redirect::to('lavadero')->withSuccess('Desinfeccion del lavadero editado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desinfeccion = LavaderoDesinfeccion::findOrFail($id);
        $desinfeccion->delete();

        return Redirect::to('lavadero')->withSuccess('Desinfeccion del lavadero eliminado exitosamente');

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

        $idLavadero = DB::table('lavadero')->
                        select('lavadero.id')->
                        where('mes','=',$fecha[$id][0])->
                        where('año','=',date('Y'))->get();
        
        $lavadero = Lavadero::findOrFail($idLavadero[0]->id);
        $lavadero->observaciones = $request->input('observacion');
        $lavadero->update();

        $fecha1 = date("Y").'-'.$fecha[$id][0].'-'.'01';
        $fecha2 = date("Y").'-'.$fecha[$id][0].'-'.$fecha[$id][1];

        $datos = DB::table('lavadero_desinfeccion')->
                    select('lavadero_desinfeccion.*')->
                    where('lavadero_desinfeccion.fecha', '>=', $fecha1)->
                    where('lavadero_desinfeccion.fecha', '<=', $fecha2)->
                    get();
                    
        $pdf = \PDF::loadView("panel.lavadero.pdf",['datos' => $datos,'mes' => $id ,'observaciones' => $request->input('observacion')]);

        return $pdf->download('lavadero_'.$id.'.pdf');
    }
}
