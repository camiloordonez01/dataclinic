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
                                <th>Ambulancia</th>
                                <th>Mes</th>
                                <th>Dia</th>
                                <th>Hora</th>
                                <th>Desinfectante</th>
                                <th>Motivo</th>
                                <th>Firma</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datos as $dato)
                            <tr>
                                <td>{{$dato->ambulancia}}</td>
                                <td>{{date("F", strtotime($dato->fecha))}}</td>
                                <td>{{date("d", strtotime($dato->fecha))}}</td>
                                <td>{{$dato->hora}}</td>
                                <td>{{$dato->desinfectante}}</td>
                                <td>{{$dato->motivo}}</td>
                                <td><img src="@if (!($dato->firma == '')){{ asset('files/desinfeccion/'.$dato->firma) }} @endif" width="100"></td>
                                <td>
                                    @can('desinfectante.edit')
                                    <a class="btn btn-info btn-sm" href="{{URL::action('DesinfeccionAmbulanciasController@edit',$dato->id)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    @endcan
                                    @can('desinfectante.destroy')
                                    <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modal-warning-{{$dato->id}}">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                    
                                    <div class="modal fade show" id="modal-warning-{{$dato->id}}" aria-modal="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content modal-principal">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Eliminar registro de desinfeccion de ambulancias</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                {{Form::Open(array('action'=>array('DesinfeccionAmbulanciasController@destroy',$dato->id),'method'=>'delete'))}}
                                                    <div class="modal-body">
                                                        <p class="text-center">Confirme si desea eliminar el registro de desinfeccion de ambulancias con fecha {{$dato->fecha}}</p>
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
                                <th>Mes</th>
                                <th>Dia</th>
                                <th>Hora</th>
                                <th>Desinfectante</th>
                                <th>Motivo</th>
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
                                <select id="mes" name="mes" class="form-control w-100 float-left mr-3">
                                    <option value="" disabled selected>Elejir mes</option>
                                    <option value="Enero" data="{{$observaciones['01']}}">Enero</option>
                                    <option value="Febrero" data="{{$observaciones['02']}}">Febrero</option>
                                    <option value="Marzo" data="{{$observaciones['03']}}">Marzo</option>
                                    <option value="Abril" data="{{$observaciones['04']}}">Abril</option>
                                    <option value="Mayo" data="{{$observaciones['05']}}">Mayo</option>
                                    <option value="Junio" data="{{$observaciones['06']}}">Junio</option>
                                    <option value="Julio" data="{{$observaciones['07']}}">Julio</option>
                                    <option value="Agosto" data="{{$observaciones['08']}}">Agosto</option>
                                    <option value="Septiembre" data="{{$observaciones['09']}}">Septiembre</option>
                                    <option value="Octubre" data="{{$observaciones['10']}}">Octubre</option>
                                    <option value="Noviembre" data="{{$observaciones['11']}}">Noviembre</option>
                                    <option value="Diciembre" data="{{$observaciones['12']}}">Diciembre</option>
                                </select>
                                <label for="" class="w-100 pt-3 ">Observacion</label>
                                <textarea id="observacionText" rows="5" class="form-control" placeholder="Al seleccionar un mes se carga las observaciones. Nota: Si desea agregar o modificarlas en este mismo recuadro lo puede hacer"></textarea>
                                <a href="#" id="generarPdf" target="_blank" class="btn btn-principal float-left mt-3 disabled">Generar</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $('#mes').change(function(){
        var selectBox = document.getElementById("mes");
        var selectedValue = selectBox.options[selectBox.selectedIndex].getAttribute("data");
        $('#observacionText').val(selectedValue);
        $('#generarPdf').removeClass('disabled');
        $('#generarPdf').attr('href','desinfeccion/generatePdf/'+$(this).val()+'?observacion='+$('#observacionText').val());
    });
    $('#observacionText').keyup(function(){
        $('#generarPdf').attr('href','desinfeccion/generatePdf/'+$('#mes').val()+'?observacion='+$('#observacionText').val());
    });
</script>
@endsection