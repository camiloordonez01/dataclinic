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
                    <h3 class="card-title">Registrar control Ambulancia</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!!Form::open(array('url'=> 'ambulancias/control/store','method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}
                    <div class="card-body">
                        <h4 class="text-center">Datos iniciales</h4>
                        <div class="row"> 
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="fecha">Fecha</label>
                                    <input type="date" class="form-control" name="fecha" id="fecha" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="empresa">Empresa</label>
                                    <input type="text" class="form-control" name="empresa" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="placa">Placa</label>
                                    <input type="text" class="form-control" name="placa" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="movil">Servicio</label>
                                    <br>
                                    <input type="radio" required name="servicio" value="PUBLICO" checked>
                                    <label for="PUBLICO"  class="mr-3">PUBLICO</label>
                                    <input type="radio" required name="servicio" value="PRIVADO">
                                    <label for="PRIVADO">PRIVADO</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="inspector">Inspeccionado por:</label>
                                    <input type="text" class="form-control" name="inspector" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="razon">Razon</label>
                                    <input type="text" class="form-control" name="razon" required>
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
                                            <td><input type="radio" required name="opcion1" value="B"></td>
                                            <td><input type="radio" required name="opcion1" value="M"></td>
                                            <td><input type="radio" required name="opcion1" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>SOAT</td>
                                            <td><input type="radio" required name="opcion2" value="B"></td>
                                            <td><input type="radio" required name="opcion2" value="M"></td>
                                            <td><input type="radio" required name="opcion2" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Seguro ( legible y disponible en el vehiculo ) </td>
                                            <td><input type="radio" required name="opcion3" value="B"></td>
                                            <td><input type="radio" required name="opcion3" value="M"></td>
                                            <td><input type="radio" required name="opcion3" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Revision tecnicomecanica y de gases ( legible y disponible en el vehiculo ) </td>
                                            <td><input type="radio" required name="opcion4" value="B"></td>
                                            <td><input type="radio" required name="opcion4" value="M"></td>
                                            <td><input type="radio" required name="opcion4" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <th>DOCUMENTACIÓN DEL CONDUCTOR</th>
                                        </tr>
                                        <tr>
                                            <td>Licencia de conducion ( legal y vigente )</td>
                                            <td><input type="radio" required name="opcion5" value="B"></td>
                                            <td><input type="radio" required name="opcion5" value="M"></td>
                                            <td><input type="radio" required name="opcion5" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>EPS-ARP-AFP</td>
                                            <td><input type="radio" required name="opcion6" value="B"></td>
                                            <td><input type="radio" required name="opcion6" value="M"></td>
                                            <td><input type="radio" required name="opcion6" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Certificado de manejo (vigente)</td>
                                            <td><input type="radio" required name="opcion7" value="B"></td>
                                            <td><input type="radio" required name="opcion7" value="M"></td>
                                            <td><input type="radio" required name="opcion7" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <th>ESTADO MECANICO</th>
                                        </tr>
                                        <tr>
                                            <td>Niveles de fluido</td>
                                            <td><input type="radio" required name="opcion8" value="B"></td>
                                            <td><input type="radio" required name="opcion8" value="M"></td>
                                            <td><input type="radio" required name="opcion8" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Estado y tensión de correas</td>
                                            <td><input type="radio" required name="opcion9" value="B"></td>
                                            <td><input type="radio" required name="opcion9" value="M"></td>
                                            <td><input type="radio" required name="opcion9" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Estado y sujeción de las mangueras</td>
                                            <td><input type="radio" required name="opcion10" value="B"></td>
                                            <td><input type="radio" required name="opcion10" value="M"></td>
                                            <td><input type="radio" required name="opcion10" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Fuga de fluidos</td>
                                            <td><input type="radio" required name="opcion11" value="B"></td>
                                            <td><input type="radio" required name="opcion11" value="M"></td>
                                            <td><input type="radio" required name="opcion11" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Estado y sujeción de la bateria ( comes y cables )</td>
                                            <td><input type="radio" required name="opcion12" value="B"></td>
                                            <td><input type="radio" required name="opcion12" value="M"></td>
                                            <td><input type="radio" required name="opcion12" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Freno de servicio</td>
                                            <td><input type="radio" required name="opcion13" value="B"></td>
                                            <td><input type="radio" required name="opcion13" value="M"></td>
                                            <td><input type="radio" required name="opcion13" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Freno de emergencia</td>
                                            <td><input type="radio" required name="opcion14" value="B"></td>
                                            <td><input type="radio" required name="opcion14" value="M"></td>
                                            <td><input type="radio" required name="opcion14" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Estado de suspensión</td>
                                            <td><input type="radio" required name="opcion15" value="B"></td>
                                            <td><input type="radio" required name="opcion15" value="M"></td>
                                            <td><input type="radio" required name="opcion15" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <th>PARTE EXTERNA DEL VEHICULO</th>
                                        </tr>
                                        <tr>
                                            <td>Estado general de latoneria y pintura ( en buen estado, sin rayones, golpes)</td>
                                            <td><input type="radio" required name="opcion16" value="B"></td>
                                            <td><input type="radio" required name="opcion16" value="M"></td>
                                            <td><input type="radio" required name="opcion16" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Puertas en buen estado (cierre y bloqueo)</td>
                                            <td><input type="radio" required name="opcion17" value="B"></td>
                                            <td><input type="radio" required name="opcion17" value="M"></td>
                                            <td><input type="radio" required name="opcion17" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Espejo retroviso (izquiedo y derecho) sin roturas, manchas, bien ajustado</td>
                                            <td><input type="radio" required name="opcion18" value="B"></td>
                                            <td><input type="radio" required name="opcion18" value="M"></td>
                                            <td><input type="radio" required name="opcion18" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Vidrio parabrisas/ vidrios ventanas(sin ropturas/ manchas/ distinciones/ no polarizadas)</td>
                                            <td><input type="radio" required name="opcion19" value="B"></td>
                                            <td><input type="radio" required name="opcion19" value="M"></td>
                                            <td><input type="radio" required name="opcion19" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <th>PARTE INTERNA DEL VEHICULO</th>
                                        </tr>
                                        <tr>
                                            <td>Cinturón de seguridad en todos los asientos</td>
                                            <td><input type="radio" required name="opcion20" value="B"></td>
                                            <td><input type="radio" required name="opcion20" value="M"></td>
                                            <td><input type="radio" required name="opcion20" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Airbag</td>
                                            <td><input type="radio" required name="opcion21" value="B"></td>
                                            <td><input type="radio" required name="opcion21" value="M"></td>
                                            <td><input type="radio" required name="opcion21" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Podios y mandos</td>
                                            <td><input type="radio" required name="opcion22" value="B"></td>
                                            <td><input type="radio" required name="opcion22" value="M"></td>
                                            <td><input type="radio" required name="opcion22" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Pedales y mandos</td>
                                            <td><input type="radio" required name="opcion23" value="B"></td>
                                            <td><input type="radio" required name="opcion23" value="M"></td>
                                            <td><input type="radio" required name="opcion23" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Indicadores de tableros</td>
                                            <td><input type="radio" required name="opcion24" value="B"></td>
                                            <td><input type="radio" required name="opcion24" value="M"></td>
                                            <td><input type="radio" required name="opcion24" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Estado de tapiceria</td>
                                            <td><input type="radio" required name="opcion25" value="B"></td>
                                            <td><input type="radio" required name="opcion25" value="M"></td>
                                            <td><input type="radio" required name="opcion25" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Luz de techo</td>
                                            <td><input type="radio" required name="opcion26" value="B"></td>
                                            <td><input type="radio" required name="opcion26" value="M"></td>
                                            <td><input type="radio" required name="opcion26" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Parasoles sujeción y estado</td>
                                            <td><input type="radio" required name="opcion27" value="B"></td>
                                            <td><input type="radio" required name="opcion27" value="M"></td>
                                            <td><input type="radio" required name="opcion27" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Aire acondicionado del vehiculo</td>
                                            <td><input type="radio" required name="opcion28" value="B"></td>
                                            <td><input type="radio" required name="opcion28" value="M"></td>
                                            <td><input type="radio" required name="opcion28" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <th>LUCES DEL VEHICULO</th>
                                        </tr>
                                        <tr>
                                            <td>Frontales</td>
                                            <td><input type="radio" required name="opcion29" value="B"></td>
                                            <td><input type="radio" required name="opcion29" value="M"></td>
                                            <td><input type="radio" required name="opcion29" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Direccionales delanteras y parqueo</td>
                                            <td><input type="radio" required name="opcion30" value="B"></td>
                                            <td><input type="radio" required name="opcion30" value="M"></td>
                                            <td><input type="radio" required name="opcion30" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Direccionales trasera y de parqueo</td>
                                            <td><input type="radio" required name="opcion31" value="B"></td>
                                            <td><input type="radio" required name="opcion31" value="M"></td>
                                            <td><input type="radio" required name="opcion31" value="NA"></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>De stop y de señal trasera</td>
                                            <td><input type="radio" required name="opcion32" value="B"></td>
                                            <td><input type="radio" required name="opcion32" value="M"></td>
                                            <td><input type="radio" required name="opcion32" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>luz y alarma de reversa</td>
                                            <td><input type="radio" required name="opcion33" value="B"></td>
                                            <td><input type="radio" required name="opcion33" value="M"></td>
                                            <td><input type="radio" required name="opcion33" value="NA"></td>
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
                                            <td><input type="radio" required name="opcion34" value="B"></td>
                                            <td><input type="radio" required name="opcion34" value="M"></td>
                                            <td><input type="radio" required name="opcion34" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Botiquin del vehiculo, extintor</td>
                                            <td><input type="radio" required name="opcion35" value="B"></td>
                                            <td><input type="radio" required name="opcion35" value="M"></td>
                                            <td><input type="radio" required name="opcion35" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Caja de herramientas (alicate, destornilladores, llave de expacion y fijas)</td>
                                            <td><input type="radio" required name="opcion36" value="B"></td>
                                            <td><input type="radio" required name="opcion36" value="M"></td>
                                            <td><input type="radio" required name="opcion36" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Con mas de 5mm de laboratorio tip A/T</td>
                                            <td><input type="radio" required name="opcion64" value="B"></td>
                                            <td><input type="radio" required name="opcion64" value="M"></td>
                                            <td><input type="radio" required name="opcion64" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Rines, pernos completos y ajustados</td>
                                            <td><input type="radio" required name="opcion37" value="B"></td>
                                            <td><input type="radio" required name="opcion37" value="M"></td>
                                            <td><input type="radio" required name="opcion37" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Llantas de repuesto/ rin (en buen estado o inflada) con mas de 5mm de laborado tipo A/T</td>
                                            <td><input type="radio" required name="opcion38" value="B"></td>
                                            <td><input type="radio" required name="opcion38" value="M"></td>
                                            <td><input type="radio" required name="opcion38" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <th>UNIDAD OPERATIVA</th>
                                        </tr>
                                        <tr>
                                            <td>Luces de emergencia</td>
                                            <td><input type="radio" required name="opcion39" value="B"></td>
                                            <td><input type="radio" required name="opcion39" value="M"></td>
                                            <td><input type="radio" required name="opcion39" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Baliza delantera (luces led)</td>
                                            <td><input type="radio" required name="opcion40" value="B"></td>
                                            <td><input type="radio" required name="opcion40" value="M"></td>
                                            <td><input type="radio" required name="opcion40" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Luces frontal intermitentes</td>
                                            <td><input type="radio" required name="opcion41" value="B"></td>
                                            <td><input type="radio" required name="opcion41" value="M"></td>
                                            <td><input type="radio" required name="opcion41" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Luces laterales blancas</td>
                                            <td><input type="radio" required name="opcion42" value="B"></td>
                                            <td><input type="radio" required name="opcion42" value="M"></td>
                                            <td><input type="radio" required name="opcion42" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Luces laterales rojas intermitentes</td>
                                            <td><input type="radio" required name="opcion43" value="B"></td>
                                            <td><input type="radio" required name="opcion43" value="M"></td>
                                            <td><input type="radio" required name="opcion43" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Luces trasera intermitentes</td>
                                            <td><input type="radio" required name="opcion44" value="B"></td>
                                            <td><input type="radio" required name="opcion44" value="M"></td>
                                            <td><input type="radio" required name="opcion44" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Exploradora antiniebla</td>
                                            <td><input type="radio" required name="opcion45" value="B"></td>
                                            <td><input type="radio" required name="opcion45" value="M"></td>
                                            <td><input type="radio" required name="opcion45" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Baliza trasera</td>
                                            <td><input type="radio" required name="opcion46" value="B"></td>
                                            <td><input type="radio" required name="opcion46" value="M"></td>
                                            <td><input type="radio" required name="opcion46" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <th>PARTE EXTERNA DE LA UNIDAD</th>
                                        </tr>
                                        <tr>
                                            <td>Puerta lateral (estado y cierre)</td>
                                            <td><input type="radio" required name="opcion47" value="B"></td>
                                            <td><input type="radio" required name="opcion47" value="M"></td>
                                            <td><input type="radio" required name="opcion47" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Puerta trasera (estado y cierre)</td>
                                            <td><input type="radio" required name="opcion48" value="B"></td>
                                            <td><input type="radio" required name="opcion48" value="M"></td>
                                            <td><input type="radio" required name="opcion48" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Estribo de acceso con piso deslizante</td>
                                            <td><input type="radio" required name="opcion49" value="B"></td>
                                            <td><input type="radio" required name="opcion49" value="M"></td>
                                            <td><input type="radio" required name="opcion49" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <th>EQUIPO BASICO</th>
                                        </tr>
                                        <tr>
                                            <td>Balas centrales de oxigeno</td>
                                            <td><input type="radio" required name="opcion50" value="B"></td>
                                            <td><input type="radio" required name="opcion50" value="M"></td>
                                            <td><input type="radio" required name="opcion50" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>camilla principal con bala de oxigeno portatil</td>
                                            <td><input type="radio" required name="opcion51" value="B"></td>
                                            <td><input type="radio" required name="opcion51" value="M"></td>
                                            <td><input type="radio" required name="opcion51" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Tabla rigida</td>
                                            <td><input type="radio" required name="opcion52" value="B"></td>
                                            <td><input type="radio" required name="opcion52" value="M"></td>
                                            <td><input type="radio" required name="opcion52" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Tabla de media espinal</td>
                                            <td><input type="radio" required name="opcion53" value="B"></td>
                                            <td><input type="radio" required name="opcion53" value="M"></td>
                                            <td><input type="radio" required name="opcion53" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Lampara de luz fria</td>
                                            <td><input type="radio" required name="opcion54" value="B"></td>
                                            <td><input type="radio" required name="opcion54" value="M"></td>
                                            <td><input type="radio" required name="opcion54" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Silla cabecera de paciente con cinturon de 3 puntos</td>
                                            <td><input type="radio" required name="opcion55" value="B"></td>
                                            <td><input type="radio" required name="opcion55" value="M"></td>
                                            <td><input type="radio" required name="opcion55" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Gabinetes para insumos (quirurgicos circulatorio, respiratorio. pediatrico)</td>
                                            <td><input type="radio" required name="opcion56" value="B"></td>
                                            <td><input type="radio" required name="opcion56" value="M"></td>
                                            <td><input type="radio" required name="opcion56" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Aspirador de secreciones</td>
                                            <td><input type="radio" required name="opcion57" value="B"></td>
                                            <td><input type="radio" required name="opcion57" value="M"></td>
                                            <td><input type="radio" required name="opcion57" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Tablero y caja de sistema electrico</td>
                                            <td><input type="radio" required name="opcion58" value="B"></td>
                                            <td><input type="radio" required name="opcion58" value="M"></td>
                                            <td><input type="radio" required name="opcion58" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Tomas de 12 voltios</td>
                                            <td><input type="radio" required name="opcion59" value="B"></td>
                                            <td><input type="radio" required name="opcion59" value="M"></td>
                                            <td><input type="radio" required name="opcion59" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Caja de corrientes de luces externas</td>
                                            <td><input type="radio" required name="opcion60" value="B"></td>
                                            <td><input type="radio" required name="opcion60" value="M"></td>
                                            <td><input type="radio" required name="opcion60" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Caja de control de tonos</td>
                                            <td><input type="radio" required name="opcion61" value="B"></td>
                                            <td><input type="radio" required name="opcion61" value="M"></td>
                                            <td><input type="radio" required name="opcion61" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Aire acondicionada del vehiculo</td>
                                            <td><input type="radio" required name="opcion62" value="B"></td>
                                            <td><input type="radio" required name="opcion62" value="M"></td>
                                            <td><input type="radio" required name="opcion62" value="NA"></td>
                                        </tr>
                                        <tr>
                                            <td>Extractor de olores</td>
                                            <td><input type="radio" required name="opcion63" value="B"></td>
                                            <td><input type="radio" required name="opcion63" value="M"></td>
                                            <td><input type="radio" required name="opcion63" value="NA"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-principal">Crear</button>
                        <button type="submit" class="btn btn-default float-right">Cancel</button>
                    </div>
                    <!-- /.card-footer -->
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
<script>
    $('#fecha').val(new Date().toISOString().substr(0,10));
</script>
@endsection