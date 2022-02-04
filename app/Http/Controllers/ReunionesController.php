<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Storage;
use App\Reuniones;
use App\ReunionAsistentes;

class ReunionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = DB::table('reuniones')->
                    select('reuniones.*')->
                    get();
        return view('panel.reuniones.index',['reuniones' => $datos,'name' => 'Lista de reuniones ']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.reuniones.create',['name' => 'Crear una reunion ']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reunion = new Reuniones;
        $reunion->tema = $request->get('tema');
        $reunion->fecha = $request->get('fecha');
        $reunion->hora = $request->get('hora');
        $reunion->contenido = $request->get('contenido');
        $reunion->observaciones = $request->get('observaciones');
        $reunion->cedulaInstructor = $request->get('cedulaInstructor');
        $reunion->cargoInstructor = $request->get('cargoInstructor');
        $reunion->cedulaCoordinador = $request->get('cedulaCoordinador');
        $reunion->save();

        $encoded_image = explode(",", $request->get('firmaInstructor1'))[1];
        $decoded_image = base64_decode($encoded_image);
        Storage::disk('reuniones')->put('reunion'.$reunion->id.'FirmaInstructor.png', $decoded_image);

        $reunion->firmaInstructor = 'reunion'.$reunion->id.'FirmaInstructor.png';

        $encoded_image = explode(",", $request->get('firmaCoordinador1'))[1];
        $decoded_image = base64_decode($encoded_image);
        Storage::disk('reuniones')->put('reunion'.$reunion->id.'FirmaCoordinador.png', $decoded_image);

        $reunion->firmaCoordinador = 'reunion'.$reunion->id.'FirmaCoordinador.png';
        
        $reunion->update();

        $nombresAsistentes = $request->get('nombresAsistentes');
        $telefonosAsistentes = $request->get('telefonosAsistentes');
        $cargosAsistentes = $request->get('cargosAsistentes');
        $firmasAsistentes = $request->get('firmasAsistentes');
        if($nombresAsistentes!= ''){
            for($i=0;$i < count($nombresAsistentes);$i++){
                $asistente = new ReunionAsistentes;
                $asistente->nombre = $nombresAsistentes[$i];
                $asistente->telefono = $telefonosAsistentes[$i];
                $asistente->cargo = $cargosAsistentes[$i];
                $asistente->reuniones_id = $reunion->id;
                $asistente->save();
    
                $encoded_image = explode(",", $firmasAsistentes[$i])[1];
                $decoded_image = base64_decode($encoded_image);
                Storage::disk('reuniones')->put('reunion'.$reunion->id.'FirmaAsistente'.$asistente->id.'.png', $decoded_image);
    
                $asistente->firma = 'reunion'.$reunion->id.'FirmaAsistente'.$asistente->id.'.png';
    
                $asistente->update();
            }
        }

        return Redirect::to('reuniones')->withSuccess('Reunion creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reunion = DB::table('reuniones')->
                    select('reuniones.*')->
                    where('id','=',$id)->
                    get();
        $asistentes = DB::table('reunion_asistentes')->
                        select('reunion_asistentes.*')->
                        where('reuniones_id','=',$id)->
                        get();
        return view("panel.reuniones.show",['reunion' => $reunion[0],'asistentes' => $asistentes, 'name' => 'Ver reunion']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reunion = DB::table('reuniones')->
                    select('reuniones.*')->
                    where('id','=',$id)->
                    get();
        $asistentes = DB::table('reunion_asistentes')->
                        select('reunion_asistentes.*')->
                        where('reuniones_id','=',$id)->
                        get();
        return view("panel.reuniones.edit",['reunion' => $reunion[0],'asistentes' => $asistentes, 'name' => 'Editar reunion']);
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
        $reunion = Reuniones::findOrFail($id);
        $reunion->tema = $request->get('tema');
        $reunion->fecha = $request->get('fecha');
        $reunion->hora = $request->get('hora');
        $reunion->contenido = $request->get('contenido');
        $reunion->observaciones = $request->get('observaciones');
        $reunion->cedulaInstructor = $request->get('cedulaInstructor');
        $reunion->cargoInstructor = $request->get('cargoInstructor');
        $reunion->cedulaCoordinador = $request->get('cedulaCoordinador');

        if($request->get('firmaInstructor1')!=''){
            $encoded_image = explode(",", $request->get('firmaInstructor1'))[1];
            $decoded_image = base64_decode($encoded_image);
            Storage::disk('reuniones')->put('reunion'.$reunion->id.'FirmaInstructor.png', $decoded_image);
    
            $reunion->firmaInstructor = 'reunion'.$reunion->id.'FirmaInstructor.png';
        }
        if($request->get('firmaCoordinador1')!=''){
            $encoded_image = explode(",", $request->get('firmaCoordinador1'))[1];
            $decoded_image = base64_decode($encoded_image);
            Storage::disk('reuniones')->put('reunion'.$reunion->id.'FirmaCoordinador.png', $decoded_image);

            $reunion->firmaCoordinador = 'reunion'.$reunion->id.'FirmaCoordinador.png';
        }
        
        $reunion->update();

        //Asistentes viejo para quitar
        $asistentesViejosAux = DB::table('reunion_asistentes')->
                        select('reunion_asistentes.id')->
                        where('reuniones_id','=',$id)->
                        get();
                        
        $idsAsistentes = $request->get('idsAsistentes');

        if($idsAsistentes!=null){
            foreach($asistentesViejosAux as $asistente){
                if(!in_array($asistente->id, $idsAsistentes)){
                    $asistente = ReunionAsistentes::findOrFail($asistente->id);
                    $asistente->delete();
                }
            }
        }else{
            foreach($asistentesViejosAux as $asistente){
                $asistente = ReunionAsistentes::findOrFail($asistente->id);
                $asistente->delete();
            }
        }
        
        //Asistentes nuevos para agregar
        $nombresAsistentes = $request->get('nombresAsistentes');
        $telefonosAsistentes = $request->get('telefonosAsistentes');
        $cargosAsistentes = $request->get('cargosAsistentes');
        $firmasAsistentes = $request->get('firmasAsistentes');
        if($nombresAsistentes!= ''){
            for($i=0;$i < count($nombresAsistentes);$i++){
                $asistente = new ReunionAsistentes;
                $asistente->nombre = $nombresAsistentes[$i];
                $asistente->telefono = $telefonosAsistentes[$i];
                $asistente->cargo = $cargosAsistentes[$i];
                $asistente->reuniones_id = $reunion->id;
                $asistente->save();

                $encoded_image = explode(",", $firmasAsistentes[$i])[1];
                $decoded_image = base64_decode($encoded_image);
                Storage::disk('reuniones')->put('reunion'.$reunion->id.'FirmaAsistente'.$asistente->id.'.png', $decoded_image);

                $asistente->firma = 'reunion'.$reunion->id.'FirmaAsistente'.$asistente->id.'.png';

                $asistente->update();
            }
        }

        return Redirect::to('reuniones')->withSuccess('Reunion editada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reunion = Reuniones::findOrFail($id);
        $reunion->delete();

        return Redirect::to('reuniones')->withSuccess('Reunion eliminada exitosamente');
    }
    public function generatePdf($id){
        $reunion = DB::table('reuniones')->
                    select('reuniones.*')->
                    where('id','=',$id)->
                    get();
        $asistentes = DB::table('reunion_asistentes')->
                        select('reunion_asistentes.*')->
                        where('reuniones_id','=',$id)->
                        get();
        $pdf = \PDF::loadView("panel.reuniones.pdf",['reunion' => $reunion[0],'asistentes' => $asistentes]);
        return $pdf->download('reunion_'.$id.'.pdf');
    }
}
