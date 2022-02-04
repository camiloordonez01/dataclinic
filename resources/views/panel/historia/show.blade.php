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
                                    <input disabled type="date" name="fecha" class="form-control" value="{{$historia->fecha}}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipoHistoria">Tipo de servicio</label>
                                    <select name="tipo_historia" class="form-control" disabled>
                                        <option value="" selected disabled>Seleccionar tipo</option>
                                        @foreach($tipos as $tipo)
                                        <option value="{{$tipo->nombre}}"  @if ($historia->tipo_historia==$tipo->nombre){{'selected'}} @endif>{{$tipo->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="movil">Movil</label>
                                    <input disabled type="text" name="movil" class="form-control" placeholder="Numero del movil" value="{{$historia->movil}}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="placa">Placa</label>
                                    <input disabled type="text" name="placa" class="form-control" placeholder="Placa del automovil" value="{{$historia->placa}}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="horas_espera">Horas de espera</label>
                                    <input disabled type="text" name="horas_espera" class="form-control" placeholder="Numero de horas" value="{{$historia->horas_espera}}" required>
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
                                    <input disabled type="text" name="medico" placeholder="Nombre del medico" class="form-control" value="{{$historia->medico}}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="conductor">Conductor</label>
                                    <input disabled type="text" name="conductor" placeholder="Nombre del conductor" class="form-control" value="{{$historia->conductor}}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tipo_auxiliar">Tipo de tripulate</label>
                                    <select disabled name="tipo_auxiliar" class="form-control" required>
                                        <option selected="true" disabled="disabled">Escoge un tipo</option>
                                        <option value="AUX" @if ($historia->tipo_auxiliar=='AUX'){{'selected'}} @endif>AUX</option>
                                        <option value="T.A.P.H" @if ($historia->tipo_auxiliar=='T.A.P.H'){{'selected'}} @endif>T.A.P.H</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="auxiliar">Tripulante</label>
                                    <input disabled type="text" name="auxiliar" placeholder="Nombre del tripulante" class="form-control" value="{{$historia->auxiliar}}" required>
                                </div>
                            </div>
                        </div>
                        <h4 class="mt-5">Traslado</h4>
                        <div class="row p-3 shadow rounded">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="hora_solicitud">Hora de solicitud</label>
                                    <input disabled type="time" name="hora_solicitud" class="form-control" value="{{$historia->hora_solicitud}}" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="hora_salida">Hora de salida</label>
                                    <input disabled type="time" name="hora_salida" class="form-control" value="{{$historia->hora_salida}}" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="hora_llegada">Hora de llegada</label>
                                    <input disabled type="time" name="hora_llegada" class="form-control" value="{{$historia->hora_llegada}}" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="hora_final">Hora final</label>
                                    <input disabled type="time" name="hora_final" class="form-control" value="{{$historia->hora_final}}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipo_traslado">Tipo de traslado</label>
                                    <select disabled name="tipo_traslado" class="form-control">
                                        <option selected="true" disabled="disabled">Escoge un tipo</option>
                                        <option value="TAB" @if ($historia->tipo_traslado=='TAB'){{'selected'}} @endif>TAB</option>
                                        <option value="TAM" @if ($historia->tipo_traslado=='TAM'){{'selected'}} @endif>TAM</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipo_recorrido">Tipo de recorrido</label>
                                    <select disabled name="tipo_recorrido" class="form-control">
                                        <option selected="true" disabled="disabled">Escoge un tipo</option>
                                        <option value="Simple" @if ($historia->tipo_recorrido=='Simple'){{'selected'}} @endif>Simple</option>
                                        <option value="Doble" @if ($historia->tipo_recorrido=='Doble'){{'selected'}} @endif>Doble</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ips_remitente">IPS Remitente</label>
                                    <input disabled type="text" name="ips_remitente" placeholder="Nombre de la IPS Remitente o sitio del evento" class="form-control" value="{{$historia->ips_remitente}}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ips_receptora">IPS Receptora</label>
                                    <input disabled type="text" name="ips_receptora" placeholder="Nombre de la IPS Receptora" class="form-control" value="{{$historia->ips_receptora}}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ips_contraremision">IPS Contraremision</label>
                                    <input disabled type="text" name="ips_contraremision" placeholder="Nombre de la IPS Contraremision" class="form-control" value="{{$historia->ips_contraremision}}" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-10">
                                <div class="form-group">
                                    <label for="motivo">Motivo</label>
                                    <textarea disabled type="text" name="motivo" class="form-control" placeholder="Motivo de traslado" required>{{$historia->motivo}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-2">
                                <div class="form-group">
                                    <label for="triage">Triage</label>
                                    <select disabled name="triage" class="form-control">
                                        <option selected disabled>Seleccionar</option>
                                        <option value="TRIAGE 1" @if ($historia->triage=='TRIAGE 1'){{'selected'}} @endif>TRIAGE 1</option>
                                        <option value="TRIAGE 2" @if ($historia->triage=='TRIAGE 2'){{'selected'}} @endif>TRIAGE 2</option>
                                        <option value="TRIAGE 3" @if ($historia->triage=='TRIAGE 3'){{'selected'}} @endif>TRIAGE 3</option>
                                        <option value="TRIAGE 4" @if ($historia->triage=='TRIAGE 4'){{'selected'}} @endif>TRIAGE 4</option>
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
                                    <input disabled type="number" name="documento" class="form-control" placeholder="Documento del paciente" id="documento" value="{{$persona->documento}}" required>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-2">
                                <div class="form-group">
                                    <label for="tipo_documento" >Tipo de documento</label>
                                    <select disabled name="tipo_documento" class="form-control">
                                        <option selected disabled>Seleccionar</option>
                                        <option value="CC" @if ($persona->tipo_documento=='CC'){{'selected'}} @endif>Cédula de Ciudadanía</option>
                                        <option value="CE" @if ($persona->tipo_documento=='CE'){{'selected'}} @endif>Cédula de Extranjería</option>
                                        <option value="PA" @if ($persona->tipo_documento=='PA'){{'selected'}} @endif>Pasaporte</option>
                                        <option value="RC" @if ($persona->tipo_documento=='RC'){{'selected'}} @endif>Registro Civil</option>
                                        <option value="TI" @if ($persona->tipo_documento=='TI'){{'selected'}} @endif>Tarjeta de Identidad</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 ">
                                <div class="form-group">
                                    <label for="nombres">Nombres</label>
                                    <input disabled type="text" name="nombres" class="form-control" placeholder="Nombres del paciente" value="{{$persona->nombres}}" required>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 ">
                                <div class="form-group">
                                    <label for="apellidos">Apellidos</label>
                                    <input disabled type="text" name="apellidos" class="form-control" placeholder="Apellidos del paciente" value="{{$persona->apellidos}}" required>
                                </div>
                            </div>
                            <div class="col-sm-2 col-lg-1 ">
                                <div class="form-group">
                                    <label for="edad_paciente">Edad</label>
                                    <input disabled type="number" name="edad_paciente" class="form-control" value="{{$edad[0]}}" required>
                                </div>
                            </div>
                            <div class="col-sm-2 col-lg-2 ">
                                <div class="form-group">
                                    <label for="tipo_edad">Años/Meses</label>
                                    <select disabled name="tipo_edad" class="form-control">
                                        <option value="Meses" @if ($edad[1]=='Meses'){{'selected'}} @endif>Meses</option>
                                        <option value="Años" @if ($edad[1]=='Años'){{'selected'}} @endif>Años</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-2">
                                <div class="form-group">
                                    <label for="genero" >Genero</label>
                                    <select disabled name="genero" class="form-control">
                                        <option selected disabled>Seleccionar</option>
                                        <option value="M" @if ($persona->genero=='M'){{'selected'}} @endif>Masculino</option>
                                    <option value="F" @if ($persona->genero=='F'){{'selected'}} @endif>Femenino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-3">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Fecha de nacimiento</label>
                                    <input disabled type="date" class="form-control"  name="fecha_nacimiento" value="{{$persona->fecha_nacimiento}}" required>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-2">
                                <div class="form-group">
                                    <label for="telefono">Telefono</label>
                                    <input disabled type="text" name="telefono" class="form-control" placeholder="Telefono del paciente" value="{{$persona->telefono}}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-2">
                                <div class="form-group">
                                    <label for="celular">Celular</label>
                                    <input disabled type="text" name="celular" class="form-control" placeholder="Celular del paciente" value="{{$persona->celular}}" required>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-4">
                                <div class="form-group">
                                    <label for="departamento" >Departamento</label>
                                    <select disabled name="departamento" class="form-control" id="departamento" required>
                                        <option selected disabled>Seleccionar</option>
                                        @foreach($departamentos as $departamento)
                                        <option value="{{$departamento->codigo}}" @if ($ciudad->departamentos_id==$departamento->codigo){{'selected'}} @endif>{{$departamento->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-4">
                                <div class="form-group">
                                    <label for="ciudad" >Ciudad</label>
                                    <select disabled name="ciudad" class="form-control" id="ciudad" required>
                                        @foreach($ciudades as $val)
                                        <option value="{{$val->id}}" @if ($ciudad->id==$val->id){{'selected'}} @endif>{{$val->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-4">
                                <div class="form-group">
                                    <label for="zona" >Zona</label>
                                    <select disabled name="zona" class="form-control" required>
                                        <option selected disabled>Seleccionar</option>
                                        <option value="Rural " @if ($persona->zona=='Rural'){{'selected'}} @endif>Rural</option>
                                        <option value="Urbana" @if ($persona->zona=='Urbana'){{'selected'}} @endif>Urbana</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-7 col-lg-7">
                                <div class="form-group">
                                    <label for="direccion">Direccion</label>
                                    <input disabled type="text" name="direccion" class="form-control" placeholder="Direccion del paciente" value="{{$persona->direccion}}" required>
                                </div>
                            </div>
                            <div class="col-sm-5 col-lg-5">
                                <div class="form-group">
                                    <label for="barrio">Barrio</label>
                                    <input disabled type="text" name="barrio" class="form-control" placeholder="Barrio del paciente" value="{{$persona->barrio}}" required>
                                </div>
                            </div>
                            <input disabled type="hidden" name="paciente_id" value="{{$persona->paciente_id}}" >
                            <input disabled type="hidden" name="persona_id" value="{{$persona->id}}">
                            <input disabled type="hidden" name="direcciones_id" value="{{$persona->direcciones_id}}">
                        </div>
                        <h4 class="mt-5">Seguridad</h4>
                        <div class="row p-3 shadow rounded">
                            <div class="col-sm-4 col-lg-2">
                                <div class="form-group">
                                    <label for="tipo_seguridad" >Tipo</label>
                                    <select disabled name="tipo_seguridad" class="form-control" required>
                                        <option selected disabled>Seleccionar</option>
                                        <option value="EPS" @if ($historia->tipo_seguridad=='EPS'){{'selected'}} @endif>EPS</option>
                                        <option value="ARL" @if ($historia->tipo_seguridad=='ARL'){{'selected'}} @endif>ARL</option>
                                        <option value="SOAT" @if ($historia->tipo_seguridad=='SOAT'){{'selected'}} @endif>SOAT</option>
                                        <option value="Vinculado"@if ($historia->tipo_seguridad=='Vinculado'){{'selected'}} @endif >Vinculado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-8 col-lg-10 ">
                                <div class="form-group">
                                    <label for="seguridad">Nombre</label>
                                    <input disabled type="text" name="seguridad" class="form-control" placeholder="Nombre de la seguridad" value="{{$historia->seguridad}}" required>
                                </div>
                            </div>
                        </div>
                        <h4 class="mt-5">Clinicos</h4>
                        <div class="row p-3 shadow rounded">
                            <div class="col-sm-3 col-lg ">
                                <div class="form-group">
                                    <label for="sv_ta">SV / TA</label>
                                    <input disabled type="text" name="sv_ta" class="form-control" placeholder="SV / TA" value="{{$historia->sv_ta}}" required>
                                </div>
                            </div>
                            <div class="col-sm-3 col-lg ">
                                <div class="form-group">
                                    <label for="tam">TAM</label>
                                    <input disabled type="text" name="tam" class="form-control" placeholder="TAM" value="{{$historia->tam}}" required>
                                </div>
                            </div>
                            <div class="col-sm-3 col-lg ">
                                <div class="form-group">
                                    <label for="tc">T°C</label>
                                    <input disabled type="text" name="tc" class="form-control" placeholder="T°C" value="{{$historia->tc}}" required>
                                </div>
                            </div>
                            <div class="col-sm-3 col-lg ">
                                <div class="form-group">
                                    <label for="sapo2">SaPO2</label>
                                    <input disabled type="text" name="sapo2" class="form-control" placeholder="SaPO2" value="{{$historia->sapo2}}" required>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg ">
                                <div class="form-group">
                                    <label for="fr">FR</label>
                                    <input disabled type="text" name="fr" class="form-control" placeholder="FR" value="{{$historia->fr}}" required>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg ">
                                <div class="form-group">
                                    <label for="fc">FC</label>
                                    <input disabled type="text" name="fc" class="form-control" placeholder="FC" value="{{$historia->fc}}" required>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg ">
                                <div class="form-group">
                                    <label for="fcf">FCF</label>
                                    <input disabled type="text" name="fcf" class="form-control" placeholder="FCF" value="{{$historia->fcf}}" required>
                                </div>
                            </div>
                        </div>
                        <h4 class="mt-5">Anamnesis</h4>
                        <div class="row p-3 shadow rounded">
                            <div class="col-sm-6 col-lg-4">
                                <div class="form-group">
                                    <label for="sintomas">Sintomas</label>
                                    <textarea disabled type="text" name="sintomas" class="form-control" placeholder="Signos y sintomas del paciente" required>{{$historia->sintomas}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="form-group">
                                    <label for="alergias">Alergias</label>
                                    <textarea disabled type="text" name="alergias" class="form-control" placeholder="Alergias del paciente" required>{{$historia->alergias}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="form-group">
                                    <label for="patologias">Patologias</label>
                                    <textarea disabled type="text" name="patologias" class="form-control" placeholder="Patologias del paciente" required>{{$historia->patologias}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="form-group">
                                    <label for="medicamentos">Medicamentos</label>
                                    <textarea disabled type="text" name="medicamentos" class="form-control" placeholder="Medicamentos del paciente" required>{{$historia->medicamentos}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="form-group">
                                    <label for="eventos_previos">Eventos previos</label>
                                    <textarea disabled type="text" name="eventos_previos" class="form-control" placeholder="Eventos previos del paciente" required>{{$historia->eventos_previos}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="form-group">
                                    <label for="ultima_ingesta">Ultima ingesta</label>
                                    <textarea disabled type="text" name="ultima_ingesta" class="form-control" placeholder="Ultima ingesta del paciente" required>{{$historia->ultima_ingesta}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="form-group">
                                    <label for="toxicos">Toxicos</label>
                                    <textarea disabled type="text" name="toxicos" class="form-control" placeholder="Toxicos del paciente" required>{{$historia->toxicos}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="form-group">
                                    <label for="gineco">Gineco</label>
                                    <textarea disabled type="text" name="gineco" class="form-control" placeholder="Gineco del paciente" required>{{$historia->gineco}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="form-group">
                                    <label for="quirurgico">Quirurgico</label>
                                    <textarea disabled type="text" name="quirurgico" class="form-control" placeholder="Quirurgico del paciente" required>{{$historia->quirurgico}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-12">
                                <div class="form-group">
                                    <label for="examen_fisico">Examen fisico</label>
                                    <textarea disabled type="text" name="examen_fisico" class="form-control" placeholder="Examen fisico del paciente" required>{{$historia->examen_fisico}}</textarea>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-5">
                        <h3 class="text-center mt-5 mb-5">Procedimientos y Manejo Hospitalario</h3>
                        <div class="row p-3 shadow rounded">
                            @foreach($procedimientos as $procedimiento)
                            <div class="col-sm-4 col-lg-2">
                                <div class="form-group icheck-primary">
                                    <input disabled type="checkbox" name="procedimientos[]" value="{{$procedimiento->id}}" id="procedimiento{{$procedimiento->id}}"
                                        @if (in_array($procedimiento->id, $procedimientosList)) {{'checked'}} @endif
                                    >
                                    <label for="procedimiento{{$procedimiento->id}}">{{$procedimiento->nombre}}</label>
                                </div>
                            </div>
                            @endforeach
                            @foreach($procedimientosList as $proc)
                            <input disabled type="hidden" name="procConsulta[]" value="{{$proc}}">
                            @endforeach
                            <div class="col-sm-6 col-lg-6 mt-3">
                                <div class="form-group">
                                    <label for="des_entrada_paciente">Recibo del paciente</label>
                                    <textarea disabled type="text" name="des_entrada_paciente" class="form-control" placeholder="Estado del paciente al recibirlo" required>{{$historia->des_entrada_paciente}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 mt-3">
                                <div class="form-group">
                                    <label for="des_novedad_paciente">Novedades durante el traslado</label>
                                    <textarea disabled type="text" name="des_novedad_paciente" class="form-control" placeholder="Novedades del paciente al trasladarlo" required>{{$historia->des_novedad_paciente}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label for="diagnostico">Diagnostico</label>
                                    <textarea disabled type="text" name="diagnostico" class="form-control" placeholder="Diagnostico del paciente" required>{{$historia->diagnostico}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label for="observacion">Observaciones</label>
                                    <textarea disabled type="text" name="observacion" class="form-control" placeholder="Observaciones del traslado del paciente " required>{{$historia->observacion}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label for="soportes">Soportes</label>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="customFile">Adjunte uno o varios archivos</label>
                                        <input disabled type="file" name="soportes[]" class="custom-file-input" id="customFile" multiple>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <table class="table table-bordered">
                                    <tbody>
                                        @foreach($soportes as $soporte)
                                        <tr id="trSoporte{{$soporte->id}}">
                                            <th class="text-center"><h4>Soporte {{ $loop->iteration }}</h4></th>
                                            <td class="text-center">
                                                <a href="/files/soportes/{{$soporte->url}}" target="_blank" class="btn btn-success text-white"><i class="fas fa-eye"></i> Ver</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div id="inputsDeleteSoporte"></div>
                            </div>
                        </div>
                        <h4 class="mt-5">Atlas</h4>
                        <div class="row p-3 shadow rounded" style="background-color:#e9ecef;">
                            <div class="col-sm-12 col-lg-12">
                                <div class="text-center">
                                <img src="@if (!($firmas['atlas']->urlFirma == '')){{ asset('files/firmas/'.$firmas['atlas']->urlFirma)}} @else {{ asset('images/cuerpo.jpg') }} @endif" id="atlasTomada" width="450" height="400">
                                </div>
                            </div>
                        </div>
                        <h4 class="mt-5">Firmas</h4>
                        <div class="row p-3 shadow rounded" style="background-color:#e9ecef;">
                            <div class="col-sm-6 col-lg-3">
                                <img src="@if (!($firmas['firma1']->urlFirma == '')){{ asset('files/firmas/'.$firmas['firma1']->urlFirma) }} @endif" id="firma1Tomada" class="w-100">
                                <hr>
                                <p class="text-center">Firma del paciente / familiar</p>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <img src="@if (!($firmas['firma2']->urlFirma == '')){{ asset('files/firmas/'.$firmas['firma2']->urlFirma) }} @endif" id="firma2Tomada" class="w-100">
                                <hr>
                                <p class="text-center">Firma quien entrega</p>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <img src="@if (!($firmas['firma3']->urlFirma == '')){{ asset('files/firmas/'.$firmas['firma3']->urlFirma) }} @endif" id="firma3Tomada" class="w-100">
                                <hr>
                                <p class="text-center">Firma quien recibe</p>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <img src="@if (!($firmas['firma4']->urlFirma == '')){{ asset('files/firmas/'.$firmas['firma4']->urlFirma) }} @endif" id="firma4Tomada" class="w-100">
                                <hr>
                                <p class="text-center">Firma T.A.P.H / Auxiliar</p>
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
                                        <input type="checkbox" class="custom-control-input" name="ifDesestimiento" id="customSwitch3" disabled @if($ifDesestimiento==1){{'checked'}} @endif>
                                        <label class="custom-control-label" for="customSwitch3"></label>
                                    </div>
                                </div>
                            </div>
                            <div id="formatoDesestimiento" class="@if($ifDesestimiento==0){{'d-none'}} @endif row" >
                                <div class="col-sm-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="nombreDesestimiento">Nombre</label>
                                        <input type="text" name="nombreDesestimiento" class="form-control" value="{{$desestimiento->nombre}}">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="cedulaDesestimiento">Numero cedula</label>
                                        <input type="text" name="cedulaDesestimiento" class="form-control" value="{{$desestimiento->cedula}}">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="expedidaDesestimiento">Expedida en</label>
                                        <input type="text" name="expedidaDesestimiento" class="form-control" value="{{$desestimiento->expedida}}">
                                    </div>
                                </div>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="form-group">
                                        <label for="pacienteDesestimiento">Paciente</label>
                                        <input type="text" name="pacienteDesestimiento" class="form-control" value="{{$desestimiento->paciente}}">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="parentescoDesestimiento">Parentesco</label>
                                        <input type="text" name="parentescoDesestimiento" class="form-control" value="{{$desestimiento->parentesco}}">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="causasDesestimiento">Causas</label>
                                        <input type="text" name="causasDesestimiento" class="form-control" value="{{$desestimiento->causas}}">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="diaDesestimiento">Dia</label>
                                        <input type="text" name="diaDesestimiento" class="form-control" value="{{$desestimiento->dia}}">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="mesDesestimiento">Mes</label>
                                        <input type="text" name="mesDesestimiento" class="form-control" value="{{$desestimiento->mes}}"> 
                                    </div>
                                </div>
                                <div class="col-sm-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="añoDesestimiento">Año</label>
                                        <input type="text" name="añoDesestimiento" class="form-control" value="{{$desestimiento->año}}">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="testigoDesestimiento">Testigo</label>
                                        <input type="text" name="testigoDesestimiento" class="form-control" value="{{$desestimiento->testigo}}">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="cedulaTestigoDesestimiento">Cedula testigo</label>
                                        <input type="text" name="cedulaTestigoDesestimiento" class="form-control" value="{{$desestimiento->cedulaTestigo}}">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="auxiliarDesestimiento">Auxiliar ambulancia</label>
                                        <input type="text" name="auxiliarDesestimiento" class="form-control" value="{{$desestimiento->auxiliarAmbulancia}}">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6"></div>
                                <div class="col-sm-6 col-lg-6">
                                    <img src="@if (!($desestimiento->firmaPaciente == '')){{ asset('files/firmas/'.$desestimiento->firmaPaciente) }} @endif" id="firma6Tomada" class="w-100">
                                    <hr>
                                    <p class="text-center">Firma del paciente o persona responsable</p>
                                </div>
                                <div class="col-sm-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="cedulaFirmaDesestimiento">Documento de identidad</label>
                                        <input type="text" name="cedulaFirmaDesestimiento" class="form-control" value="{{$desestimiento->cedulaPaciente}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <a href="/historia" class="btn btn-principal text-white">Volver</a>
                    @if($historia->estado == 1)
                    <a href="/historia/reporte/pdf/{{$historia->id}}" target="_blank" class="btn btn-success text-white">Generar Pdf <i class="fas fa-file-pdf"></i></a>
                    <a href="/historia/reporte/excel/{{$historia->id}}" target="_blank" class="btn btn-success text-white">Generar Excel <i class="fas fa-file-excel"></i></a>
                    @if($ifDesestimiento==1) 
                    <a href="/historia/reporte/desestimiento/{{$historia->id}}" target="_blank" class="btn btn-success text-white">Generar Desestimiento <i class="fas fa-align-left"></i></a>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection