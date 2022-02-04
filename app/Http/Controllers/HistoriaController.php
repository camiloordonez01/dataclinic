<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Storage;
use App\Personas;
use App\Paciente;
use App\Historias;
use App\Departamentos;
use App\Ciudades;
use App\Direcciones;
use App\Firmas;
use App\Soportes;
use App\Desestimiento;
use App\ProcedimientoHistoria;
use App\Encuesta;
use DB;
use View;
use Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class HistoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $datos = DB::table('historia_clinica')->
                join('pacientes', 'pacientes.id', '=', 'historia_clinica.pacientes_id')->
                join('personas', 'personas.id', '=', 'pacientes.personas_id')->
                select('personas.nombres','personas.apellidos','personas.documento','historia_clinica.id','historia_clinica.fecha','historia_clinica.estado','historia_clinica.encuesta')->
                get();

        $encuestas = DB::table('encuestas')->
                join('historia_clinica', 'historia_clinica.id', '=', 'encuestas.historia_clinica_id')->
                select('encuestas.*')->
                get();
        
        $aux = [];
        foreach($datos as $dato){
            $aux[$dato->id] = '';
        }

        foreach($encuestas as $encuesta){
            $aux[$encuesta->historia_clinica_id] = $encuesta;
        }
        
        return view('panel.historia.index',['historias' => $datos,'encuestas' => $aux,'name' => 'Lista de eventos']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos = DB::table('departamentos')->get();
        $procedimientos = DB::table('procedimientos')->get();
        $persona = Personas::select('nombres','apellidos')->where('usuarios_id','=',Auth::user()->id)->firstOrFail();
        $nombres = $persona->nombres.' '.$persona->apellidos;
        $ultimo_id = DB::table('INFORMATION_SCHEMA.TABLES')->where('table_name','=','historia_clinica')->select('auto_increment as id')->get();
        $tipos = DB::table('tipo_historia')->get();
        return view("panel.historia.create",['tipos' => $tipos,'nombres' => $nombres,'codigo' => $ultimo_id[0]->id,'departamentos' => $datos,'procedimientos' => $procedimientos,'name' => 'Crear un evento',]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $persona;
            if($request->get('paciente_id')==''){
                $persona = new Personas;
            }else{
                $persona = Personas::findOrFail($request->get('persona_id'));
            }
            $persona->nombres=$request->get('nombres');
            $persona->apellidos=$request->get('apellidos');
            $persona->correo=$request->get('correo');
            $persona->tipo_documento=$request->get('tipo_documento');
            $persona->documento=$request->get('documento');
            $persona->fecha_nacimiento=$request->get('fecha_nacimiento');
            $persona->telefono=$request->get('telefono');
            $persona->celular=$request->get('celular');
            $persona->genero=$request->get('genero');
    
            $direccion;
            if($request->get('paciente_id')==''){
                $persona->save();
                $direccion = new Direcciones;
            }else{
                $persona->update();
                $direccion = Direcciones::findOrFail($request->get('direcciones_id'));
            }
            $direccion->direccion = $request->get('direccion');
            $direccion->zona = $request->get('zona');
            $direccion->ciudades_id = $request->get('ciudad');
            $direccion->barrio = $request->get('barrio');
            $direccion->personas_id = $persona->id;
    
            $paciente;
            if($request->get('paciente_id')==''){
                $paciente = new Paciente;
                $direccion->save();
            }else{
                $direccion->update();
                $paciente= Paciente::findOrFail($request->get('paciente_id'));
            }
            $paciente->personas_id = $persona->id;
            if($request->get('paciente_id')==''){
                $paciente->save();
            }else{
                $paciente->update();
            }
            
            $encuesta = '';
            if($request->get('tipo_historia')!=null){
                $encuesta = DB::select('tipo_historia')->where('nombre','=',$request->get('tipo_historia'))->get()[0]->encuesta;
            }
            $historia= new Historias;
            $historia->placa = $request->get('placa');
            $historia->movil = $request->get('movil');
            $historia->horas_espera = $request->get('horas_espera');
            $historia->fecha = $request->get('fecha');
            $historia->motivo = $request->get('motivo');
            $historia->diagnostico = $request->get('diagnostico');
            $historia->observacion = $request->get('observacion');
            $historia->des_entrada_paciente = $request->get('des_entrada_paciente');
            $historia->des_novedad_paciente = $request->get('des_novedad_paciente');
            $historia->triage = $request->get('triage');
            $historia->sv_ta = $request->get('sv_ta');
            $historia->tam = $request->get('tam');
            $historia->tc = $request->get('tc');
            $historia->sapo2 = $request->get('sapo2');
            $historia->fr = $request->get('fr');
            $historia->fc = $request->get('fc');
            $historia->fcf = $request->get('fcf');
            $historia->hora_solicitud = $request->get('hora_solicitud');
            $historia->hora_salida = $request->get('hora_salida');
            $historia->hora_llegada = $request->get('hora_llegada');
            $historia->hora_final = $request->get('hora_final');
            $historia->tipo_traslado = $request->get('tipo_traslado');
            $historia->tipo_recorrido = $request->get('tipo_recorrido');
            $historia->ips_remitente = $request->get('ips_remitente');
            $historia->ips_receptora = $request->get('ips_receptora');
            $historia->ips_contraremision = $request->get('ips_contraremision');
            $historia->medico = $request->get('medico');
            $historia->conductor = $request->get('conductor');
            $historia->tipo_auxiliar = $request->get('tipo_auxiliar');
            $historia->auxiliar = $request->get('auxiliar');
            $historia->edad_paciente = $request->get('edad_paciente').' '.$request->get('tipo_edad');
            $historia->sintomas = $request->get('sintomas');
            $historia->alergias = $request->get('alergias');
            $historia->patologias = $request->get('patologias');
            $historia->medicamentos = $request->get('medicamentos');
            $historia->eventos_previos = $request->get('eventos_previos');
            $historia->ultima_ingesta = $request->get('ultima_ingesta');
            $historia->toxicos = $request->get('toxicos');
            $historia->gineco = $request->get('gineco');
            $historia->quirurgico = $request->get('quirurgico');
            $historia->examen_fisico = $request->get('examen_fisico');
            $historia->tipo_seguridad = $request->get('tipo_seguridad');
            $historia->seguridad = $request->get('seguridad');
            $historia->tipo_historia = $request->get('tipo_historia');
            $historia->encuesta = $encuesta;
            $historia->pacientes_id = $paciente->id;
            $historia->estado = 0;
            $historia->save();
    
            $procedimientos = $request->get('procedimientos');
            if(!($request->get('procedimientos')=='')){
                foreach($procedimientos as $proc){
                    $procedimiento = new ProcedimientoHistoria;
                    $procedimiento->historia_clinica_id = $historia->id;
                    $procedimiento->procedimientos_id = $proc;
                    $procedimiento->save();
                }
            }
            if(!($request->get('firmaPaciente1')=='')){
                $encoded_image = explode(",", $request->get('firmaPaciente1'))[1];
                $decoded_image = base64_decode($encoded_image);
                Storage::disk('firmas')->put('historia'.$historia->id.'Firma1.png', $decoded_image);
    
                $firma1 = new Firmas;
                $firma1->asignacion = 'Firma 1';
                $firma1->urlFirma = 'historia'.$historia->id.'Firma1.png';
                $firma1->historia_clinica_id = $historia->id;
                $firma1->save();
            }
            
            if(!($request->get('firmaPaciente2')=='')){
                $encoded_image2 = explode(",", $request->get('firmaPaciente2'))[1];
                $decoded_image2 = base64_decode($encoded_image2);
                Storage::disk('firmas')->put('historia'.$historia->id.'Firma2.png', $decoded_image2);
    
                $firma2 = new Firmas;
                $firma2->asignacion = 'Firma 2';
                $firma2->urlFirma = 'historia'.$historia->id.'Firma2.png';
                $firma2->historia_clinica_id = $historia->id;
                $firma2->save();
            }
            
            if(!($request->get('firmaPaciente3')=='')){
                $encoded_image3 = explode(",", $request->get('firmaPaciente3'))[1];
                $decoded_image3 = base64_decode($encoded_image3);
                Storage::disk('firmas')->put('historia'.$historia->id.'Firma3.png', $decoded_image3);
    
                $firma3 = new Firmas;
                $firma3->asignacion = 'Firma 3';
                $firma3->urlFirma = 'historia'.$historia->id.'Firma3.png';
                $firma3->historia_clinica_id = $historia->id;
                $firma3->save();
            }
    
            if(!($request->get('firmaPaciente4')=='')){
                $encoded_image4 = explode(",", $request->get('firmaPaciente4'))[1];
                $decoded_image4 = base64_decode($encoded_image4);
                Storage::disk('firmas')->put('historia'.$historia->id.'Firma4.png', $decoded_image4);
    
                $firma4 = new Firmas;
                $firma4->asignacion = 'Firma 4';
                $firma4->urlFirma = 'historia'.$historia->id.'Firma4.png';
                $firma4->historia_clinica_id = $historia->id;
                $firma4->save();
            }
    
            if(!($request->get('atlasPaciente')=='')){
                $encoded_image5 = explode(",", $request->get('atlasPaciente'))[1];
                $decoded_image5 = base64_decode($encoded_image5);
                Storage::disk('firmas')->put('historia'.$historia->id.'Atlas.png', $decoded_image5);
    
                $firma5 = new Firmas;
                $firma5->asignacion = 'Atlas';
                $firma5->urlFirma = 'historia'.$historia->id.'Atlas.png';
                $firma5->historia_clinica_id = $historia->id;
                $firma5->save();
            }
            $files = $request->file('soportes');
            if($request->hasFile('soportes')){
                $infoFile;
                if($request->hasFile('soportes'))
                {   
                    $aux =(int) DB::table('INFORMATION_SCHEMA.TABLES')->where('table_name','=','soportes')->select('auto_increment as id')->get()[0]->id;
                    foreach ($files as $file) {
                        $ext = $file->getClientOriginalExtension();
                        $file->move(public_path("files/soportes/"),'historia'.$historia->id.'Soporte'.$aux.'.'.$ext);
                        $infoFile[] = 'historia'.$historia->id.'Soporte'.$aux.'.'.$ext;
                        $aux = $aux + 1;
                    }
                }
                foreach($infoFile as $name){
                    $soporte = new Soportes;
                    $soporte->url = $name;
                    $soporte->historia_clinica_id = $historia->id;
                    $soporte->save();
                }
            }

            if($request->get('ifDesestimiento')=='on'){
                $desestimiento = new Desestimiento;

                $firma = '';
                if(!($request->get('firmaPacienteDesestimiento')=='')){
                    $encoded_image6 = explode(",", $request->get('firmaPacienteDesestimiento'))[1];
                    $decoded_image6 = base64_decode($encoded_image6);
                    Storage::disk('firmas')->put('historia'.$historia->id.'FirmaDesestimiento.png', $decoded_image6);

                    $firma = 'historia'.$historia->id.'FirmaDesestimiento.png';
                }

                $desestimiento->nombre = $request->get('nombreDesestimiento');
                $desestimiento->cedula = $request->get('cedulaDesestimiento');
                $desestimiento->expedida = $request->get('expedidaDesestimiento');
                $desestimiento->paciente = $request->get('pacienteDesestimiento');
                $desestimiento->parentesco = $request->get('parentescoDesestimiento');
                $desestimiento->causas = $request->get('causasDesestimiento');
                $desestimiento->dia = $request->get('diaDesestimiento');
                $desestimiento->mes = $request->get('mesDesestimiento');
                $desestimiento->año = $request->get('añoDesestimiento');
                $desestimiento->testigo = $request->get('testigoDesestimiento');
                $desestimiento->cedulaTestigo = $request->get('cedulaTestigoDesestimiento');
                $desestimiento->auxiliarAmbulancia = $request->get('auxiliarDesestimiento');
                $desestimiento->cedulaPaciente = $request->get('cedulaFirmaDesestimiento');
                $desestimiento->firmaPaciente = $firma;
                $desestimiento->historia_clinica_id	 = $historia->id;

                $desestimiento->save();
            
            }

            return Redirect::to('historia')->withSuccess('Evento preguardado exitosamente');
        }catch(\Illuminate\Database\QueryException $e){
            return Redirect::back()->withErrors($e->errorInfo[2]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $procedimientos = DB::table('procedimientos')->get();
        $usuario = Personas::select('nombres','apellidos')->where('usuarios_id',Auth::user()->id)->firstOrFail();
        $nombres = $usuario->nombres.' '.$usuario->apellidos;

        $historia = DB::table('historia_clinica')->
                join('pacientes', 'pacientes.id', '=', 'historia_clinica.pacientes_id')->
                join('personas', 'personas.id', '=', 'pacientes.personas_id')->
                select('personas.id as persona_id','pacientes.id as paciente_id','historia_clinica.*')->
                where('historia_clinica.id','=',$id)->
                get();
        $persona = DB::table('personas')->
                join('pacientes', 'personas.id', '=', 'pacientes.personas_id')->
                join('direcciones', 'personas.id', '=', 'direcciones.personas_id')->
                select('personas.*','direcciones.zona','direcciones.barrio', 'direcciones.direccion', 'direcciones.ciudades_id','direcciones.id as direcciones_id','pacientes.id as paciente_id')->
                where('personas.id','=',$historia[0]->persona_id)->
                get();
        $AuxprocedimientosList = DB::table('procedimiento_historia')->
                select('procedimiento_historia.procedimientos_id')->
                where('procedimiento_historia.historia_clinica_id','=',$historia[0]->id)->
                get();
        $procedimientosList = [];
        if(count($AuxprocedimientosList)>0){
            foreach($AuxprocedimientosList as $proc){
                $procedimientosList[] = $proc->procedimientos_id;
            }
        }
        $firmas = [];
        $firmas['firma1']=(object)['id' => '', 'urlFirma' => ''];
        $firmas['firma2']=(object)['id' => '', 'urlFirma' => ''];
        $firmas['firma3']=(object)['id' => '', 'urlFirma' => ''];
        $firmas['firma4']=(object)['id' => '', 'urlFirma' => ''];
        $firmas['atlas']=(object)['id' => '', 'urlFirma' => ''];
        $soportes = DB::table('soportes')->
                where('soportes.historia_clinica_id','=',$historia[0]->id)->
                get(); 
        $aux1 = DB::table('firmas')->
                where('firmas.historia_clinica_id','=',$historia[0]->id)->
                where('firmas.asignacion','=','Firma 1')->
                get();
        if(count($aux1)>0){
            $firmas['firma1'] = $aux1[0];
        }
        $aux2 = DB::table('firmas')->
                where('firmas.historia_clinica_id','=',$historia[0]->id)->
                where('firmas.asignacion','=','Firma 2')->
                get();
        if(count($aux2)>0){
            $firmas['firma2'] = $aux2[0];
        }
        $aux3 = DB::table('firmas')->
                where('firmas.historia_clinica_id','=',$historia[0]->id)->
                where('firmas.asignacion','=','Firma 3')->
                get();
        if(count($aux3)>0){
            $firmas['firma3'] = $aux3[0];
        }
        $aux4 = DB::table('firmas')->
                where('firmas.historia_clinica_id','=',$historia[0]->id)->
                where('firmas.asignacion','=','Firma 4')->
                get();
        if(count($aux4)>0){
            $firmas['firma4'] = $aux4[0];
        }
        $aux5 = DB::table('firmas')->
                where('firmas.historia_clinica_id','=',$historia[0]->id)->
                where('firmas.asignacion','=','Atlas')->
                get();
        if(count($aux5)>0){
            $firmas['atlas'] = $aux5[0];
        }
        $edad = explode(" ",$historia[0]->edad_paciente);

        
        $departamentos = DB::table('departamentos')->get();
        
        if($persona[0]->ciudades_id==null){
            $ciudad = DB::table('ciudades')->where('id' , '=', 1222)->get();
            $ciudades = DB::table('ciudades')->where('departamentos_id' , '=', $ciudad[0]->departamentos_id)->get();
        }else{
            $ciudad = DB::table('ciudades')->where('id' , '=', $persona[0]->ciudades_id)->get();
            $ciudades = DB::table('ciudades')->where('departamentos_id' , '=', $ciudad[0]->departamentos_id)->get();
        }
        $tipos = DB::table('tipo_historia')->get();

        $desestimiento =  DB::table('desestimiento')->
                            where('desestimiento.historia_clinica_id','=',$historia[0]->id)->
                            get(); 
        $ifDesestimiento;
        if(count($desestimiento)==0){
            $aux =(object)[
                'nombre'=> '',
                'cedula'=> '',
                'expedida'=> '',
                'paciente'=> '',
                'parentesco'=> '',
                'causas'=> '',
                'dia'=> '',
                'mes'=> '',
                'año'=> '',
                'testigo'=> '',
                'cedulaTestigo'=> '',
                'auxiliarAmbulancia'=> '',
                'firmaPaciente'=> '',
                'cedulaPaciente'=> '',
                'historia_clinica_id'=> '',
            ];
            $desestimiento[0] = $aux;
            $ifDesestimiento = 0;
        }else{
            $ifDesestimiento = 1;
        }
        return view("panel.historia.show",['desestimiento' => $desestimiento[0],'ifDesestimiento' => $ifDesestimiento,'tipos' => $tipos,'edad' => $edad,'nombres' => $nombres,'codigo' => $historia[0]->id,'ciudad' => $ciudad[0],'ciudades' => $ciudades,'departamentos' => $departamentos,'procedimientos' => $procedimientos,'historia' => $historia[0],'persona' => $persona[0], 'procedimientosList' => $procedimientosList,'soportes' => $soportes,'firmas' => $firmas,'name' => 'Detalle del evento',]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $procedimientos = DB::table('procedimientos')->get();
        $usuario = Personas::select('nombres','apellidos')->where('usuarios_id',Auth::user()->id)->firstOrFail();
        $nombres = $usuario->nombres.' '.$usuario->apellidos;
        
        $historia = DB::table('historia_clinica')->
                join('pacientes', 'pacientes.id', '=', 'historia_clinica.pacientes_id')->
                join('personas', 'personas.id', '=', 'pacientes.personas_id')->
                select('personas.id as persona_id','pacientes.id as paciente_id','historia_clinica.*')->
                where('historia_clinica.id','=',$id)->
                get();
        $persona = DB::table('personas')->
                join('pacientes', 'personas.id', '=', 'pacientes.personas_id')->
                join('direcciones', 'personas.id', '=', 'direcciones.personas_id')->
                select('personas.*','direcciones.zona','direcciones.barrio', 'direcciones.direccion', 'direcciones.ciudades_id','direcciones.id as direcciones_id','pacientes.id as paciente_id')->
                where('personas.id','=',$historia[0]->persona_id)->
                get();
        $AuxprocedimientosList = DB::table('procedimiento_historia')->
                select('procedimiento_historia.procedimientos_id')->
                where('procedimiento_historia.historia_clinica_id','=',$historia[0]->id)->
                get();
        $procedimientosList = [];
        if(count($AuxprocedimientosList)>0){
            foreach($AuxprocedimientosList as $proc){
                $procedimientosList[] = $proc->procedimientos_id;
            }
        }
        
        $firmas = [];
        $firmas['firma1']=(object)['id' => '', 'urlFirma' => ''];
        $firmas['firma2']=(object)['id' => '', 'urlFirma' => ''];
        $firmas['firma3']=(object)['id' => '', 'urlFirma' => ''];
        $firmas['firma4']=(object)['id' => '', 'urlFirma' => ''];
        $firmas['atlas']=(object)['id' => '', 'urlFirma' => ''];
        $soportes = DB::table('soportes')->
                where('soportes.historia_clinica_id','=',$historia[0]->id)->
                get(); 
        $aux1 = DB::table('firmas')->
                where('firmas.historia_clinica_id','=',$historia[0]->id)->
                where('firmas.asignacion','=','Firma 1')->
                get();
        if(count($aux1)>0){
            $firmas['firma1'] = $aux1[0];
        }
        $aux2 = DB::table('firmas')->
                where('firmas.historia_clinica_id','=',$historia[0]->id)->
                where('firmas.asignacion','=','Firma 2')->
                get();
        if(count($aux2)>0){
            $firmas['firma2'] = $aux2[0];
        }
        $aux3 = DB::table('firmas')->
                where('firmas.historia_clinica_id','=',$historia[0]->id)->
                where('firmas.asignacion','=','Firma 3')->
                get();
        if(count($aux3)>0){
            $firmas['firma3'] = $aux3[0];
        }
        $aux4 = DB::table('firmas')->
                where('firmas.historia_clinica_id','=',$historia[0]->id)->
                where('firmas.asignacion','=','Firma 4')->
                get();
        if(count($aux4)>0){
            $firmas['firma4'] = $aux4[0];
        }
        $aux5 = DB::table('firmas')->
                where('firmas.historia_clinica_id','=',$historia[0]->id)->
                where('firmas.asignacion','=','Atlas')->
                get();
        if(count($aux5)>0){
            $firmas['atlas'] = $aux5[0];
        }
        
        $edad = explode(" ",$historia[0]->edad_paciente);
            
        $departamentos = DB::table('departamentos')->get();
        
        if($persona[0]->ciudades_id==null){
            $ciudad = DB::table('ciudades')->where('id' , '=', 1222)->get();
            $ciudades = DB::table('ciudades')->where('departamentos_id' , '=', $ciudad[0]->departamentos_id)->get();
        }else{
            $ciudad = DB::table('ciudades')->where('id' , '=', $persona[0]->ciudades_id)->get();
            $ciudades = DB::table('ciudades')->where('departamentos_id' , '=', $ciudad[0]->departamentos_id)->get();
        }
        $tipos = DB::table('tipo_historia')->get();

        $desestimiento =  DB::table('desestimiento')->
                            where('desestimiento.historia_clinica_id','=',$historia[0]->id)->
                            get(); 
        $ifDesestimiento;
        if(count($desestimiento)==0){
            $aux =(object)[
                'id' => '',
                'nombre'=> '',
                'cedula'=> '',
                'expedida'=> '',
                'paciente'=> '',
                'parentesco'=> '',
                'causas'=> '',
                'dia'=> '',
                'mes'=> '',
                'año'=> '',
                'testigo'=> '',
                'cedulaTestigo'=> '',
                'auxiliarAmbulancia'=> '',
                'firmaPaciente'=> '',
                'cedulaPaciente'=> '',
                'historia_clinica_id'=> '',
            ];
            $desestimiento[0] = $aux;
            $ifDesestimiento = 0;
        }else{
            $ifDesestimiento = 1;
        }
        return view("panel.historia.edit",['desestimiento' => $desestimiento[0],'ifDesestimiento' => $ifDesestimiento,'tipos' => $tipos,'edad' => $edad,'nombres' => $nombres,'codigo' => $historia[0]->id,'ciudad' => $ciudad[0],'ciudades' => $ciudades,'departamentos' => $departamentos,'procedimientos' => $procedimientos,'historia' => $historia[0],'persona' => $persona[0], 'procedimientosList' => $procedimientosList,'soportes' => $soportes,'firmas' => $firmas,'name' => 'Terminar evento',]);
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
        try{
            $persona;
            $direccion;
            $paciente;
            $personaAux = Personas::findOrFail($request->get('persona_id'));
            if($personaAux->documento==$request->get('documento')){
                $persona = Personas::findOrFail($request->get('persona_id'));
                $persona->nombres=$request->get('nombres');
                $persona->apellidos=$request->get('apellidos');
                $persona->correo=$request->get('correo');
                $persona->tipo_documento=$request->get('tipo_documento');
                $persona->fecha_nacimiento=$request->get('fecha_nacimiento');
                $persona->telefono=$request->get('telefono');
                $persona->celular=$request->get('celular');
                $persona->genero=$request->get('genero');
                $persona->update();
                
                $direccion = Direcciones::findOrFail($request->get('direcciones_id'));
                $direccion->direccion = $request->get('direccion');
                $direccion->zona = $request->get('zona');
                $direccion->ciudades_id = $request->get('ciudad');
                $direccion->barrio = $request->get('barrio');
                $direccion->personas_id = $persona->id;
                $direccion->update();
                
                $paciente= Paciente::findOrFail($request->get('paciente_id'));
                $paciente->personas_id = $persona->id;
                $paciente->update();
            }else{
                $persona = new Personas;
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
            }

            
            $encuesta = '';
            if($request->get('tipo_historia')!=null){
                $encuesta = DB::select('tipo_historia')->where('nombre','=',$request->get('tipo_historia'))->get()[0]->encuesta;
            }
            
            
            $historia= Historias::findOrFail($id);
            $historia->placa = $request->get('placa');
            $historia->movil = $request->get('movil');
            $historia->horas_espera = $request->get('horas_espera');
            $historia->fecha = $request->get('fecha');
            $historia->motivo = $request->get('motivo');
            $historia->diagnostico = $request->get('diagnostico');
            $historia->observacion = $request->get('observacion');
            $historia->des_entrada_paciente = $request->get('des_entrada_paciente');
            $historia->des_novedad_paciente = $request->get('des_novedad_paciente');
            $historia->triage = $request->get('triage');
            $historia->sv_ta = $request->get('sv_ta');
            $historia->tam = $request->get('tam');
            $historia->tc = $request->get('tc');
            $historia->sapo2 = $request->get('sapo2');
            $historia->fr = $request->get('fr');
            $historia->fc = $request->get('fc');
            $historia->fcf = $request->get('fcf');
            $historia->hora_solicitud = $request->get('hora_solicitud');
            $historia->hora_salida = $request->get('hora_salida');
            $historia->hora_llegada = $request->get('hora_llegada');
            $historia->hora_final = $request->get('hora_final');
            $historia->tipo_traslado = $request->get('tipo_traslado');
            $historia->tipo_recorrido = $request->get('tipo_recorrido');
            $historia->ips_remitente = $request->get('ips_remitente');
            $historia->ips_receptora = $request->get('ips_receptora');
            $historia->ips_contraremision = $request->get('ips_contraremision');
            $historia->medico = $request->get('medico');
            $historia->conductor = $request->get('conductor');
            $historia->tipo_auxiliar = $request->get('tipo_auxiliar');
            $historia->auxiliar = $request->get('auxiliar');
            $historia->edad_paciente = $request->get('edad_paciente').' '.$request->get('tipo_edad');
            $historia->sintomas = $request->get('sintomas');
            $historia->alergias = $request->get('alergias');
            $historia->patologias = $request->get('patologias');
            $historia->medicamentos = $request->get('medicamentos');
            $historia->eventos_previos = $request->get('eventos_previos');
            $historia->ultima_ingesta = $request->get('ultima_ingesta');
            $historia->toxicos = $request->get('toxicos');
            $historia->gineco = $request->get('gineco');
            $historia->quirurgico = $request->get('quirurgico');
            $historia->examen_fisico = $request->get('examen_fisico');
            $historia->tipo_seguridad = $request->get('tipo_seguridad');
            $historia->seguridad = $request->get('seguridad');
            $historia->tipo_historia = $request->get('tipo_historia');
            $historia->encuesta = $encuesta;
            $historia->pacientes_id = $paciente->id;
            $historia->estado = 0;
            $historia->update();
    
            $procedimientos = $request->get('procedimientos');
            $procConsulta = $request->get('procConsulta');
            if($procedimientos==null){
                $proc = DB::table('procedimiento_historia')->
                            where('procedimiento_historia.historia_clinica_id','=',$historia->id)->get();
                foreach($proc as $aux){
                    $procedimientoAux =ProcedimientoHistoria::findOrFail($aux->id);
                    $procedimientoAux->delete();
                }
            }else{
                if($procConsulta==''){
                    foreach($procedimientos as $proc){
                        $procedimiento = new ProcedimientoHistoria;
                        $procedimiento->historia_clinica_id = $historia->id;
                        $procedimiento->procedimientos_id = $proc;
                        $procedimiento->save();
                    }
                }else{
                    if(!($procConsulta==$procedimientos)){
                        $eliminar = array_diff($procConsulta, $procedimientos);
                        $agregar = array_diff($procedimientos, $procConsulta);
                        foreach($eliminar as $proc){
                            $aux = DB::table('procedimiento_historia')->
                                where('procedimiento_historia.historia_clinica_id','=',$historia->id)->
                                where('procedimiento_historia.procedimientos_id','=',$proc)->get();
                            
                                $procedimientoAux =ProcedimientoHistoria::findOrFail($aux[0]->id);
                                $procedimientoAux->delete();
                        }
                        foreach($agregar as $proc){
                            $procedimiento = new ProcedimientoHistoria;
                            $procedimiento->historia_clinica_id = $historia->id;
                            $procedimiento->procedimientos_id = $proc;
                            $procedimiento->save();
                        }
                    }
                }
            }
    
            if(!($request->get('firmaPaciente1')=='')){
                $encoded_image = explode(",", $request->get('firmaPaciente1'))[1];
                $decoded_image = base64_decode($encoded_image);
                Storage::disk('firmas')->put('historia'.$historia->id.'Firma1.png', $decoded_image);
    
                $aux = DB::table('firmas')->
                            where('firmas.historia_clinica_id','=',$historia->id)->
                            where('firmas.asignacion','=','Firma 1')->get();
    
                if(count($aux)>0){
                    $firma1 = Firmas::findOrFail($aux[0]->id);
                    $firma1->asignacion = 'Firma 1';
                    $firma1->urlFirma = 'historia'.$historia->id.'Firma1.png';
                    $firma1->historia_clinica_id = $historia->id;
                    $firma1->save();
                }else{
                    $firma1 = new Firmas;
                    $firma1->asignacion = 'Firma 1';
                    $firma1->urlFirma = 'historia'.$historia->id.'Firma1.png';
                    $firma1->historia_clinica_id = $historia->id;
                    $firma1->save();
                }
            }
            
            if(!($request->get('firmaPaciente2')=='')){
                $encoded_image2 = explode(",", $request->get('firmaPaciente2'))[1];
                $decoded_image2 = base64_decode($encoded_image2);
                Storage::disk('firmas')->put('historia'.$historia->id.'Firma2.png', $decoded_image2);
    
                $aux = DB::table('firmas')->
                            where('firmas.historia_clinica_id','=',$historia->id)->
                            where('firmas.asignacion','=','Firma 2')->get();
    
                if(count($aux)>0){
                    $firma2 = Firmas::findOrFail($aux[0]->id);
                    $firma2->asignacion = 'Firma 2';
                    $firma2->urlFirma = 'historia'.$historia->id.'Firma2.png';
                    $firma2->historia_clinica_id = $historia->id;
                    $firma2->save();
                }else{
                    $firma2 = new Firmas;
                    $firma2->asignacion = 'Firma 2';
                    $firma2->urlFirma = 'historia'.$historia->id.'Firma2.png';
                    $firma2->historia_clinica_id = $historia->id;
                    $firma2->save();
                }
            }
            
            if(!($request->get('firmaPaciente3')=='')){
                $encoded_image3 = explode(",", $request->get('firmaPaciente3'))[1];
                $decoded_image3 = base64_decode($encoded_image3);
                Storage::disk('firmas')->put('historia'.$historia->id.'Firma3.png', $decoded_image3);
    
                $aux = DB::table('firmas')->
                            where('firmas.historia_clinica_id','=',$historia->id)->
                            where('firmas.asignacion','=','Firma 3')->get();
    
                if(count($aux)>0){
                    $firma3 = Firmas::findOrFail($aux[0]->id);
                    $firma3->asignacion = 'Firma 3';
                    $firma3->urlFirma = 'historia'.$historia->id.'Firma3.png';
                    $firma3->historia_clinica_id = $historia->id;
                    $firma3->save();
                }else{
                    $firma3 = new Firmas;
                    $firma3->asignacion = 'Firma 3';
                    $firma3->urlFirma = 'historia'.$historia->id.'Firma3.png';
                    $firma3->historia_clinica_id = $historia->id;
                    $firma3->save();
                }
            }
    
            if(!($request->get('firmaPaciente4')=='')){
                $encoded_image4 = explode(",", $request->get('firmaPaciente4'))[1];
                $decoded_image4 = base64_decode($encoded_image4);
                Storage::disk('firmas')->put('historia'.$historia->id.'Firma4.png', $decoded_image4);
    
                $aux = DB::table('firmas')->
                            where('firmas.historia_clinica_id','=',$historia->id)->
                            where('firmas.asignacion','=','Firma 4')->get();
    
                if(count($aux)>0){
                    $firma4 = Firmas::findOrFail($aux[0]->id);
                    $firma4->asignacion = 'Firma 4';
                    $firma4->urlFirma = 'historia'.$historia->id.'Firma4.png';
                    $firma4->historia_clinica_id = $historia->id;
                    $firma4->save();
                }else{
                    $firma4 = new Firmas;
                    $firma4->asignacion = 'Firma 4';
                    $firma4->urlFirma = 'historia'.$historia->id.'Firma4.png';
                    $firma4->historia_clinica_id = $historia->id;
                    $firma4->save();
                }
            }
    
            if(!($request->get('atlasPaciente')=='')){
                $encoded_image5 = explode(",", $request->get('atlasPaciente'))[1];
                $decoded_image5 = base64_decode($encoded_image5);
                Storage::disk('firmas')->put('historia'.$historia->id.'Atlas.png', $decoded_image5);
    
                $aux = DB::table('firmas')->
                            where('firmas.historia_clinica_id','=',$historia->id)->
                            where('firmas.asignacion','=','Atlas')->get();
    
                if(count($aux)>0){
                    $firma5 = Firmas::findOrFail($aux[0]->id);
                    $firma5->asignacion = 'Atlas';
                    $firma5->urlFirma = 'historia'.$historia->id.'Atlas.png';
                    $firma5->historia_clinica_id = $historia->id;
                    $firma5->save();
                }else{
                    $firma5 = new Firmas;
                    $firma5->asignacion = 'Atlas';
                    $firma5->urlFirma = 'historia'.$historia->id.'Atlas.png';
                    $firma5->historia_clinica_id = $historia->id;
                    $firma5->save();
                }
            }
            
            $files = $request->file('soportes');
            if($request->hasFile('soportes')){
                $infoFile;
                if($request->hasFile('soportes'))
                {   
                    $aux = $aux =(int) DB::table('INFORMATION_SCHEMA.TABLES')->where('table_name','=','soportes')->select('auto_increment as id')->get()[0]->id;
                    foreach ($files as $file) {
                        $ext = $file->getClientOriginalExtension();
                        $file->move(public_path("files/soportes/"),'historia'.$historia->id.'Soporte'.$aux.'.'.$ext);
                        $infoFile[] = 'historia'.$historia->id.'Soporte'.$aux.'.'.$ext;
                        $aux = $aux + 1;
                    }
                }
                foreach($infoFile as $name){
                    $soporte = new Soportes;
                    $soporte->url = $name;
                    $soporte->historia_clinica_id = $historia->id;
                    $soporte->save();
                }
            }
            
            
            if(!($request->get('deleteSoporte')==null)){
                $deleteSoporte = $request->get('deleteSoporte');
                foreach($deleteSoporte as $id){
                    $soporte =Soportes::findOrFail($id);
                    $soporte->delete();
                }
            }
            
            if($request->get('ifDesestimiento')=='on'){
                $desestimiento;
                $firma;
                if($request->get('DesestimientoId')!=''){
                    $desestimiento = Desestimiento::findOrFail($request->get('DesestimientoId'));
                    $firma = $request->get('firmaPacienteDesestimientoId');
                }else{
                    $desestimiento = new Desestimiento;
                    $firma = '';
                }
                
                
                if(!($request->get('firmaPacienteDesestimiento')=='')){
                    $encoded_image6 = explode(",", $request->get('firmaPacienteDesestimiento'))[1];
                    $decoded_image6 = base64_decode($encoded_image6);
                    Storage::disk('firmas')->put('historia'.$historia->id.'FirmaDesestimiento.png', $decoded_image6);

                    $firma = 'historia'.$historia->id.'FirmaDesestimiento.png';
                }
                $desestimiento->nombre = $request->get('nombreDesestimiento');
                $desestimiento->cedula = $request->get('cedulaDesestimiento');
                $desestimiento->expedida = $request->get('expedidaDesestimiento');
                $desestimiento->paciente = $request->get('pacienteDesestimiento');
                $desestimiento->parentesco = $request->get('parentescoDesestimiento');
                $desestimiento->causas = $request->get('causasDesestimiento');
                $desestimiento->dia = $request->get('diaDesestimiento');
                $desestimiento->mes = $request->get('mesDesestimiento');
                $desestimiento->año = $request->get('añoDesestimiento');
                $desestimiento->testigo = $request->get('testigoDesestimiento');
                $desestimiento->cedulaTestigo = $request->get('cedulaTestigoDesestimiento');
                $desestimiento->auxiliarAmbulancia = $request->get('auxiliarDesestimiento');
                $desestimiento->cedulaPaciente = $request->get('cedulaFirmaDesestimiento');
                $desestimiento->firmaPaciente = $firma;
                $desestimiento->historia_clinica_id	 = $historia->id;

                if($request->get('DesestimientoId')!=''){
                    $desestimiento->update();
                }else{
                    $desestimiento->save();
                }
            
            }else{
                $desestimiento = Desestimiento::findOrFail($request->get('DesestimientoId'));
                $desestimiento->delete();
            }

            return Redirect::to('historia')->withSuccess('Evento Guardado y finalizado exitosamente');
        }catch(\Illuminate\Database\QueryException $e){
            return Redirect::back()->withErrors($e->errorInfo[2]);
        }
    }
    public function close($id) {
        $historia= Historias::findOrFail($id);
        $historia->estado = 1;
        $historia->update();

        return Redirect::to('historia')->withSuccess('Historia cerrada exitosamente');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function getPaciente(Request $request){
        $datos = DB::table('personas')->
                join('pacientes', 'personas.id', '=', 'pacientes.personas_id')->
                join('direcciones', 'personas.id', '=', 'direcciones.personas_id')->
                select('personas.*','direcciones.zona','direcciones.barrio', 'direcciones.direccion', 'direcciones.ciudades_id','direcciones.id as direcciones_id','pacientes.id as paciente_id')->
                where('personas.documento','=',$request->get('documento'))->
                get();
        if(count($datos)>0){
            $cod_departamento = DB::table('ciudades')->select('ciudades.departamentos_id')->where('id' , '=', $datos[0]->ciudades_id)->get();
            $ciudades = DB::table('ciudades')->where('departamentos_id' , '=', $cod_departamento[0]->departamentos_id)->get();
            return ['persona' => $datos[0],'ciudades' => $ciudades, 'cod_departamento' => $cod_departamento[0]->departamentos_id];
        }else{
            return false;
        }
    }

    public function download($file) {
        return response()->download(public_path('files/soportes/'.$file));
    }
    public function downloadPdf($id) {
        $procedimientos = DB::table('procedimientos')->get();
        $usuario = Personas::select('nombres','apellidos')->where('usuarios_id',Auth::user()->id)->firstOrFail();
        $nombres = $usuario->nombres.' '.$usuario->apellidos;

        $historia = DB::table('historia_clinica')->
                join('pacientes', 'pacientes.id', '=', 'historia_clinica.pacientes_id')->
                join('personas', 'personas.id', '=', 'pacientes.personas_id')->
                select('personas.id as persona_id','pacientes.id as paciente_id','historia_clinica.*')->
                where('historia_clinica.id','=',$id)->
                get();
        $persona = DB::table('personas')->
                join('pacientes', 'personas.id', '=', 'pacientes.personas_id')->
                join('direcciones', 'personas.id', '=', 'direcciones.personas_id')->
                select('personas.*','direcciones.zona','direcciones.barrio', 'direcciones.direccion', 'direcciones.ciudades_id','direcciones.id as direcciones_id','pacientes.id as paciente_id')->
                where('personas.id','=',$historia[0]->persona_id)->
                get();
        $AuxprocedimientosList = DB::table('procedimiento_historia')->
                select('procedimiento_historia.procedimientos_id')->
                where('procedimiento_historia.historia_clinica_id','=',$historia[0]->id)->
                get();
        $procedimientosList = [];
        if(count($AuxprocedimientosList)>0){
            foreach($AuxprocedimientosList as $proc){
                $procedimientosList[] = $proc->procedimientos_id;
            }
        }
        $firmas = [];
        $firmas['firma1']=(object)['id' => '', 'urlFirma' => ''];
        $firmas['firma2']=(object)['id' => '', 'urlFirma' => ''];
        $firmas['firma3']=(object)['id' => '', 'urlFirma' => ''];
        $firmas['firma4']=(object)['id' => '', 'urlFirma' => ''];
        $firmas['atlas']=(object)['id' => '', 'urlFirma' => ''];
        $soportes = DB::table('soportes')->
                where('soportes.historia_clinica_id','=',$historia[0]->id)->
                get(); 
        $aux1 = DB::table('firmas')->
                where('firmas.historia_clinica_id','=',$historia[0]->id)->
                where('firmas.asignacion','=','Firma 1')->
                get();
        if(count($aux1)>0){
            $firmas['firma1'] = $aux1[0];
        }
        $aux2 = DB::table('firmas')->
                where('firmas.historia_clinica_id','=',$historia[0]->id)->
                where('firmas.asignacion','=','Firma 2')->
                get();
        if(count($aux2)>0){
            $firmas['firma2'] = $aux2[0];
        }
        $aux3 = DB::table('firmas')->
                where('firmas.historia_clinica_id','=',$historia[0]->id)->
                where('firmas.asignacion','=','Firma 3')->
                get();
        if(count($aux3)>0){
            $firmas['firma3'] = $aux3[0];
        }
        $aux4 = DB::table('firmas')->
                where('firmas.historia_clinica_id','=',$historia[0]->id)->
                where('firmas.asignacion','=','Firma 4')->
                get();
        if(count($aux4)>0){
            $firmas['firma4'] = $aux4[0];
        }
        $aux5 = DB::table('firmas')->
                where('firmas.historia_clinica_id','=',$historia[0]->id)->
                where('firmas.asignacion','=','Atlas')->
                get();
        if(count($aux5)>0){
            $firmas['atlas'] = $aux5[0];
        }
        $edad = explode(" ",$historia[0]->edad_paciente);

        
        $ciudad = DB::table('ciudades')->where('id' , '=', $persona[0]->ciudades_id)->get();
        $departamento = DB::table('departamentos')->where('codigo' , '=', $ciudad[0]->departamentos_id)->get();
     
        $pdf = \PDF::loadView('panel.historia.reporte',['fecha' => explode("-",$historia[0]->fecha),'edad' => $edad,'nombres' => $nombres,'codigo' => $historia[0]->id,'ciudad' => $ciudad[0],'departamento' => $departamento[0],'procedimientos' => $procedimientos,'historia' => $historia[0],'persona' => $persona[0], 'procedimientosList' => $procedimientosList,'soportes' => $soportes,'firmas' => $firmas]);
     
        return $pdf->download('archivo.pdf');
    }
    public function reporteGenerate(Request $request){
        $fecha_inicio = $request->get('fechaInicial');
        $fecha_final = $request->get('fechaFinal');
        $datos = DB::select("SELECT historia_clinica.fecha, historia_clinica.hora_solicitud, historia_clinica.movil, personas.nombres, personas.apellidos, personas.tipo_documento, personas.documento, historia_clinica.seguridad, historia_clinica.ips_remitente, historia_clinica.ips_receptora, historia_clinica.conductor, historia_clinica.auxiliar, historia_clinica.tipo_traslado, historia_clinica.tipo_recorrido FROM `historia_clinica` INNER JOIN pacientes ON pacientes.id=historia_clinica.pacientes_id INNER JOIN personas ON personas.id=pacientes.personas_id WHERE historia_clinica.fecha >= '".$fecha_inicio."' AND historia_clinica.fecha<='".$fecha_final."'");
        
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");

        $spreadsheet = $reader->load(env('PATH_FILE_REPORT_PUBLIC').'ReporteAux.xlsx');

        for($i=0;$i < count($datos);$i++){
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A'.(7+$i), $datos[$i]->fecha);
            $sheet->setCellValue('B'.(7+$i), $datos[$i]->hora_solicitud);
            $sheet->setCellValue('C'.(7+$i), $datos[$i]->movil);
            $sheet->setCellValue('D'.(7+$i), $datos[$i]->nombres." ".$datos[$i]->apellidos);
            $sheet->setCellValue('E'.(7+$i), $datos[$i]->tipo_documento);
            $sheet->setCellValue('F'.(7+$i), $datos[$i]->documento);
            $sheet->setCellValue('G'.(7+$i), $datos[$i]->seguridad);
            $sheet->setCellValue('H'.(7+$i), $datos[$i]->ips_remitente);
            $sheet->setCellValue('I'.(7+$i), $datos[$i]->ips_receptora);
            $sheet->setCellValue('J'.(7+$i), $datos[$i]->conductor);
            $sheet->setCellValue('K'.(7+$i), $datos[$i]->auxiliar);
            $sheet->setCellValue('L'.(7+$i), $datos[$i]->tipo_traslado." ".$datos[$i]->tipo_recorrido);

            $sheet->getStyle('A'.(7+$i))->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('A'.(7+$i))->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('A'.(7+$i))->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('A'.(7+$i))->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $sheet->getStyle('B'.(7+$i))->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('B'.(7+$i))->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('B'.(7+$i))->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('B'.(7+$i))->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $sheet->getStyle('C'.(7+$i))->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('C'.(7+$i))->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('C'.(7+$i))->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('C'.(7+$i))->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $sheet->getStyle('D'.(7+$i))->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('D'.(7+$i))->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('D'.(7+$i))->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('D'.(7+$i))->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $sheet->getStyle('E'.(7+$i))->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('E'.(7+$i))->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('E'.(7+$i))->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('E'.(7+$i))->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $sheet->getStyle('F'.(7+$i))->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('F'.(7+$i))->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('F'.(7+$i))->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('F'.(7+$i))->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $sheet->getStyle('G'.(7+$i))->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('G'.(7+$i))->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('G'.(7+$i))->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('G'.(7+$i))->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $sheet->getStyle('H'.(7+$i))->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('H'.(7+$i))->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('H'.(7+$i))->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('H'.(7+$i))->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $sheet->getStyle('I'.(7+$i))->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('I'.(7+$i))->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('I'.(7+$i))->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('I'.(7+$i))->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $sheet->getStyle('J'.(7+$i))->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('J'.(7+$i))->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('J'.(7+$i))->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('J'.(7+$i))->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $sheet->getStyle('K'.(7+$i))->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('K'.(7+$i))->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('K'.(7+$i))->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('K'.(7+$i))->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $sheet->getStyle('L'.(7+$i))->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('L'.(7+$i))->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('L'.(7+$i))->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('L'.(7+$i))->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        }
        $sheet->setCellValue('E5', date('yy-m-d h:i:s A'));
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
        $writer->save(public_path('files\reporte\Reporte.xlsx'));
        
        return response()->download(env('PATH_FILE_REPORT_PUBLIC').'Reporte.xlsx','Reporte.xlsx');
    }
    public function reporte(){
        return view('panel.historia.report',['name' => 'Generar reporte']);
    }

    public function downloadDesestimiento($id){
        $desestimiento =  DB::table('desestimiento')->
                            where('desestimiento.historia_clinica_id','=',$id)->
                            get(); 

        $pdf = \PDF::loadView('panel.historia.desestimiento', ['desestimiento' => $desestimiento[0], 'historia' => $id]);
     
        return $pdf->download('desestimiento'.$id.'.pdf');
        //return view('panel.historia.desestimiento', ['desestimiento' => $desestimiento[0], 'historia' => $id]);
    }
    public function encuesta(Request $request){
        if($request->get('encuesta_id')!=''){
            $encuesta = Encuesta::findOrFail($request->get('encuesta_id'));
        }else{
            $encuesta = new Encuesta;
        }
        $encuesta->trato = $request->get('trato');
        $encuesta->velocidad = $request->get('velocidad');
        $encuesta->comodidad = $request->get('comodidad');
        $encuesta->calificacion = $request->get('calificacion');
        $encuesta->recomendacion = $request->get('recomendacion');
        $encuesta->sugerencias = $request->get('sugerencias');
        $encuesta->nombre = $request->get('nombre');
        $encuesta->telefono = $request->get('telefono');
        $encuesta->cedula = $request->get('cedula');
        $encuesta->historia_clinica_id = $request->get('historia_id');
        if($request->get('encuesta_id')!=''){
            $encuesta->update();
            return Redirect::to('historia')->withSuccess('Encuesta actualizada');
        }else{
            $encuesta->save();
            return Redirect::to('historia')->withSuccess('Encuesta creada');
        }

        
    }
    public function encuestaPdf($id){
        $encuesta = DB::table('encuestas')->
                where('encuestas.historia_clinica_id','=',$id)->
                select('encuestas.*')->
                get();
        
        $pdf = \PDF::loadView('panel.historia.encuesta', ['encuesta' => $encuesta[0]]);
     
        return $pdf->download('encuesta'.$id.'.pdf');
        //return view('panel.historia.encuesta', ['encuesta' => $encuesta[0]]);
    }

}
