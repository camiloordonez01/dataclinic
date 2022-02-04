@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-sm-12 mx-auto">
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
                    <h3 class="card-title">Editar Ambulancia</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!!Form::model($ambulancia,['method'=>'PUT','route'=>['Ambulancias.update',$ambulancia->id],'enctype'=>'multipart/form-data'])!!}
                {{Form::token()}}
                    <div class="card-body">
                        <h4 class="text-center">Especificaciones tecnicas</h4>
                        <div class="row"> 
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="fechaActualizacion">Fecha creacion</label>
                                    <input type="date" class="form-control" name="fechaActualizacion" id="fecha" required value="{{$ambulancia->fechaActualizacion}}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre del vehiculo</label>
                                    <input type="text" class="form-control" name="nombre" required value="{{$ambulancia->nombre}}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="placa">Placa</label>
                                    <input type="text" class="form-control" name="placa" required value="{{$ambulancia->placa}}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="movil">Movil</label>
                                    <input type="text" class="form-control" name="movil" required value="{{$ambulancia->movil}}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="marca">Marca</label>
                                    <input type="text" class="form-control" name="marca" required value="{{$ambulancia->marca}}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="modelo">Modelo</label>
                                    <input type="text" class="form-control" name="modelo" required value="{{$ambulancia->modelo}}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="tipo_carroceria">Tipo carroceria</label>
                                    <input type="text" class="form-control" name="tipo_carroceria" required value="{{$ambulancia->tipo_carroceria}}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="linea">Linea</label>
                                    <input type="text" class="form-control" name="linea" required value="{{$ambulancia->linea}}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file" class="form-control" name="foto" required accept="image/x-png,image/jpg,image/jpeg" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label for="documentos">Documentos</label>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="customFile">Adjunte uno o varios archivos</label>
                                        <input type="file" name="documentos[]" class="custom-file-input" id="customFile" multiple>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <table class="table table-bordered">
                                    <tbody>
                                        @foreach($documentos as $documento)
                                        <tr id="trSoporte{{$documento->id}}">
                                            <th class="text-center"><h4>Documento {{ $loop->iteration }}</h4></th>
                                            <td class="text-center">
                                                <a href="/files/autos/{{$documento->url}}" target="_blank" class="btn btn-success text-white"><i class="fas fa-eye"></i> Ver</a>
                                                <a type="buttom" class="btn btn-danger text-white" onclick="delSoporte('{{$documento->id}}')"><i class="fas fa-trash-alt"></i> Quitar</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div id="inputsDeleteSoporte"></div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="realizado">Realizado</label>
                                    <input type="text" class="form-control" name="realizado" required value="{{$ambulancia->realizado}}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="revisado">Revisado</label>
                                    <input type="text" class="form-control" name="revisado" required value="{{$ambulancia->revisado}}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="aprovado">Aprobado</label>
                                    <input type="text" class="form-control" name="aprovado" required value="{{$ambulancia->aprovado}}">
                                </div>
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
<script>
    function delSoporte(id){
        console.log(id);
        $("#inputsDeleteSoporte").append('<input type="hidden" name="deleteSoporte[]" value="'+id+'">');
        $("#trSoporte"+id).remove();
    }
</script>
@endsection