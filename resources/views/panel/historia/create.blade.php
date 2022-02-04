@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-principal">
                @if (count($errors) > 0)
                    <div class="card bg-danger">
                        <div class="card-header">
                            <h3 class="card-title">Corrige los siguientes errores:</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul>
                                @foreach ($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                @if (session('success'))
                    <div class="card bg-success">
                        <div class="card-header">
                            <h3 class="card-title">Proceso exitoso:</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            {{session('success')}}
                        </div>
                    </div>
                @endif
                {!!Form::open(array('url'=> 'historia/store','method'=>'POST','autocomplete'=>'off','id' => 'createHistoria','enctype'=>'multipart/form-data', 'multiple' => 'multiple'))!!}
                {{Form::token()}}
                <div class="card-body">
                    <div class="header-evento">
                        <div class="header-img">
                            <img src="{{ asset('images/central.jpeg') }}" alt="">
                        </div>
                        <div  class="header-title">
                            <label>Generado por: {{$nombres}}</label>
                            <h1>N° {{$codigo}}</h1>
                        </div>
                    </div>
                        <h3 class="text-center">Datos iniciales</h3>
                        <div class="row p-3 shadow rounded">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha">Fecha</label>
                                    <input type="date" name="fecha" class="form-control" id="fecha">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipoHistoria">Tipo de servicio</label>
                                    <select name="tipo_historia" class="form-control">
                                        <option value="" selected disabled>Seleccionar tipo</option>
                                        @foreach($tipos as $tipo)
                                        <option value="{{$tipo->nombre}}">{{$tipo->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="movil">Movil</label>
                                    <input type="text" name="movil" class="form-control" placeholder="Numero del movil">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="placa">Placa</label>
                                    <input type="text" name="placa" class="form-control" placeholder="Placa del automovil">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="horas_espera">Horas de espera</label>
                                    <input type="text" name="horas_espera" class="form-control" placeholder="Numero de horas">
                                </div>
                            </div>
                        </div>
                        <hr class="mt-5">
                        <h3 class="text-center">Datos generales</h3>
                        <h4>Tripulantes</h4>
                        <div class="row p-3 shadow rounded">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="medico">Medico</label>
                                    <input type="text" name="medico" placeholder="Nombre del medico" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="conductor">Conductor</label>
                                    <input type="text" name="conductor" placeholder="Nombre del conductor" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tipo_auxiliar">Tipo de tripulante</label>
                                    <select name="tipo_auxiliar" class="form-control">
                                        <option selected="true" disabled="disabled">Escoge un tipo</option>
                                        <option value="AUX">AUX</option>
                                        <option value="T.A.P.H">T.A.P.H</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="auxiliar">Tripulante</label>
                                    <input type="text" name="auxiliar" placeholder="Nombre del tripulante" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <h4 class="mt-5">Traslado</h4>
                        <div class="row p-3 shadow rounded">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="hora_solicitud">Hora de solicitud</label>
                                    <input type="time" name="hora_solicitud" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="hora_salida">Hora de salida</label>
                                    <input type="time" name="hora_salida" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="hora_llegada">Hora de llegada</label>
                                    <input type="time" name="hora_llegada" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="hora_final">Hora final</label>
                                    <input type="time" name="hora_final" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipo_traslado">Tipo de traslado</label>
                                    <select name="tipo_traslado" class="form-control">
                                        <option selected="true" disabled="disabled">Escoge un tipo</option>
                                        <option value="TAB">TAB</option>
                                        <option value="TAM">TAM</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipo_recorrido">Tipo de recorrido</label>
                                    <select name="tipo_recorrido" class="form-control">
                                        <option selected="true" disabled="disabled">Escoge un tipo</option>
                                        <option value="Simple">Simple</option>
                                        <option value="Doble">Doble</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ips_remitente">IPS Remitente</label>
                                    <input type="text" name="ips_remitente" placeholder="Nombre de la IPS Remitente o sitio del evento" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ips_receptora">IPS Receptora</label>
                                    <input type="text" name="ips_receptora" placeholder="Nombre de la IPS Receptora" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ips_contraremision">IPS Contraremision</label>
                                    <input type="text" name="ips_contraremision" placeholder="Nombre de la IPS Contraremision" class="form-control" >
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-10">
                                <div class="form-group">
                                    <label for="motivo">Motivo</label>
                                    <textarea type="text" name="motivo" class="form-control" placeholder="Motivo de traslado"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-2">
                                <div class="form-group">
                                    <label for="triage">Triage</label>
                                    <select name="triage" class="form-control">
                                        <option selected disabled>Seleccionar</option>
                                        <option value="TRIAGE 1" >TRIAGE 1</option>
                                        <option value="TRIAGE 2" >TRIAGE 2</option>
                                        <option value="TRIAGE 3" >TRIAGE 3</option>
                                        <option value="TRIAGE 4" >TRIAGE 4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-5">
                        <h3 class="text-center mt-5">Datos paciente</h3>
                        <h4>Personales</h4>
                        <div class="row p-3 shadow rounded">
                            <div class="col-sm-6 col-lg-2">
                                <div class="form-group">
                                    <label for="documento">N° Documento</label>
                                    <input type="number" name="documento" class="form-control" placeholder="Documento del paciente" id="documento" required>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-2">
                                <div class="form-group">
                                    <label for="tipo_documento" >Tipo de documento</label>
                                    <select name="tipo_documento" class="form-control">
                                        <option selected disabled>Seleccionar</option>
                                        <option value="CC" >Cédula de Ciudadanía</option>
                                        <option value="CE" >Cédula de Extranjería</option>
                                        <option value="PA" >Pasaporte</option>
                                        <option value="RC" >Registro Civil</option>
                                        <option value="TI" >Tarjeta de Identidad</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 ">
                                <div class="form-group">
                                    <label for="nombres">Nombres</label>
                                    <input type="text" name="nombres" class="form-control" placeholder="Nombres del paciente">
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 ">
                                <div class="form-group">
                                    <label for="apellidos">Apellidos</label>
                                    <input type="text" name="apellidos" class="form-control" placeholder="Apellidos del paciente">
                                </div>
                            </div>
                            <div class="col-sm-2 col-lg-1 ">
                                <div class="form-group">
                                    <label for="edad_paciente">Edad</label>
                                    <input type="number" name="edad_paciente" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-2 col-lg-2 ">
                                <div class="form-group">
                                    <label for="tipo_edad">Años/Meses</label>
                                    <select name="tipo_edad" class="form-control">
                                        <option value="Meses">Meses</option>
                                        <option value="Años" selected>Años</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-2">
                                <div class="form-group">
                                    <label for="genero" >Genero</label>
                                    <select name="genero" class="form-control">
                                        <option selected disabled>Seleccionar</option>
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-3">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Fecha de nacimiento</label>
                                    <input type="date" class="form-control"  name="fecha_nacimiento" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-2">
                                <div class="form-group">
                                    <label for="telefono">Telefono</label>
                                    <input type="text" name="telefono" class="form-control" placeholder="Telefono del paciente">
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-2">
                                <div class="form-group">
                                    <label for="celular">Celular</label>
                                    <input type="text" name="celular" class="form-control" placeholder="Celular del paciente">
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-4">
                                <div class="form-group">
                                    <label for="departamento" >Departamento</label>
                                    <select name="departamento" class="form-control" id="departamento" required>
                                        <option selected disabled>Seleccionar</option>
                                        @foreach($departamentos as $departamento)
                                        <option value="{{$departamento->codigo}}">{{$departamento->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-4">
                                <div class="form-group">
                                    <label for="ciudad" >Ciudad</label>
                                    <select name="ciudad" class="form-control" id="ciudad" required>
                                        <option selected disabled>Seleccionar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-4">
                                <div class="form-group">
                                    <label for="zona" >Zona</label>
                                    <select name="zona" class="form-control">
                                        <option selected disabled>Seleccionar</option>
                                        <option value="Rural">Rural</option>
                                        <option value="Urbana">Urbana</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-7 col-lg-7">
                                <div class="form-group">
                                    <label for="direccion">Direccion</label>
                                    <input type="text" name="direccion" class="form-control" placeholder="Direccion del paciente">
                                </div>
                            </div>
                            <div class="col-sm-5 col-lg-5">
                                <div class="form-group">
                                    <label for="barrio">Barrio</label>
                                    <input type="text" name="barrio" class="form-control" placeholder="Barrio del paciente">
                                </div>
                            </div>
                            <input type="hidden" name="paciente_id">
                            <input type="hidden" name="persona_id">
                            <input type="hidden" name="direcciones_id">
                        </div>
                        <h4 class="mt-5">Seguridad</h4>
                        <div class="row p-3 shadow rounded">
                            <div class="col-sm-4 col-lg-2">
                                <div class="form-group">
                                    <label for="tipo_seguridad" >Tipo</label>
                                    <select name="tipo_seguridad" class="form-control">
                                        <option selected disabled>Seleccionar</option>
                                        <option value="EPS" >EPS</option>
                                        <option value="ARL" >ARL</option>
                                        <option value="SOAT" >SOAT</option>
                                        <option value="Vinculado" >Vinculado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-8 col-lg-10 ">
                                <div class="form-group">
                                    <label for="seguridad">Nombre</label>
                                    <input type="text" name="seguridad" class="form-control" placeholder="Nombre de la seguridad">
                                </div>
                            </div>
                        </div>
                        <h4 class="mt-5">Clinicos</h4>
                        <div class="row p-3 shadow rounded">
                            <div class="col-sm-3 col-lg ">
                                <div class="form-group">
                                    <label for="sv_ta">SV / TA</label>
                                    <input type="text" name="sv_ta" class="form-control" placeholder="SV / TA">
                                </div>
                            </div>
                            <div class="col-sm-3 col-lg ">
                                <div class="form-group">
                                    <label for="tam">TAM</label>
                                    <input type="text" name="tam" class="form-control" placeholder="TAM">
                                </div>
                            </div>
                            <div class="col-sm-3 col-lg ">
                                <div class="form-group">
                                    <label for="tc">T°C</label>
                                    <input type="text" name="tc" class="form-control" placeholder="T°C">
                                </div>
                            </div>
                            <div class="col-sm-3 col-lg ">
                                <div class="form-group">
                                    <label for="sapo2">SaPO2</label>
                                    <input type="text" name="sapo2" class="form-control" placeholder="SaPO2">
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg ">
                                <div class="form-group">
                                    <label for="fr">FR</label>
                                    <input type="text" name="fr" class="form-control" placeholder="FR">
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg ">
                                <div class="form-group">
                                    <label for="fc">FC</label>
                                    <input type="text" name="fc" class="form-control" placeholder="FC">
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg ">
                                <div class="form-group">
                                    <label for="fcf">FCF</label>
                                    <input type="text" name="fcf" class="form-control" placeholder="FCF">
                                </div>
                            </div>
                        </div>
                        <h4 class="mt-5">Anamnesis</h4>
                        <div class="row p-3 shadow rounded">
                            <div class="col-sm-6 col-lg-4">
                                <div class="form-group">
                                    <label for="sintomas">Sintomas</label>
                                    <textarea type="text" name="sintomas" class="form-control" placeholder="Signos y sintomas del paciente"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="form-group">
                                    <label for="alergias">Alergias</label>
                                    <textarea type="text" name="alergias" class="form-control" placeholder="Alergias del paciente"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="form-group">
                                    <label for="patologias">Patologias</label>
                                    <textarea type="text" name="patologias" class="form-control" placeholder="Patologias del paciente"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="form-group">
                                    <label for="medicamentos">Medicamentos</label>
                                    <textarea type="text" name="medicamentos" class="form-control" placeholder="Medicamentos del paciente"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="form-group">
                                    <label for="eventos_previos">Eventos previos</label>
                                    <textarea type="text" name="eventos_previos" class="form-control" placeholder="Eventos previos del paciente"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="form-group">
                                    <label for="ultima_ingesta">Ultima ingesta</label>
                                    <textarea type="text" name="ultima_ingesta" class="form-control" placeholder="Ultima ingesta del paciente"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="form-group">
                                    <label for="toxicos">Toxicos</label>
                                    <textarea type="text" name="toxicos" class="form-control" placeholder="Toxicos del paciente"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="form-group">
                                    <label for="gineco">Gineco</label>
                                    <textarea type="text" name="gineco" class="form-control" placeholder="Gineco del paciente"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="form-group">
                                    <label for="quirurgico">Quirurgico</label>
                                    <textarea type="text" name="quirurgico" class="form-control" placeholder="Quirurgico del paciente"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-12">
                                <div class="form-group">
                                    <label for="examen_fisico">Examen fisico</label>
                                    <textarea type="text" name="examen_fisico" class="form-control" placeholder="Examen fisico del paciente"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-5">
                        <h3 class="text-center mt-5 mb-5">Procedimientos y Manejo Hospitalario</h3>
                        <div class="row p-3 shadow rounded">
                            @foreach($procedimientos as $procedimiento)
                            <div class="col-sm-4 col-lg-2">
                                <div class="form-group icheck-primary">
                                    <input type="checkbox" name="procedimientos[]" value="{{$procedimiento->id}}" id="procedimiento{{$procedimiento->id}}">
                                    <label for="procedimiento{{$procedimiento->id}}">{{$procedimiento->nombre}}</label>
                                </div>
                            </div>
                            @endforeach
                            <div class="col-sm-6 col-lg-6 mt-3">
                                <div class="form-group">
                                    <label for="des_entrada_paciente">Recibo del paciente</label>
                                    <textarea type="text" name="des_entrada_paciente" class="form-control" placeholder="Estado del paciente al recibirlo"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 mt-3">
                                <div class="form-group">
                                    <label for="des_novedad_paciente">Novedades durante el traslado</label>
                                    <textarea type="text" name="des_novedad_paciente" class="form-control" placeholder="Novedades del paciente al trasladarlo"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label for="diagnostico">Diagnostico</label>
                                    <textarea type="text" name="diagnostico" class="form-control" placeholder="Diagnostico del paciente"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label for="observacion">Observaciones</label>
                                    <textarea type="text" name="observacion" class="form-control" placeholder="Observaciones del traslado del paciente "></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label for="soportes">Soportes</label>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="customFile">Adjunte uno o varios archivos</label>
                                        <input type="file" name="soportes[]" class="custom-file-input" id="customFile" multiple>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="mt-5">Atlas</h4>
                        <div class="row p-3 shadow rounded">
                            <div class="col-sm-12 col-lg-12">
                                <input type="hidden" name="atlasPaciente" id="atlasPaciente">
                                <div class="text-center">
                                <img src="{{ asset('images/cuerpo.jpg') }}" id="atlasTomada" width="450" height="400">
                                </div>
                                <div class="text-center mt-3">
                                    <a href="javascript:void(0)" class="btn btn-success" data-toggle="modal" data-target="#modalAtlas" id="crearAtlas">Crear</a>
                                    <a href="javascript:void(0)" class="btn btn-info disabled" data-toggle="modal" data-target="#modalAtlas" id="editarAtlas">Editar</a>
                                </div>
                                <div class="modal fade " id="modalAtlas" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-firma" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Atlas del paciente</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center" style="background-color:#e8e8e8;">
                                                <canvas width="450" height="400" style="touch-action: none;" id="atlas"></canvas>
                                            </div>
                                            <div class="modal-footer text-center d-block">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrarCanvas5">Cerrar</button>
                                                <button type="button" class="btn btn-info" id="limpiarCanvas5">Limpiar</button>
                                                <button type="button" class="btn btn-success" id="guardarCanvas5">Guardar</button>
                                                <script>
                                                    var canvas5 = document.getElementById("atlas");
                                                    var signaturePad5 = new SignaturePad(canvas5, {
                                                        backgroundColor: 'rgb(255, 255, 255)'
                                                    });
                                                    signaturePad5.fromDataURL("{{ asset('images/cuerpo.jpg') }}", {width: 450, height: 400});
                                                    $('#guardarCanvas5').on('click',function(){
                                                        if (!signaturePad5.isEmpty()) {
                                                            var file= trimCanvas (canvas5);
                                                            //Input
                                                            $('#atlasPaciente').val(file.toDataURL());
                                                            //Img
                                                            $('#atlasTomada').attr('src',file.toDataURL());

                                                            $('#editarAtlas').removeClass('disabled');
                                                            $('#crearAtlas').addClass('disabled');
                                                            toastr.success('Anotado correctamente');
                                                            $('#modalAtlas').modal('hide');
                                                        }else{
                                                            toastr.info('Debes anotar para guardar');
                                                        }
                                                    });
                                                    $('#limpiarCanvas5').on('click',function(){
                                                        signaturePad5.clear();
                                                        signaturePad5.fromDataURL("{{ asset('images/cuerpo.jpg') }}", {width: 450, height: 400});
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="mt-5">Firmas</h4>
                        <div class="row p-3 shadow rounded">
                            <div class="col-sm-6 col-lg-3">
                                <input type="hidden" name="firmaPaciente1" id="firmaPaciente1">
                                <img src="" id="firma1Tomada" class="w-100">
                                <hr>
                                <p class="text-center">Firma del paciente / familiar</p>
                                <div class="text-center">
                                    <a href="javascript:void(0)" class="btn btn-success" data-toggle="modal" data-target="#modalFirma1" id="crearFirma1">Crear</a>
                                    <a href="javascript:void(0)" class="btn btn-info disabled" data-toggle="modal" data-target="#modalFirma1" id="editarFirma1">Editar</a>
                                </div>
                                <div class="modal fade " id="modalFirma1" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-firma" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Firmar el paciente o familiar</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center" style="background-color:#e8e8e8;">
                                                <canvas width="600" height="250" style="touch-action: none;" id="firma1"></canvas>
                                            </div>
                                            <div class="modal-footer text-center d-block">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrarCanvas1">Cerrar</button>
                                                <button type="button" class="btn btn-info" id="limpiarCanvas1">Limpiar</button>
                                                <button type="button" class="btn btn-success" id="guardarCanvas1">Guardar</button>
                                                <script>
                                                    var canvas = document.getElementById("firma1");
                                                    var signaturePad = new SignaturePad(canvas, {
                                                        backgroundColor: 'rgb(255, 255, 255)'
                                                    });
                                                    
                                                    $('#guardarCanvas1').on('click',function(){
                                                        if (!signaturePad.isEmpty()) {
                                                            var file= trimCanvas (canvas);
                                                            //Input
                                                            $('#firmaPaciente1').val(file.toDataURL());
                                                            //Img
                                                            $('#firma1Tomada').attr('src',file.toDataURL());

                                                            $('#editarFirma1').removeClass('disabled');
                                                            $('#crearFirma1').addClass('disabled');
                                                            toastr.success('Firmado correctamente');
                                                            $('#modalFirma1').modal('hide');
                                                        }else{
                                                            toastr.info('Debes firmar para guardar');
                                                        }
                                                    });
                                                    $('#limpiarCanvas1').on('click',function(){
                                                        signaturePad.clear();
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <input type="hidden" name="firmaPaciente2" id="firmaPaciente2">
                                <img src="" id="firma2Tomada" class="w-100">
                                <hr>
                                <p class="text-center">Firma quien entrega</p>
                                <div class="text-center">
                                    <a href="javascript:void(0)" class="btn btn-success" data-toggle="modal" data-target="#modalFirma2" id="crearFirma2">Crear</a>
                                    <a href="javascript:void(0)" class="btn btn-info disabled" data-toggle="modal" data-target="#modalFirma2" id="editarFirma2">Editar</a>
                                </div>
                                <div class="modal fade " id="modalFirma2" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-firma" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Firma quien entrega</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center" style="background-color:#e8e8e8;">
                                                <canvas width="600" height="250" style="touch-action: none;" id="firma2"></canvas>
                                            </div>
                                            <div class="modal-footer text-center d-block">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrarCanvas2">Cerrar</button>
                                                <button type="button" class="btn btn-info" id="limpiarCanvas2">Limpiar</button>
                                                <button type="button" class="btn btn-success" id="guardarCanvas2">Guardar</button>
                                                <script>
                                                    var canvas2 = document.getElementById("firma2");
                                                    var signaturePad2 = new SignaturePad(canvas2, {
                                                        backgroundColor: 'rgb(255, 255, 255)'
                                                    });
                                                    
                                                    $('#guardarCanvas2').on('click',function(){
                                                        if (!signaturePad2.isEmpty()) {
                                                            var file= trimCanvas (canvas2);
                                                            //Input
                                                            $('#firmaPaciente2').val(file.toDataURL());
                                                            //Img
                                                            $('#firma2Tomada').attr('src',file.toDataURL());

                                                            $('#editarFirma2').removeClass('disabled');
                                                            $('#crearFirma2').addClass('disabled');
                                                            toastr.success('Firmado correctamente');
                                                            $('#modalFirma2').modal('hide');
                                                        }else{
                                                            toastr.info('Debes firmar para guardar');
                                                        }
                                                    });
                                                    $('#limpiarCanvas2').on('click',function(){
                                                        signaturePad2.clear();
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <input type="hidden" name="firmaPaciente3" id="firmaPaciente3">
                                <img src="" id="firma3Tomada" class="w-100">
                                <hr>
                                <p class="text-center">Firma quien recibe</p>
                                <div class="text-center">
                                    <a href="javascript:void(0)" class="btn btn-success" data-toggle="modal" data-target="#modalFirma3" id="crearFirma3">Crear</a>
                                    <a href="javascript:void(0)" class="btn btn-info disabled" data-toggle="modal" data-target="#modalFirma3" id="editarFirma3">Editar</a>
                                </div>
                                <div class="modal fade " id="modalFirma3" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-firma" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Firma quien recibe</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center" style="background-color:#e8e8e8;">
                                                <canvas width="600" height="250" style="touch-action: none;" id="firma3"></canvas>
                                            </div>
                                            <div class="modal-footer text-center d-block">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrarCanvas3">Cerrar</button>
                                                <button type="button" class="btn btn-info" id="limpiarCanvas3">Limpiar</button>
                                                <button type="button" class="btn btn-success" id="guardarCanvas3">Guardar</button>
                                                <script>
                                                    var canvas3 = document.getElementById("firma3");
                                                    var signaturePad3 = new SignaturePad(canvas3, {
                                                        backgroundColor: 'rgb(255, 255, 255)'
                                                    });
                                                    
                                                    $('#guardarCanvas3').on('click',function(){
                                                        if (!signaturePad3.isEmpty()) {
                                                            var file= trimCanvas (canvas3);
                                                            //Input
                                                            $('#firmaPaciente3').val(file.toDataURL());
                                                            //Img
                                                            $('#firma3Tomada').attr('src',file.toDataURL());

                                                            $('#editarFirma3').removeClass('disabled');
                                                            $('#crearFirma3').addClass('disabled');
                                                            toastr.success('Firmado correctamente');
                                                            $('#modalFirma3').modal('hide');
                                                        }else{
                                                            toastr.info('Debes firmar para guardar');
                                                        }
                                                    });
                                                    $('#limpiarCanvas3').on('click',function(){
                                                        signaturePad3.clear();
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <input type="hidden" name="firmaPaciente4" id="firmaPaciente4">
                                <img src="" id="firma4Tomada" class="w-100">
                                <hr>
                                <p class="text-center">Firma T.A.P.H / Auxiliar</p>
                                <div class="text-center">
                                    <a href="javascript:void(0)" class="btn btn-success" data-toggle="modal" data-target="#modalFirma4" id="crearFirma4">Crear</a>
                                    <a href="javascript:void(0)" class="btn btn-info disabled" data-toggle="modal" data-target="#modalFirma4" id="editarFirma4">Editar</a>
                                </div>
                                <div class="modal fade " id="modalFirma4" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-firma" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Firma T.A.P.H / Auxiliar</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center" style="background-color:#e8e8e8;">
                                                <canvas width="600" height="250" style="touch-action: none;" id="firma4"></canvas>
                                            </div>
                                            <div class="modal-footer text-center d-block">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrarCanvas4">Cerrar</button>
                                                <button type="button" class="btn btn-info" id="limpiarCanvas4">Limpiar</button>
                                                <button type="button" class="btn btn-success" id="guardarCanvas4">Guardar</button>
                                                <script>
                                                    var canvas4 = document.getElementById("firma4");
                                                    var signaturePad4 = new SignaturePad(canvas4, {
                                                        backgroundColor: 'rgb(255, 255, 255)'
                                                    });
                                                    
                                                    $('#guardarCanvas4').on('click',function(){
                                                        if (!signaturePad4.isEmpty()) {
                                                            var file= trimCanvas (canvas4);
                                                            //Input
                                                            $('#firmaPaciente4').val(file.toDataURL());
                                                            //Img
                                                            $('#firma4Tomada').attr('src',file.toDataURL());

                                                            $('#editarFirma4').removeClass('disabled');
                                                            $('#crearFirma4').addClass('disabled');
                                                            toastr.success('Firmado correctamente');
                                                            $('#modalFirma4').modal('hide');
                                                        }else{
                                                            toastr.info('Debes firmar para guardar');
                                                        }
                                                    });
                                                    $('#limpiarCanvas4').on('click',function(){
                                                        signaturePad4.clear();
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-5">
                        <h3 class="text-center mt-5 mb-5">Desestimiento</h3>
                        <div class="row p-3 shadow rounded">    
                            <div class="col-md-10 col-lg-10">
                                <h3>FORMATO DE DESESTIMIENTO</h3>
                                <p>Este formato es opcional. Para crearlo solo es oprimir el boton</p>
                            </div>
                            <div class="col-md-2 col-lg-2 mt-4">
                                <div class="form-group">
                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" class="custom-control-input" name="ifDesestimiento" id="customSwitch3">
                                        <label class="custom-control-label" for="customSwitch3"></label>
                                    </div>
                                </div>
                            </div>
                            <div id="formatoDesestimiento" class="d-none row">
                                <div class="col-sm-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="nombreDesestimiento">Nombre</label>
                                        <input type="text" name="nombreDesestimiento" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="cedulaDesestimiento">Numero cedula</label>
                                        <input type="text" name="cedulaDesestimiento" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="expedidaDesestimiento">Expedida en</label>
                                        <input type="text" name="expedidaDesestimiento" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="form-group">
                                        <label for="pacienteDesestimiento">Paciente</label>
                                        <input type="text" name="pacienteDesestimiento" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="parentescoDesestimiento">Parentesco</label>
                                        <input type="text" name="parentescoDesestimiento" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="causasDesestimiento">Causas</label>
                                        <input type="text" name="causasDesestimiento" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="diaDesestimiento">Dia</label>
                                        <input type="text" name="diaDesestimiento" class="form-control" value="{{date('d')}}">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="mesDesestimiento">Mes</label>
                                        <input type="text" name="mesDesestimiento" class="form-control" value="{{date('F')}}"> 
                                    </div>
                                </div>
                                <div class="col-sm-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="añoDesestimiento">Año</label>
                                        <input type="text" name="añoDesestimiento" class="form-control" value="{{date('Y')}}">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="testigoDesestimiento">Testigo</label>
                                        <input type="text" name="testigoDesestimiento" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="cedulaTestigoDesestimiento">Cedula testigo</label>
                                        <input type="text" name="cedulaTestigoDesestimiento" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="auxiliarDesestimiento">Auxiliar ambulancia</label>
                                        <input type="text" name="auxiliarDesestimiento" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6"></div>
                                <div class="col-sm-6 col-lg-6">
                                    <input type="hidden" name="firmaPacienteDesestimiento" id="firmaPacienteDesestimiento">
                                    <img src="" id="firma6Tomada" class="w-100">
                                    <hr>
                                    <p class="text-center">Firma del paciente o persona responsable</p>
                                    <div class="text-center">
                                        <a href="javascript:void(0)" class="btn btn-success" data-toggle="modal" data-target="#modalFirma6" id="crearFirma6">Crear</a>
                                        <a href="javascript:void(0)" class="btn btn-info disabled" data-toggle="modal" data-target="#modalFirma6" id="editarFirma6">Editar</a>
                                    </div>
                                    <div class="modal fade " id="modalFirma6" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-firma" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Firma del paciente o persona responsable</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-center" style="background-color:#e8e8e8;">
                                                    <canvas width="600" height="250" style="touch-action: none;" id="firma6"></canvas>
                                                </div>
                                                <div class="modal-footer text-center d-block">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrarCanvas6">Cerrar</button>
                                                    <button type="button" class="btn btn-info" id="limpiarCanvas6">Limpiar</button>
                                                    <button type="button" class="btn btn-success" id="guardarCanvas6">Guardar</button>
                                                    <script>
                                                        var canvas6 = document.getElementById("firma6");
                                                        var signaturePad6 = new SignaturePad(canvas6, {
                                                            backgroundColor: 'rgb(255, 255, 255)'
                                                        });
                                                        
                                                        $('#guardarCanvas6').on('click',function(){
                                                            if (!signaturePad6.isEmpty()) {
                                                                var file= trimCanvas (canvas6);
                                                                //Input
                                                                $('#firmaPacienteDesestimiento').val(file.toDataURL());
                                                                //Img
                                                                $('#firma6Tomada').attr('src',file.toDataURL());

                                                                $('#editarFirma6').removeClass('disabled');
                                                                $('#crearFirma6').addClass('disabled');
                                                                toastr.success('Firmado correctamente');
                                                                $('#modalFirma6').modal('hide');
                                                            }else{
                                                                toastr.info('Debes firmar para guardar');
                                                            }
                                                        });
                                                        $('#limpiarCanvas6').on('click',function(){
                                                            signaturePad6.clear();
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="cedulaFirmaDesestimiento">Documento de identidad</label>
                                        <input type="text" name="cedulaFirmaDesestimiento" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-principal text-white d-none" value="Pre-guardar" id="guardar">
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
<div>
    <a type="buttom" class="btn btn-principal text-white flt-guardar" id="btn-flotante"><i class="fas fa-save"></i></a>
</div>
<script type="text/javascript">
    window.onbeforeunload = function(e) {
        var opcion = confirm("¿Esta seguro que desea salir? se perderan todos los cambios");
        if (opcion == true) {
            return true;
        } else {
            return false;
        }
    };
    $(document).ready(function(){
        bsCustomFileInput.init();
        $('#fecha').val(new Date().toISOString().substr(0,10));
        $('#departamento').change(function(){
            $.ajax({
                    url:'/pacientes/ciudades',
                    data:{'codigo' : $(this).val(), "_token": "{{ csrf_token() }}"},
                    type:'POST',
                    success: function (response) {
                        var ciudades = JSON.parse(response);
                        $('#ciudad').html('');
                        $('#ciudad').append('<option selected disabled>Seleccionar</option>');
                        for(var i = 0; i < ciudades.length; i++){
                            var aux = '<option value="'+ciudades[i]['id']+'" >'+ciudades[i]['nombre']+'</option>';
                            $('#ciudad').append(aux);
                        }
                    },
                    error:function(response){
                        console.log(response.responseText);
                    }
                });
        });
        $('#documento').change(function(){
            $.ajax({
                url:'/historia/paciente',
                data:{'documento' : $(this).val(), "_token": "{{ csrf_token() }}"},
                type:'POST',
                success: function (response) {
                    if(response){
                        $('#departamento').val(response.cod_departamento);
                        $('#ciudad').html('');
                        $('#ciudad').append('<option selected disabled>Seleccionar</option>');
                        var ciudades = response.ciudades;
                        for(var i = 0; i < ciudades.length; i++){
                            var aux = '<option value="'+ciudades[i]['id']+'" >'+ciudades[i]['nombre']+'</option>';
                            $('#ciudad').append(aux);
                        }
                        $('#ciudad').val(response.persona.ciudades_id);

                        $("select[name='tipo_documento']").val(response.persona.tipo_documento);
                        $("input[name='nombres']").val(response.persona.nombres);
                        $("input[name='apellidos']").val(response.persona.apellidos);
                        $("select[name='genero']").val(response.persona.genero);
                        $("input[name='fecha_nacimiento']").val(response.persona.fecha_nacimiento);
                        $("input[name='edad_paciente']").val(Edad(response.persona.fecha_nacimiento));
                        $("input[name='telefono']").val(response.persona.telefono);
                        $("input[name='celular']").val(response.persona.celular);
                        $("select[name='zona']").val(response.persona.zona);
                        $("input[name='direccion']").val(response.persona.direccion);
                        $("input[name='barrio']").val(response.persona.barrio);
                        $("input[name='paciente_id']").val(response.persona.paciente_id);
                        $("input[name='persona_id']").val(response.persona.id);
                        $("input[name='direcciones_id']").val(response.persona.direcciones_id);
                        
                        toastr.success( 'Puedes modificar los datos y al guardar se actualizaran','Paciente encontrado');
                    }else{
                        $("input[name='paciente_id']").val('');
                        toastr.info( 'Al llenar los datos y guardar se creara el paciente','Paciente no encontrado');
                    }
                },
                error:function(response){
                    console.log(response.responseText);
                }
            });
        });
        $("input").keydown(function (e){
            // Capturamos qué telca ha sido
            var keyCode= e.which;
            // Si la tecla es el Intro/Enter
            if (keyCode == 13){
                // Evitamos que se ejecute eventos
                event.preventDefault();
                // Devolvemos falso
                return false;
            }
        });
        $(window).scroll(function() {
            if ($(window).scrollTop() > 3300) {
                $('#guardar').removeClass('d-none');
                $('#btn-flotante').addClass('d-none');
            } else{
                $('#guardar').addClass('d-none');
                $('#btn-flotante').removeClass('d-none');
            }
        });
        $('#btn-flotante').click(function(){
            $('#guardar').click();
        });
        $('#customSwitch3').click(function(){
            if( $('#customSwitch3').prop('checked') ) {
                $('#formatoDesestimiento').removeClass('d-none');
            }else{
                $('#formatoDesestimiento').addClass('d-none');
            }
        });
    });
    function Edad(FechaNacimiento) {

        var fechaNace = new Date(FechaNacimiento);
        var fechaActual = new Date()

        var mes = fechaActual.getMonth();
        var dia = fechaActual.getDate();
        var año = fechaActual.getFullYear();

        fechaActual.setDate(dia);
        fechaActual.setMonth(mes);
        fechaActual.setFullYear(año);

        edad = Math.floor(((fechaActual - fechaNace) / (1000 * 60 * 60 * 24) / 365));

        return edad;
    }
    function trimCanvas(c) {
        var ctx = c.getContext('2d'),
            copy = document.createElement('canvas').getContext('2d'),
            pixels = ctx.getImageData(0, 0, c.width, c.height),
            l = pixels.data.length,
            i,
            bound = {
                top: null,
                left: null,
                right: null,
                bottom: null
            },
            x, y;
        
        // Iterate over every pixel to find the highest
        // and where it ends on every axis ()
        for (i = 0; i < l; i += 4) {
            if (pixels.data[i + 3] !== 0) {
                x = (i / 4) % c.width;
                y = ~~((i / 4) / c.width);

                if (bound.top === null) {
                    bound.top = y;
                }

                if (bound.left === null) {
                    bound.left = x;
                } else if (x < bound.left) {
                    bound.left = x;
                }

                if (bound.right === null) {
                    bound.right = x;
                } else if (bound.right < x) {
                    bound.right = x;
                }

                if (bound.bottom === null) {
                    bound.bottom = y;
                } else if (bound.bottom < y) {
                    bound.bottom = y;
                }
            }
        }
        
        // Calculate the height and width of the content
        var trimHeight = bound.bottom - bound.top,
            trimWidth = bound.right - bound.left,
            trimmed = ctx.getImageData(bound.left, bound.top, trimWidth, trimHeight);

        copy.canvas.width = trimWidth;
        copy.canvas.height = trimHeight;
        copy.putImageData(trimmed, 0, 0);

        // Return trimmed canvas
        return copy.canvas;
    }
</script>
@endsection