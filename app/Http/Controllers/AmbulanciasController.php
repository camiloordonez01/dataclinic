<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Storage;
use App\Ambulancias;
use App\AmbulanciasDocumentos;

class AmbulanciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = DB::table('ambulancias')->
                    select('ambulancias.*')->
                    get();
        return view('panel.ambulancia.index', ['datos' => $datos,'name' => 'Lista las ambulancias']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('panel.ambulancia.create',['name' => 'Crear una ambulancia']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('foto');
        
        $aux = (int) DB::table('INFORMATION_SCHEMA.TABLES')->where('table_name','=','ambulancias')->select('auto_increment as id')->get()[0]->id;
        $ext = $file->getClientOriginalExtension();
        $file->move(public_path("files/ambulancias/"),'ambulancia_'.$aux.'.'.$ext);
        $infoFile = 'ambulancia_'.$aux.'.'.$ext;

        $ambulancia = new Ambulancias;
        $ambulancia->nombre = $request->get('nombre');
        $ambulancia->placa = $request->get('placa');
        $ambulancia->movil = $request->get('movil');
        $ambulancia->marca = $request->get('marca');
        $ambulancia->modelo = $request->get('modelo');
        $ambulancia->tipo_carroceria = $request->get('tipo_carroceria');
        $ambulancia->linea = $request->get('linea');
        $ambulancia->realizado = $request->get('realizado');
        $ambulancia->revisado = $request->get('revisado');
        $ambulancia->aprovado = $request->get('aprovado');
        $ambulancia->fechaActualizacion = $request->get('fechaActualizacion');
        $ambulancia->foto = $infoFile;
        $ambulancia->save();

        $files = $request->file('documentos');
        if($request->hasFile('documentos')){
            $infoFile = [];
            if($request->hasFile('documentos'))
            {   
                $aux =(int) DB::table('INFORMATION_SCHEMA.TABLES')->where('table_name','=','ambulancias_documentos')->select('auto_increment as id')->get()[0]->id;
                foreach ($files as $file) {
                    $ext = $file->getClientOriginalExtension();
                    $file->move(public_path("files/autos/"),'ambulancia'.$ambulancia->id.'Documento'.$aux.'.'.$ext);
                    array_push($infoFile, 'ambulancia'.$ambulancia->id.'Documento'.$aux.'.'.$ext);
                    $aux = $aux + 1;
                }
            }
            foreach($infoFile as $name){
                $documento = new AmbulanciasDocumentos;
                $documento->url = $name;
                $documento->ambulancias_id = $ambulancia->id;
                $documento->save();
            }
        }

        return Redirect::to('ambulancias')->withSuccess('Ambulancia creada exitosamente');
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
        $ambulancia = DB::table('ambulancias')->
                    select('ambulancias.*')->
                    where('id','=',$id)->
                    get();
        
        $documentos = DB::table('ambulancias_documentos')->
                    where('ambulancias_documentos.ambulancias_id','=',$ambulancia[0]->id)->
                    get();
        return view("panel.ambulancia.edit",['ambulancia' => $ambulancia[0],'documentos' => $documentos ,'name' => 'Editar ambulancia']);
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
        $ambulancia = Ambulancias::findOrFail($id);
        $file = $request->file('foto');
        
        $infoFile = '';
        if($request->hasFile('foto')){
            $ext = $file->getClientOriginalExtension();
            $file->move(public_path("files/ambulancias/"),'ambulancia_'.$ambulancia->id.'.'.$ext);
            $infoFile = 'ambulancia_'.$ambulancia->id.'.'.$ext;
        }

        $ambulancia = Ambulancias::findOrFail($id);
        $ambulancia->nombre = $request->get('nombre');
        $ambulancia->placa = $request->get('placa');
        $ambulancia->movil = $request->get('movil');
        $ambulancia->marca = $request->get('marca');
        $ambulancia->modelo = $request->get('modelo');
        $ambulancia->tipo_carroceria = $request->get('tipo_carroceria');
        $ambulancia->linea = $request->get('linea');
        $ambulancia->realizado = $request->get('realizado');
        $ambulancia->revisado = $request->get('revisado');
        $ambulancia->aprovado = $request->get('aprovado');
        $ambulancia->fechaActualizacion = $request->get('fechaActualizacion');
        if($infoFile!=''){
            $ambulancia->foto = $infoFile;
        }
        $ambulancia->update();

        $files = $request->file('documentos');
        if($request->hasFile('documentos')){
            $infoFile = [];
            if($request->hasFile('documentos'))
            {   
                $aux =(int) DB::table('INFORMATION_SCHEMA.TABLES')->where('table_name','=','ambulancias_documentos')->select('auto_increment as id')->get()[0]->id;
                foreach ($files as $file) {
                    $ext = $file->getClientOriginalExtension();
                    $file->move(public_path("files/autos/"),'ambulancia'.$ambulancia->id.'Documento'.$aux.'.'.$ext);
                    array_push($infoFile, 'ambulancia'.$ambulancia->id.'Documento'.$aux.'.'.$ext);
                    $aux = $aux + 1;
                }
            }
            foreach($infoFile as $name){
                $documento = new AmbulanciasDocumentos;
                $documento->url = $name;
                $documento->ambulancias_id = $ambulancia->id;
                $documento->save();
            }
        }
            
            
        if(!($request->get('deleteSoporte')==null)){
            $deleteSoporte = $request->get('deleteSoporte');
            foreach($deleteSoporte as $id){
                $documento =AmbulanciasDocumentos::findOrFail($id);
                $documento->delete();
            }
        }

        return Redirect::to('ambulancias')->withSuccess('Ambulancia editada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ambulancia = Ambulancias::findOrFail($id);
        $ambulancia->delete();

        return Redirect::to('ambulancias')->withSuccess('Ambulancia eliminada exitosamente');
    }

    public function generatePdf($id){
        $ambulancia = DB::table('ambulancias')->
        select('ambulancias.*')->
        where('id','=',$id)->
        get();
        

        $pdf = \PDF::loadView('panel.ambulancia.pdf', ['ambulancia' => $ambulancia[0]]);
        return $pdf->download('ambulancia_'.$id.'.pdf');
    }
}
