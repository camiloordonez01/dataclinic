<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use View;
use Storage;
use App\Personas;
use App\RegistroTemperatura;


class TemperaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = DB::table('registro_temperatura')->
                    join('personas', 'personas.id', '=', 'registro_temperatura.personas_id')->
                    select('registro_temperatura.*','personas.nombres', 'personas.apellidos')->
                    get();
        return view('panel.temperatura.index',['datos'=> $datos,'name' => 'Lista de temperaturas']);
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
        return view("panel.temperatura.create",['nombres'=> $nombres,'idPersona' => $persona->id, 'name' => 'Registrar temperatura']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $temperatura = new RegistroTemperatura;
        $temperatura->fecha = $request->get('fecha');
        $temperatura->hora = $request->get('hora');
        $temperatura->jornada = $request->get('jornada');
        $temperatura->temperatura = $request->get('temperatura');
        $temperatura->humedad = $request->get('humedad');
        $temperatura->personas_id = $request->get('idPersona');
        $temperatura->save();

        if(!($request->get('firmaPaciente1')=='')){
            $encoded_image = explode(",", $request->get('firmaPaciente1'))[1];
            $decoded_image = base64_decode($encoded_image);
            Storage::disk('temperaturas')->put('temperatura'.$temperatura->id.'Firma.png', $decoded_image);

            $temperatura->firma = 'temperatura'.$temperatura->id.'Firma.png';
            $temperatura->update();
        }

        return Redirect::to('temperatura')->withSuccess('Temperatura registrada exitosamente');
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
        $datos = DB::table('registro_temperatura')->
                    select('registro_temperatura.*')->
                    where('id','=',$id)->
                    get();
        $persona = Personas::select('nombres','apellidos','id')->where('id','=',$datos[0]->personas_id)->firstOrFail();
        $nombres = $persona->nombres.' '.$persona->apellidos;
        return view("panel.temperatura.edit",['nombres'=> $nombres,'idPersona' => $persona->id, 'dato' => $datos[0], 'name' => 'Editar temperatura']);
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
        $temperatura = RegistroTemperatura::findOrFail($id);;
        $temperatura->fecha = $request->get('fecha');
        $temperatura->hora = $request->get('hora');
        $temperatura->jornada = $request->get('jornada');
        $temperatura->temperatura = $request->get('temperatura');
        $temperatura->humedad = $request->get('humedad');
        $temperatura->personas_id = $request->get('idPersona');
        $temperatura->update();

        if(!($request->get('firmaPaciente1')=='')){
            $encoded_image = explode(",", $request->get('firmaPaciente1'))[1];
            $decoded_image = base64_decode($encoded_image);
            Storage::disk('temperaturas')->put('temperatura'.$temperatura->id.'Firma.png', $decoded_image);

            $temperatura->firma = 'temperatura'.$temperatura->id.'Firma.png';
            $temperatura->update();
        }

        return Redirect::to('temperatura')->withSuccess('Temperatura editada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $temperatura=RegistroTemperatura::findOrFail($id);
        $temperatura->delete();

        return Redirect::to('temperatura')->withSuccess('temperatura eliminado exitosamente');
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
                        
        $temperaturas = DB::select("SELECT personas.nombres,personas.apellidos,T1.fecha as fecha,T1.temperatura as temperatura1, T1.humedad as humedad1, T1.hora as hora1,T2.temperatura as temperatura2, T2.humedad as humedad2, T2.hora as hora2 FROM (SELECT * FROM `registro_temperatura` WHERE fecha>='2020-10-01' and fecha <='2020-10-31' and jornada='MAÑANA') T1 INNER JOIN (SELECT * FROM `registro_temperatura` WHERE fecha>='2020-10-01' and fecha <='2020-10-31' and jornada='TARDE') T2 ON T1.fecha = T2.fecha INNER JOIN personas ON T1.personas_id = personas.id ORDER BY `T1`.`fecha` ASC");
        
        $pdf = \PDF::loadView('panel.temperatura.pdf',['temperaturas' => $temperaturas, 'mes' => $id, 'año' => date("Y")]);
        return $pdf->download('temperaturas_'.$id.'.pdf');
    }
}
