@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="ambulancias/create" class="btn btn-primary float-right mb-3">Crear <i class="fas fa-plus"></i></a>
            </div>
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
                                <th>Nombre</th>
                                <th>Placa</th>
                                <th>Movil</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Carroceria</th>
                                <th>Linea</th>
                                <th>Foto</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datos as $dato)
                            <tr>
                                <td>{{$dato->nombre}}</td>
                                <td>{{$dato->placa}}</td>
                                <td>{{$dato->movil}}</td>
                                <td>{{$dato->marca}}</td>
                                <td>{{$dato->modelo}}</td>
                                <td>{{$dato->tipo_carroceria}}</td>
                                <td>{{$dato->linea}}</td>
                                <td><img src="@if (!($dato->foto == '')){{ asset('files/ambulancias/'.$dato->foto) }} @endif" width="100"></td>
                                <td>
                                    @can('ambulancias.edit')
                                    <a class="btn btn-info btn-sm" href="{{URL::action('AmbulanciasController@edit',$dato->id)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    @endcan
                                    @can('ambulancias.destroy')
                                    <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modal-warning-{{$dato->id}}">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                    
                                    <div class="modal fade show" id="modal-warning-{{$dato->id}}" aria-modal="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content modal-principal">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Eliminar ambulancia</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                {{Form::Open(array('action'=>array('AmbulanciasController@destroy',$dato->id),'method'=>'delete'))}}
                                                    <div class="modal-body">
                                                        <p class="text-center">Confirme si desea eliminar la ambulancia con placa {{$dato->placa}}</p>
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
                                    <a class="btn btn-secondary btn-sm" href="ambulancias/generatePdf/{{$dato->id}}">
                                        <i class="fas fa-file-pdf"></i>
                                        Pdf
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Placa</th>
                                <th>Movil</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Carroceria</th>
                                <th>Linea</th>
                                <th>Foto</th>
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