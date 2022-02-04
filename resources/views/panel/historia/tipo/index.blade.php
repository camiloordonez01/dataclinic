@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <h3 class="text-center">Agregar un tipo de servicio</h3>
                            {!!Form::open(array('url'=> 'historia/tipo/store','method'=>'POST','autocomplete'=>'off'))!!}
                            {{Form::token()}}
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre del nuevo tipo" required>
                                </div>
                                <div class="form-check col-md-12 text-right">
                                    <input class="form-check-input" type="checkbox" name="encuesta">
                                    <label class="form-check-label">¿Llevara encuesta?</label>
                                </div>
                                <div class="form-group col-md-12 text-right">
                                    <button type="submit" class="btn btn-principal mt-4 float-right">Agregar</button>
                                </div>
                            </div>
                            {!!Form::close()!!}
                        </div>
                </div>
            </div>
            <div class="col-8 mx-auto">
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
                                <th>Nombre</th>
                                <th>Encuesta</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($datos as $dato)
                            <tr>
                                <td>{{$dato->nombre}}</td>
                                <td>@if($dato->encuesta==1){{'Si'}}@else {{'No'}} @endif</td>
                                <td>
                                    @can('historia.tipo.destroy')
                                        <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modal-warning-{{$dato->id}}">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                        <div class="modal fade show" id="modal-warning-{{$dato->id}}" aria-modal="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content modal-principal">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Eliminar tipo</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    {{Form::Open(array('action'=>array('TipoHistoriaController@destroy',$dato->id),'method'=>'delete'))}}
                                                        <div class="modal-body">
                                                            <p class="text-center">Confirme si desea eliminar el tipo {{$dato->nombre}}</p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-outline-light btn-principal">Confirmar</button>
                                                        </div>
                                                    {{Form::Close()}}
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Encuesta</th>
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
@endsection