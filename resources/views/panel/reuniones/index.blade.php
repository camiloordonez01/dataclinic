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
                                <th>Id</th>
                                <th>Tema</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Contenido</th>
                                <th>Observaciones</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reuniones as $reunion)
                            <tr>
                                <td>{{$reunion->id}}</td>
                                <td>{{$reunion->tema}}</td>
                                <td>{{$reunion->fecha}}</td>
                                <td>{{$reunion->hora}}</td>
                                <td>{{$reunion->contenido}}</td>
                                <td>{{$reunion->observaciones}}</td>
                                <td>
                                    @can('reuniones.show')
                                    <a class="btn btn-success btn-sm" href="{{URL::action('ReunionesController@show',$reunion->id)}}">
                                        <i class="fas fa-eye">
                                        </i>
                                        Ver
                                    </a>
                                    @endcan
                                    @can('reuniones.edit')
                                    <a class="btn btn-info btn-sm" href="{{URL::action('ReunionesController@edit',$reunion->id)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    @endcan
                                    @can('reuniones.destroy')
                                    <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modal-warning-{{$reunion->id}}">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                    
                                    <div class="modal fade show" id="modal-warning-{{$reunion->id}}" aria-modal="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content modal-principal">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Eliminar reunion</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                {{Form::Open(array('action'=>array('ReunionesController@destroy',$reunion->id),'method'=>'delete'))}}
                                                    <div class="modal-body">
                                                        <p class="text-center">Confirme si desea eliminar la reunion con fecha {{$reunion->fecha}} y tema {{$reunion->tema}}</p>
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
                                    <a class="btn btn-secondary btn-sm" href="reuniones/generatePdf/{{$reunion->id}}">
                                        <i class="fas fa-file-pdf"></i>
                                        Pdf
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Tema</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Contenido</th>
                                <th>Observaciones</th>
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