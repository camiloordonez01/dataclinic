@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="/ambulancias/control/create" class="btn btn-primary float-right mb-3">Crear <i class="fas fa-plus"></i></a>
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
                                <th>Fecha</th>
                                <th>Empresa</th>
                                <th>Placa</th>
                                <th>Servicios</th>
                                <th>Inspector</th>
                                <th>Razon</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datos as $dato)
                            <tr>
                                <td>{{$dato->fecha}}</td>
                                <td>{{$dato->empresa}}</td>
                                <td>{{$dato->placa}}</td>
                                <td>{{$dato->servicios}}</td>
                                <td>{{$dato->inspector}}</td>
                                <td>{{$dato->razon}}</td>
                                <td>
                                    @can('controles.edit')
                                    <a class="btn btn-info btn-sm" href="{{URL::action('AmbulanciasControlController@edit',$dato->id)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    @endcan
                                    @can('controles.destroy')
                                    <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modal-warning-{{$dato->id}}">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                    
                                    <div class="modal fade show" id="modal-warning-{{$dato->id}}" aria-modal="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content modal-principal">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Eliminar control ambulancia</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                {{Form::Open(array('action'=>array('AmbulanciasControlController@destroy',$dato->id),'method'=>'delete'))}}
                                                    <div class="modal-body">
                                                        <p class="text-center">Confirme si desea eliminar el control de la ambulancia con placa {{$dato->placa}}</p>
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
                                    <a class="btn btn-secondary btn-sm" href="/ambulancias/control/generatePdf/{{$dato->id}}">
                                        <i class="fas fa-file-pdf"></i>
                                        Pdf
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Fecha</th>
                                <th>Empresa</th>
                                <th>Placa</th>
                                <th>Servicios</th>
                                <th>Inspector</th>
                                <th>Razon</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
            <div class="col-sm-10 col-md-8"></div>
            <div class="col-sm-2 col-md-4 float-right">
                <div class="card">
                    <div class="card-body">
                        <form action="/ambulancias/control/generateAllPdf" method="GET">
                            <h4 class="text-center">Generar conglomerado de Pdf</h4>
                            <div class="form-group">
                                <label>Fecha inicio</label>
                                <input class="form-control" type="date" name="fechaInicio" required>
                            </div>
                            <div class="form-group">
                                <label>Fecha fin</label>
                                <input class="form-control" type="date" name="fechaFin" required>
                            </div>
                            <button type="submit" class="btn btn-principal">Generar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection