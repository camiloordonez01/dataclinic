@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-sm-12 mx-auto">
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
                <div class="card-header">
                    <h3 class="card-title">Editar control Ambulancia</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!!Form::model($control,['method'=>'PUT','route'=>['Controles.update',$control->id]])!!}
                {{Form::token()}}
                    <div class="card-body">
                        <h4 class="text-center">Datos iniciales</h4>
                        <div class="row"> 
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="fecha">Fecha</label>
                                    <input type="date" class="form-control" name="fecha" id="fecha" required value="{{$control->fecha}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="empresa">Empresa</label>
                                    <input type="text" class="form-control" name="empresa" required value="{{$control->empresa}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="placa">Placa</label>
                                    <input type="text" class="form-control" name="placa" required value="{{$control->placa}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="movil">Servicio</label>
                                    <br>
                                    <input type="radio" required name="servicio" value="PUBLICO" @if($control->servicios == 'PUBLICO') {{'checked'}} @endif>
                                    <label for="PUBLICO"  class="mr-3">PUBLICO</label>
                                    <input type="radio" required name="servicio" value="PRIVADO" @if($control->servicios == 'PRIVADO') {{'checked'}} @endif>
                                    <label for="PRIVADO">PRIVADO</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="inspector">Inspeccionado por:</label>
                                    <input type="text" class="form-control" name="inspector" required value="{{$control->inspector}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="razon">Razon</label>
                                    <input type="text" class="form-control" name="razon" required value="{{$control->razon}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ASPECTO A REVISAR EN EL <br>VEHICULO</th>
                                            <th>B</th>
                                            <th>M</th>
                                            <th>NA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>DOCUMENTACIÓN DEL VEHICULO</th>
                                        </tr>
                                        <tr>
                                            <td>Licencia de tránsito ( legible y disponible en el vehiculo )</td>
                                            <td><input type="radio" required name="opcion1" value="B" @if($revision->opcion1 == 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion1" value="M" @if($revision->opcion1 == 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion1" value="NA" @if($revision->opcion1 == 'NA') {{'checked'}} @endif ></td>
                                        </tr>
                                        <tr>
                                            <td>SOAT</td>
                                            <td><input type="radio" required name="opcion2" value="B" @if($revision->opcion2 == 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion2" value="M" @if($revision->opcion2 == 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion2" value="NA" @if($revision->opcion2 == 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Seguro ( legible y disponible en el vehiculo ) </td>
                                            <td><input type="radio" required name="opcion3" value="B" @if($revision->opcion3 == 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion3" value="M" @if($revision->opcion3 == 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion3" value="NA" @if($revision->opcion3 == 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Revision tecnicomecanica y de gases ( legible y disponible en el vehiculo ) </td>
                                            <td><input type="radio" required name="opcion4" value="B" @if($revision->opcion4 == 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion4" value="M" @if($revision->opcion4 == 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion4" value="NA" @if($revision->opcion4 == 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <th>DOCUMENTACIÓN DEL CONDUCTOR</th>
                                        </tr>
                                        <tr>
                                            <td>Licencia de conducion ( legal y vigente )</td>
                                            <td><input type="radio" required name="opcion5" value="B" @if($revision->opcion5 == 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion5" value="M" @if($revision->opcion5 == 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion5" value="NA" @if($revision->opcion5 == 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>EPS-ARP-AFP</td>
                                            <td><input type="radio" required name="opcion6" value="B" @if($revision->opcion6 == 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion6" value="M" @if($revision->opcion6 == 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion6" value="NA" @if($revision->opcion6 == 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Certificado de manejo (vigente)</td>
                                            <td><input type="radio" required name="opcion7" value="B" @if($revision->opcion7 == 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion7" value="M" @if($revision->opcion7 == 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion7" value="NA" @if($revision->opcion7 == 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <th>ESTADO MECANICO</th>
                                        </tr>
                                        <tr>
                                            <td>Niveles de fluido</td>
                                            <td><input type="radio" required name="opcion8" value="B" @if($revision->opcion8 == 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion8" value="M" @if($revision->opcion8 == 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion8" value="NA" @if($revision->opcion8 == 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Estado y tensión de correas</td>
                                            <td><input type="radio" required name="opcion9" value="B" @if($revision->opcion9 == 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion9" value="M" @if($revision->opcion9 == 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion9" value="NA" @if($revision->opcion9 == 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Estado y sujeción de las mangueras</td>
                                            <td><input type="radio" required name="opcion10" value="B" @if($revision->opcion10 == 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion10" value="M" @if($revision->opcion10 == 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion10" value="NA" @if($revision->opcion10 == 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Fuga de fluidos</td>
                                            <td><input type="radio" required name="opcion11" value="B" @if($revision->opcion11 == 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion11" value="M" @if($revision->opcion11 == 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion11" value="NA" @if($revision->opcion11 == 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Estado y sujeción de la bateria ( comes y cables )</td>
                                            <td><input type="radio" required name="opcion12" value="B" @if($revision->opcion12 == 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion12" value="M" @if($revision->opcion12 == 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion12" value="NA" @if($revision->opcion12 == 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Freno de servicio</td>
                                            <td><input type="radio" required name="opcion13" value="B" @if($revision->opcion13 == 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion13" value="M" @if($revision->opcion13 == 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion13" value="NA" @if($revision->opcion13 == 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Freno de emergencia</td>
                                            <td><input type="radio" required name="opcion14" value="B" @if($revision->opcion14 == 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion14" value="M" @if($revision->opcion14 == 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion14" value="NA" @if($revision->opcion14 == 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Estado de suspensión</td>
                                            <td><input type="radio" required name="opcion15" value="B" @if($revision->opcion15 == 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion15" value="M" @if($revision->opcion15 == 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion15" value="NA" @if($revision->opcion15 == 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <th>PARTE EXTERNA DEL VEHICULO</th>
                                        </tr>
                                        <tr>
                                            <td>Estado general de latoneria y pintura ( en buen estado, sin rayones, golpes)</td>
                                            <td><input type="radio" required name="opcion16" value="B" @if($revision->opcion16 == 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion16" value="M" @if($revision->opcion16 == 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion16" value="NA" @if($revision->opcion16 == 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Puertas en buen estado (cierre y bloqueo)</td>
                                            <td><input type="radio" required name="opcion17" value="B" @if($revision->opcion17 == 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion17" value="M" @if($revision->opcion17 == 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion17" value="NA" @if($revision->opcion17 == 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Espejo retroviso (izquiedo y derecho) sin roturas, manchas, bien ajustado</td>
                                            <td><input type="radio" required name="opcion18" value="B" @if($revision->opcion18 == 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion18" value="M" @if($revision->opcion18 == 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion18" value="NA" @if($revision->opcion18 == 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Vidrio parabrisas/ vidrios ventanas(sin ropturas/ manchas/ distinciones/ no polarizadas)</td>
                                            <td><input type="radio" required name="opcion19" value="B" @if($revision->opcion19 == 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion19" value="M" @if($revision->opcion19 == 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion19" value="NA" @if($revision->opcion19 == 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <th>PARTE INTERNA DEL VEHICULO</th>
                                        </tr>
                                        <tr>
                                            <td>Cinturón de seguridad en todos los asientos</td>
                                            <td><input type="radio" required name="opcion20" value="B" @if($revision->opcion20 == 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion20" value="M" @if($revision->opcion20 == 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion20" value="NA" @if($revision->opcion20 == 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Airbag</td>
                                            <td><input type="radio" required name="opcion21" value="B" @if($revision->opcion21 == 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion21" value="M" @if($revision->opcion21 == 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion21" value="NA" @if($revision->opcion21 == 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Podios y mandos</td>
                                            <td><input type="radio" required name="opcion22" value="B" @if($revision->opcion22 == 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion22" value="M" @if($revision->opcion22 == 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion22" value="NA" @if($revision->opcion22 == 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Pedales y mandos</td>
                                            <td><input type="radio" required name="opcion23" value="B" @if($revision->opcion23 == 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion23" value="M" @if($revision->opcion23 == 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion23" value="NA" @if($revision->opcion23 == 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Indicadores de tableros</td>
                                            <td><input type="radio" required name="opcion24" value="B" @if($revision->opcion24 == 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion24" value="M" @if($revision->opcion24 == 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion24" value="NA" @if($revision->opcion24 == 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Estado de tapiceria</td>
                                            <td><input type="radio" required name="opcion25" value="B" @if($revision->opcion25 == 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion25" value="M" @if($revision->opcion25 == 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion25" value="NA" @if($revision->opcion25 == 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Luz de techo</td>
                                            <td><input type="radio" required name="opcion26" value="B" @if($revision->opcion26 == 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion26" value="M" @if($revision->opcion26 == 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion26" value="NA" @if($revision->opcion26 == 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Parasoles sujeción y estado</td>
                                            <td><input type="radio" required name="opcion27" value="B" @if($revision->opcion27== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion27" value="M" @if($revision->opcion27== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion27" value="NA" @if($revision->opcion27== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Aire acondicionado del vehiculo</td>
                                            <td><input type="radio" required name="opcion28" value="B" @if($revision->opcion28== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion28" value="M" @if($revision->opcion28== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion28" value="NA" @if($revision->opcion28== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <th>LUCES DEL VEHICULO</th>
                                        </tr>
                                        <tr>
                                            <td>Frontales</td>
                                            <td><input type="radio" required name="opcion29" value="B" @if($revision->opcion29== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion29" value="M" @if($revision->opcion29== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion29" value="NA" @if($revision->opcion29== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Direccionales delanteras y parqueo</td>
                                            <td><input type="radio" required name="opcion30" value="B" @if($revision->opcion30== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion30" value="M" @if($revision->opcion30== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion30" value="NA" @if($revision->opcion30== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Direccionales trasera y de parqueo</td>
                                            <td><input type="radio" required name="opcion31" value="B" @if($revision->opcion31== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion31" value="M" @if($revision->opcion31== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion31" value="NA" @if($revision->opcion31== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>De stop y de señal trasera</td>
                                            <td><input type="radio" required name="opcion32" value="B" @if($revision->opcion32== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion32" value="M" @if($revision->opcion32== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion32" value="NA" @if($revision->opcion32== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>luz y alarma de reversa</td>
                                            <td><input type="radio" required name="opcion33" value="B" @if($revision->opcion33== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion33" value="M" @if($revision->opcion33== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion33" value="NA" @if($revision->opcion33== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>ASPECTO A REVISAR EN EL VEHICULO</th>
                                        </tr>
                                        <tr>
                                            <th>EQUIPO DE PREVENCION</th>
                                        </tr>
                                        <tr>
                                            <td>Gato, cruceta, Señales de carretera en forma de triangulo. Dos tacos para bloqueo, linterna de funcionamiento</td>
                                            <td><input type="radio" required name="opcion34" value="B" @if($revision->opcion34 == 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion34" value="M" @if($revision->opcion34 == 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion34" value="NA" @if($revision->opcion34 == 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Botiquin del vehiculo, extintor</td>
                                            <td><input type="radio" required name="opcion35" value="B" @if($revision->opcion35 == 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion35" value="M" @if($revision->opcion35 == 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion35" value="NA" @if($revision->opcion35 == 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Caja de herramientas (alicate, destornilladores, llave de expacion y fijas)</td>
                                            <td><input type="radio" required name="opcion36" value="B" @if($revision->opcion36== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion36" value="M" @if($revision->opcion36== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion36" value="NA" @if($revision->opcion36== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Con mas de 5mm de laboratorio tip A/T</td>
                                            <td><input type="radio" required name="opcion64" value="B" @if($revision->opcion64== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion64" value="M" @if($revision->opcion64== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion64" value="NA" @if($revision->opcion64== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Rines, pernos completos y ajustados</td>
                                            <td><input type="radio" required name="opcion37" value="B" @if($revision->opcion37== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion37" value="M" @if($revision->opcion37== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion37" value="NA" @if($revision->opcion37== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Llantas de repuesto/ rin (en buen estado o inflada) con mas de 5mm de laborado tipo A/T</td>
                                            <td><input type="radio" required name="opcion38" value="B" @if($revision->opcion38== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion38" value="M" @if($revision->opcion38== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion38" value="NA" @if($revision->opcion38== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <th>UNIDAD OPERATIVA</th>
                                        </tr>
                                        <tr>
                                            <td>Luces de emergencia</td>
                                            <td><input type="radio" required name="opcion39" value="B" @if($revision->opcion39== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion39" value="M" @if($revision->opcion39== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion39" value="NA" @if($revision->opcion39== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Baliza delantera (luces led)</td>
                                            <td><input type="radio" required name="opcion40" value="B" @if($revision->opcion40== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion40" value="M" @if($revision->opcion40== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion40" value="NA" @if($revision->opcion40== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Luces frontal intermitentes</td>
                                            <td><input type="radio" required name="opcion41" value="B" @if($revision->opcion41== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion41" value="M" @if($revision->opcion41== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion41" value="NA" @if($revision->opcion41== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Luces laterales blancas</td>
                                            <td><input type="radio" required name="opcion42" value="B" @if($revision->opcion42== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion42" value="M" @if($revision->opcion42== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion42" value="NA" @if($revision->opcion42== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Luces laterales rojas intermitentes</td>
                                            <td><input type="radio" required name="opcion43" value="B" @if($revision->opcion43== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion43" value="M" @if($revision->opcion43== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion43" value="NA" @if($revision->opcion43== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Luces trasera intermitentes</td>
                                            <td><input type="radio" required name="opcion44" value="B" @if($revision->opcion44== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion44" value="M" @if($revision->opcion44== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion44" value="NA" @if($revision->opcion44== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Exploradora antiniebla</td>
                                            <td><input type="radio" required name="opcion45" value="B" @if($revision->opcion45== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion45" value="M" @if($revision->opcion45== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion45" value="NA" @if($revision->opcion45== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Baliza trasera</td>
                                            <td><input type="radio" required name="opcion46" value="B" @if($revision->opcion46== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion46" value="M" @if($revision->opcion46== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion46" value="NA" @if($revision->opcion46== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <th>PARTE EXTERNA DE LA UNIDAD</th>
                                        </tr>
                                        <tr>
                                            <td>Puerta lateral (estado y cierre)</td>
                                            <td><input type="radio" required name="opcion47" value="B" @if($revision->opcion47== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion47" value="M" @if($revision->opcion47== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion47" value="NA" @if($revision->opcion47== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Puerta trasera (estado y cierre)</td>
                                            <td><input type="radio" required name="opcion48" value="B" @if($revision->opcion48== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion48" value="M" @if($revision->opcion48== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion48" value="NA" @if($revision->opcion48== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Estribo de acceso con piso deslizante</td>
                                            <td><input type="radio" required name="opcion49" value="B" @if($revision->opcion49== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion49" value="M" @if($revision->opcion49== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion49" value="NA" @if($revision->opcion49== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <th>EQUIPO BASICO</th>
                                        </tr>
                                        <tr>
                                            <td>Balas centrales de oxigeno</td>
                                            <td><input type="radio" required name="opcion50" value="B" @if($revision->opcion50== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion50" value="M" @if($revision->opcion50== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion50" value="NA" @if($revision->opcion50== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>camilla principal con bala de oxigeno portatil</td>
                                            <td><input type="radio" required name="opcion51" value="B" @if($revision->opcion51== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion51" value="M" @if($revision->opcion51== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion51" value="NA" @if($revision->opcion51== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Tabla rigida</td>
                                            <td><input type="radio" required name="opcion52" value="B" @if($revision->opcion52== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion52" value="M" @if($revision->opcion52== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion52" value="NA" @if($revision->opcion52== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Tabla de media espinal</td>
                                            <td><input type="radio" required name="opcion53" value="B" @if($revision->opcion53== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion53" value="M" @if($revision->opcion53== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion53" value="NA" @if($revision->opcion53== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Lampara de luz fria</td>
                                            <td><input type="radio" required name="opcion54" value="B" @if($revision->opcion54== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion54" value="M" @if($revision->opcion54== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion54" value="NA" @if($revision->opcion54== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Silla cabecera de paciente con cinturon de 3 puntos</td>
                                            <td><input type="radio" required name="opcion55" value="B" @if($revision->opcion55== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion55" value="M" @if($revision->opcion55== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion55" value="NA" @if($revision->opcion55== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Gabinetes para insumos (quirurgicos circulatorio, respiratorio. pediatrico)</td>
                                            <td><input type="radio" required name="opcion56" value="B" @if($revision->opcion56== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion56" value="M" @if($revision->opcion56== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion56" value="NA" @if($revision->opcion56== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Aspirador de secreciones</td>
                                            <td><input type="radio" required name="opcion57" value="B" @if($revision->opcion57== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion57" value="M" @if($revision->opcion57== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion57" value="NA" @if($revision->opcion57== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Tablero y caja de sistema electrico</td>
                                            <td><input type="radio" required name="opcion58" value="B" @if($revision->opcion58== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion58" value="M" @if($revision->opcion58== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion58" value="NA" @if($revision->opcion58== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Tomas de 12 voltios</td>
                                            <td><input type="radio" required name="opcion59" value="B" @if($revision->opcion59== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion59" value="M" @if($revision->opcion59== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion59" value="NA" @if($revision->opcion59== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Caja de corrientes de luces externas</td>
                                            <td><input type="radio" required name="opcion60" value="B" @if($revision->opcion60== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion60" value="M" @if($revision->opcion60== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion60" value="NA" @if($revision->opcion60== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Caja de control de tonos</td>
                                            <td><input type="radio" required name="opcion61" value="B" @if($revision->opcion61== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion61" value="M" @if($revision->opcion61== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion61" value="NA" @if($revision->opcion61== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Aire acondicionada del vehiculo</td>
                                            <td><input type="radio" required name="opcion62" value="B" @if($revision->opcion62== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion62" value="M" @if($revision->opcion62== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion62" value="NA" @if($revision->opcion62== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Extractor de olores</td>
                                            <td><input type="radio" required name="opcion63" value="B" @if($revision->opcion63== 'B') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion63" value="M" @if($revision->opcion63== 'M') {{'checked'}} @endif></td>
                                            <td><input type="radio" required name="opcion63" value="NA" @if($revision->opcion63== 'NA') {{'checked'}} @endif></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-principal">Editar</button>
                        <button type="submit" class="btn btn-default float-right">Cancel</button>
                    </div>
                    <!-- /.card-footer -->
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
@endsection