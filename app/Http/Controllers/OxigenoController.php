<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\ControlOxigeno;
use App\Personas;
use DB;
use Auth;
use Storage;
use App\Cilindros;

class OxigenoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = DB::table('control_oxigeno')->
                    join('personas', 'personas.id', '=', 'control_oxigeno.personas_id')->
                    select('control_oxigeno.*','personas.nombres', 'personas.apellidos')->
                    get();
        return view('panel.oxigeno.index',['datos' => $datos,'name' => 'Lista de control de oxigeno ']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $persona = Personas::select('nombres','apellidos','id')->where('usuarios_id','=',Auth::user()->id)->firstOrFail();
        $nombres = $persona->nombres.' '.$persona->apellidos;
        $cilindros = DB::table('cilindros')->
                    select('cilindros.*')->
                    get();
        return view("panel.oxigeno.create",['cilindros' => $cilindros,'nombres'=> $nombres,'idPersona' => $persona->id, 'name' => 'Registrar oxigeno']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $oxigeno = new ControlOxigeno;
        $oxigeno->numeroCilindro = $request->get('numeroCilindro');
        $oxigeno->fecha = $request->get('fecha');
        $oxigeno->fugas = $request->get('fugas');
        $oxigeno->abolladura = $request->get('abolladura');
        $oxigeno->nivelAdecuado = $request->get('nivelAdecuado');
        $oxigeno->cierreValvula = $request->get('cierreValvula');
        $oxigeno->personas_id = $request->get('idPersona');
        $oxigeno->save();

        if(!($request->get('firmaPaciente1')=='')){
            $encoded_image = explode(",", $request->get('firmaPaciente1'))[1];
            $decoded_image = base64_decode($encoded_image);
            Storage::disk('oxigenos')->put('oxigeno'.$oxigeno->id.'Firma.png', $decoded_image);

            $oxigeno->firma = 'oxigeno'.$oxigeno->id.'Firma.png';
            $oxigeno->update();
        }

        return Redirect::to('oxigeno/create')->withSuccess('Oxigeno registrado exitosamente');
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
        $datos = DB::table('control_oxigeno')->
                    select('control_oxigeno.*')->
                    where('id','=',$id)->
                    get();
        $cilindros = DB::table('cilindros')->
                    select('cilindros.*')->
                    get();
        $persona = Personas::select('nombres','apellidos','id')->where('id','=',$datos[0]->personas_id)->firstOrFail();
        $nombres = $persona->nombres.' '.$persona->apellidos;
        return view("panel.oxigeno.edit",['cilindros' => $cilindros,'nombres'=> $nombres,'idPersona' => $persona->id, 'dato' => $datos[0], 'name' => 'Editar registro oxigeno']);
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
        $oxigeno = ControlOxigeno::findOrFail($id);
        $oxigeno->numeroCilindro = $request->get('numeroCilindro');
        $oxigeno->fecha = $request->get('fecha');
        $oxigeno->fugas = $request->get('fugas');
        $oxigeno->abolladura = $request->get('abolladura');
        $oxigeno->nivelAdecuado = $request->get('nivelAdecuado');
        $oxigeno->cierreValvula = $request->get('cierreValvula');
        $oxigeno->personas_id = $request->get('idPersona');
        $oxigeno->update();

        if(!($request->get('firmaPaciente1')=='')){
            $encoded_image = explode(",", $request->get('firmaPaciente1'))[1];
            $decoded_image = base64_decode($encoded_image);
            Storage::disk('oxigenos')->put('oxigeno'.$oxigeno->id.'Firma.png', $decoded_image);

            $oxigeno->firma = 'oxigeno'.$oxigeno->id.'Firma.png';
            $oxigeno->update();
        }
        return Redirect::to('oxigeno')->withSuccess('Registro de oxigeno editado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oxigeno = ControlOxigeno::findOrFail($id);
        $oxigeno->delete();

        return Redirect::to('oxigeno')->withSuccess('Registro de oxigeno eliminado exitosamente');
    }

    public function generatePdf($id){
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
        $fecha1 = date("Y").'-'.$fecha[$id][0].'-'.'01';
        $fecha2 = date("Y").'-'.$fecha[$id][0].'-'.$fecha[$id][1];
        
        $datos = DB::table('control_oxigeno')->
                    join('personas', 'personas.id', '=', 'control_oxigeno.personas_id')->
                    select('control_oxigeno.*','personas.nombres','personas.apellidos')->
                    where('control_oxigeno.fecha', '>=', $fecha1)->
                    where('control_oxigeno.fecha', '<=', $fecha2)->
                    get();

        $pdf = \PDF::loadView('panel.oxigeno.pdf',['datos' => $datos])->setPaper('a4', 'landscape');
        return $pdf->download('oxigeno_'.$id.'.pdf');
    }
    public function cilindros(){
        $datos = DB::table('cilindros')->
                    select('cilindros.*')->
                    get();
        return view('panel.oxigeno.cilindros',['datos' => $datos,'name' => 'Lista de cilindros de oxigeno ']);
    }
    public function cilindrosStore(Request $request){
        $cilindro = new Cilindros;
        $cilindro->numero = $request->get('numero');
        $cilindro->save();

        return 'OK';
    }
    public function cilindrosDelete(Request $request){
        $cilindro = Cilindros::findOrFail($request->get('numero'));
        $cilindro->delete();

        return 'OK';
    }
}
