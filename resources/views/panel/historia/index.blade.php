@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
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
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Cedula</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($historias as $historia)
                                <tr>
                                    <td>{{$historia->id}}</td>
                                    <td>{{$historia->documento}}</td>
                                    <td>{{$historia->nombres}}</td>
                                    <td>{{$historia->apellidos}}</td>
                                    <td>{{$historia->fecha}}</td>
                                    <td>
                                        @if($historia->estado == 0)
                                        <small class="badge badge-info">Abierto</small>
                                        @else
                                        <small class="badge badge-success">Cerrado</small>
                                        @endif
                                    </td>
                                    <td>
                                        
                                        @can('historia.show')
                                        <a class="btn btn-success btn-sm" href="{{URL::action('HistoriaController@show',$historia->id)}}">
                                            <i class="fas fa-eye">
                                            </i>
                                            Ver
                                        </a>
                                        @endcan
                                        @if($historia->estado == 0)
                                        @can('historia.edit')
                                        <a class="btn btn-info btn-sm" href="{{URL::action('HistoriaController@edit',$historia->id)}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Terminar
                                        </a>
                                        @endcan
                                        @can('historia.close')
                                        <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#modal-warning-{{$historia->id}}">
                                            <i class="fas fa-times-circle"></i>
                                            Cerrar
                                        </a>
                                        <div class="modal fade show" id="modal-warning-{{$historia->id}}" aria-modal="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content modal-principal">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Cerrar historia</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    {{Form::Open(array('action'=>array('HistoriaController@close',$historia->id),'method'=>'delete'))}}
                                                        <div class="modal-body">
                                                            <p class="text-center">Confirme si desea cerrar la historia {{$historia->id}}</p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary btn-principal">Confirmar</button>
                                                        </div>
                                                    {{Form::Close()}}
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        @endcan
                                        @endif
                                        @if($historia->encuesta==1)
                                        <a class="btn btn-warning btn-sm" href="#" data-toggle="modal" data-target="#modal-encuesta-{{$historia->id}}">
                                            <i class="fas fa-poll-h"></i>
                                            Encuesta
                                        </a>
                                        <div class="modal fade show" id="modal-encuesta-{{$historia->id}}" aria-modal="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content modal-principal">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Encuesta</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    {{Form::Open(array('action'=>array('HistoriaController@encuesta',$historia->id),'method'=>'post'))}}
                                                        @if($encuestas[$historia->id]=='')
                                                        <div class="modal-body">
                                                            <table class="table table-bordered table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">Descripcion</th>
                                                                        <th>Muy bueno</th>
                                                                        <th>Bueno</th>
                                                                        <th>Regular</th>
                                                                        <th>Malo</th>
                                                                        <th>Muy malo</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1. El trato y amabilidad del personal de la Ambulancia fue:</td>
                                                                        <td><input type="radio" name="trato" value="1"></td>
                                                                        <td><input type="radio" name="trato" value="2"></td>
                                                                        <td><input type="radio" name="trato" value="3"></td>
                                                                        <td><input type="radio" name="trato" value="4"></td>
                                                                        <td><input type="radio" name="trato" value="5"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2. La Velocidad y la Seguridad durante su trayecto le pareció:</td>
                                                                        <td><input type="radio" name="velocidad" value="1"></td>
                                                                        <td><input type="radio" name="velocidad" value="2"></td>
                                                                        <td><input type="radio" name="velocidad" value="3"></td>
                                                                        <td><input type="radio" name="velocidad" value="4"></td>
                                                                        <td><input type="radio" name="velocidad" value="5"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3. La comodidad y la higiene de las móviles le parecieron:</td>
                                                                        <td><input type="radio" name="comodidad" value="1"></td>
                                                                        <td><input type="radio" name="comodidad" value="2"></td>
                                                                        <td><input type="radio" name="comodidad" value="3"></td>
                                                                        <td><input type="radio" name="comodidad" value="4"></td>
                                                                        <td><input type="radio" name="comodidad" value="5"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>4. Cómo calificaría su experiencia global del servicio recibido por parte de Ambulancias CAET?</td>
                                                                        <td><input type="radio" name="calificacion" value="1"></td>
                                                                        <td><input type="radio" name="calificacion" value="2"></td>
                                                                        <td><input type="radio" name="calificacion" value="3"></td>
                                                                        <td><input type="radio" name="calificacion" value="4"></td>
                                                                        <td><input type="radio" name="calificacion" value="5"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <h3 class="text-center mt-4 mb-4">¿RECOMENDARIA A SUS FAMILIARES Y AMIGOS NUESTROS SERVICIOS?</h3>
                                                            <div class="row">
                                                                <div class="col-md-3 col-sm-6 text-center">
                                                                    <label for="">Definitivamente SI</label>
                                                                    <input type="radio" name="recomendacion" value="1">
                                                                </div>
                                                                <div class="col-md-3 col-sm-6 text-center">
                                                                    <label for="">Probablemente SI</label>
                                                                    <input type="radio" name="recomendacion" value="2">
                                                                </div>
                                                                <div class="col-md-3 col-sm-6 text-center">
                                                                    <label for="">Definitivamente NO</label>
                                                                    <input type="radio" name="recomendacion" value="3">
                                                                </div>
                                                                <div class="col-md-3 col-sm-6 text-center">
                                                                    <label for="">Probablemente NO</label>
                                                                    <input type="radio" name="recomendacion" value="4">
                                                                </div>
                                                            </div>
                                                            <h4 class="mt-4 mb-4">RECOMENDACIONES Y SUGERENCIAS:</h4>
                                                            <textarea name="sugerencias" class="form-control"></textarea>
                                                            <h4 class="text-center mt-4 mb-4">¡SU OPINION ES MUY IMPORTANTE PARA NOSOTROS!</h4>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="">Nombre:</label>
                                                                        <input type="text" name="nombre" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="">CC:</label>
                                                                        <input type="text" name="cedula" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="">Telefono:</label>
                                                                        <input type="text" name="telefono" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="historia_id" value="{{$historia->id}}">
                                                        </div>
                                                        @else
                                                        <div class="modal-body">
                                                            <table class="table table-bordered table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">Descripcion</th>
                                                                        <th>Muy bueno</th>
                                                                        <th>Bueno</th>
                                                                        <th>Regular</th>
                                                                        <th>Malo</th>
                                                                        <th>Muy malo</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1. El trato y amabilidad del personal de la Ambulancia fue:</td>
                                                                        <td><input type="radio" name="trato" value="1" @if ($encuestas[$historia->id]->trato==1){{'checked'}}@endif></td>
                                                                        <td><input type="radio" name="trato" value="2" @if ($encuestas[$historia->id]->trato==2){{'checked'}}@endif></td>
                                                                        <td><input type="radio" name="trato" value="3" @if ($encuestas[$historia->id]->trato==3){{'checked'}}@endif></td>
                                                                        <td><input type="radio" name="trato" value="4" @if ($encuestas[$historia->id]->trato==4){{'checked'}}@endif></td>
                                                                        <td><input type="radio" name="trato" value="5" @if ($encuestas[$historia->id]->trato==5){{'checked'}}@endif></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2. La Velocidad y la Seguridad durante su trayecto le pareció:</td>
                                                                        <td><input type="radio" name="velocidad" value="1" @if ($encuestas[$historia->id]->velocidad==1){{'checked'}}@endif></td>
                                                                        <td><input type="radio" name="velocidad" value="2" @if ($encuestas[$historia->id]->velocidad==2){{'checked'}}@endif></td>
                                                                        <td><input type="radio" name="velocidad" value="3" @if ($encuestas[$historia->id]->velocidad==3){{'checked'}}@endif></td>
                                                                        <td><input type="radio" name="velocidad" value="4" @if ($encuestas[$historia->id]->velocidad==4){{'checked'}}@endif></td>
                                                                        <td><input type="radio" name="velocidad" value="5" @if ($encuestas[$historia->id]->velocidad==5){{'checked'}}@endif></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3. La comodidad y la higiene de las móviles le parecieron:</td>
                                                                        <td><input type="radio" name="comodidad" value="1" @if ($encuestas[$historia->id]->comodidad==1){{'checked'}}@endif></td>
                                                                        <td><input type="radio" name="comodidad" value="2" @if ($encuestas[$historia->id]->comodidad==2){{'checked'}}@endif></td>
                                                                        <td><input type="radio" name="comodidad" value="3" @if ($encuestas[$historia->id]->comodidad==3){{'checked'}}@endif></td>
                                                                        <td><input type="radio" name="comodidad" value="4" @if ($encuestas[$historia->id]->comodidad==4){{'checked'}}@endif></td>
                                                                        <td><input type="radio" name="comodidad" value="5" @if ($encuestas[$historia->id]->comodidad==5){{'checked'}}@endif></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>4. Cómo calificaría su experiencia global del servicio recibido por parte de Ambulancias CAET?</td>
                                                                        <td><input type="radio" name="calificacion" value="1" @if ($encuestas[$historia->id]->calificacion==1){{'checked'}}@endif></td>
                                                                        <td><input type="radio" name="calificacion" value="2" @if ($encuestas[$historia->id]->calificacion==2){{'checked'}}@endif></td>
                                                                        <td><input type="radio" name="calificacion" value="3" @if ($encuestas[$historia->id]->calificacion==3){{'checked'}}@endif></td>
                                                                        <td><input type="radio" name="calificacion" value="4" @if ($encuestas[$historia->id]->calificacion==4){{'checked'}}@endif></td>
                                                                        <td><input type="radio" name="calificacion" value="5" @if ($encuestas[$historia->id]->calificacion==5){{'checked'}}@endif></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <h3 class="text-center mt-4 mb-4">¿RECOMENDARIA A SUS FAMILIARES Y AMIGOS NUESTROS SERVICIOS?</h3>
                                                            <div class="row">
                                                                <div class="col-md-3 col-sm-6 text-center">
                                                                    <label for="">Definitivamente SI</label>
                                                                    <input type="radio" name="recomendacion" value="1" @if ($encuestas[$historia->id]->recomendacion==1){{'checked'}}@endif>
                                                                </div>
                                                                <div class="col-md-3 col-sm-6 text-center">
                                                                    <label for="">Probablemente SI</label>
                                                                    <input type="radio" name="recomendacion" value="2" @if ($encuestas[$historia->id]->recomendacion==2){{'checked'}}@endif>
                                                                </div>
                                                                <div class="col-md-3 col-sm-6 text-center">
                                                                    <label for="">Definitivamente NO</label>
                                                                    <input type="radio" name="recomendacion" value="3" @if ($encuestas[$historia->id]->recomendacion==3){{'checked'}}@endif>
                                                                </div>
                                                                <div class="col-md-3 col-sm-6 text-center">
                                                                    <label for="">Probablemente NO</label>
                                                                    <input type="radio" name="recomendacion" value="4" @if ($encuestas[$historia->id]->recomendacion==4){{'checked'}}@endif>
                                                                </div>
                                                            </div>
                                                            <h4 class="mt-4 mb-4">RECOMENDACIONES Y SUGERENCIAS:</h4>
                                                            <textarea name="sugerencias" class="form-control">{{$encuestas[$historia->id]->sugerencias}}</textarea>
                                                            <h4 class="text-center mt-4 mb-4">¡SU OPINION ES MUY IMPORTANTE PARA NOSOTROS!</h4>
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="">Nombre:</label>
                                                                        <input type="text" name="nombre" class="form-control" value="{{$encuestas[$historia->id]->nombre}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="">CC:</label>
                                                                        <input type="text" name="cedula" class="form-control" value="{{$encuestas[$historia->id]->cedula}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="">Telefono:</label>
                                                                        <input type="text" name="telefono" class="form-control" value="{{$encuestas[$historia->id]->telefono}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="historia_id" value="{{$historia->id}}">
                                                            <input type="hidden" name="encuesta_id" value="{{$encuestas[$historia->id]->id}}">
                                                        </div>
                                                        @endif
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary btn-principal">Confirmar</button>
                                                        {{Form::Close()}}
                                                            <a href="/historia/paciente/encuesta/descargar/{{$historia->id}}" class="btn btn-success">Descargar</a>
                                                        </div>
                                                    
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>N°</th>
                                    <th>Cedula</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>
<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "order": [[0, 'des']],
    });
  });
</script>
@endsection