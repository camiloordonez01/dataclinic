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
                                <th>Numero</th>
                                <th>Fecha</th>
                                <th>Fugas</th>
                                <th>Abolladura</th>
                                <th>Nivel</th>
                                <th>Cierre</th>
                                <th>Responsable</th>
                                <th>firma</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datos as $dato)
                            <tr>
                                <td>{{$dato->numeroCilindro}}</td>
                                <td>{{$dato->fecha}}</td>
                                <td> @if($dato->fugas==1){{'Si'}}@else {{'No'}} @endif</td>
                                <td>@if($dato->abolladura==1){{'Si'}}@else {{'No'}} @endif</td>
                                <td>@if($dato->nivelAdecuado==1){{'Si'}}@else {{'No'}} @endif</td>
                                <td>@if($dato->cierreValvula==1){{'Si'}}@else {{'No'}} @endif</td>
                                <td>{{$dato->nombres}} {{$dato->apellidos}}</td>
                                <td><img src="@if (!($dato->firma == '')){{ asset('files/oxigenos/'.$dato->firma) }} @endif" width="100"></td>
                                <td>
                                    @can('oxigeno.edit')
                                    <a class="btn btn-info btn-sm" href="{{URL::action('OxigenoController@edit',$dato->id)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    @endcan
                                    @can('oxigeno.destroy')
                                    <a class="btn btn-danger btn-sm" href="javascript:void(0)" data-toggle="modal" data-target="#modal-warning-{{$dato->id}}">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                    
                                    <div class="modal fade show" id="modal-warning-{{$dato->id}}" aria-modal="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content modal-principal">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Eliminar registro de oxigeno</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                {{Form::Open(array('action'=>array('OxigenoController@destroy',$dato->id),'method'=>'delete'))}}
                                                    <div class="modal-body">
                                                        <p class="text-center">Confirme si desea eliminar el regitro de oxigeno con fecha {{$dato->fecha}} y numero de cilindro {{$dato->numeroCilindro}}</p>
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
                                <th>Numero</th>
                                <th>Fecha</th>
                                <th>Fugas</th>
                                <th>Abolladura</th>
                                <th>Nivel</th>
                                <th>Cierre</th>
                                <th>Responsable</th>
                                <th>Firma</th>
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
                            <div class="form-group">
                                <label for="" class="w-100">Generar informe</label>
                                <select id="mes" name="mes" class="form-control w-50 float-left mr-3">
                                    <option value="" disabled selected>Elejir mes</option>
                                    <option value="Enero">Enero</option>
                                    <option value="Febrero">Febrero</option>
                                    <option value="Marzo">Marzo</option>
                                    <option value="Abril">Abril</option>
                                    <option value="Mayo">Mayo</option>
                                    <option value="Junio">Junio</option>
                                    <option value="Julio">Julio</option>
                                    <option value="Agosto">Agosto</option>
                                    <option value="Septiembre">Septiembre</option>
                                    <option value="Octubre">Octubre</option>
                                    <option value="Noviembre">Noviembre</option>
                                    <option value="Diciembre">Diciembre</option>
                                </select>
                                <a href="#" id="generarPdf" target="_blank" class="btn btn-principal float-left">Generar</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $('#mes').change(function(){
        $('#generarPdf').attr('href','oxigeno/generatePdf/'+$(this).val());
    });
</script>
@endsection