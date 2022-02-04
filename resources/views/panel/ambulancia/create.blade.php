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
                    <h3 class="card-title">Registrar Ambulancia</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!!Form::open(array('url'=> 'ambulancias/store','method'=>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data'))!!}
                {{Form::token()}}
                    <div class="card-body">
                        <h4 class="text-center">Especificaciones tecnicas</h4>
                        <div class="row"> 
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="fechaActualizacion">Fecha creacion</label>
                                    <input type="date" class="form-control" name="fechaActualizacion" id="fecha" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre del vehiculo</label>
                                    <input type="text" class="form-control" name="nombre" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="placa">Placa</label>
                                    <input type="text" class="form-control" name="placa" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="movil">Movil</label>
                                    <input type="text" class="form-control" name="movil" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="marca">Marca</label>
                                    <input type="text" class="form-control" name="marca" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="modelo">Modelo</label>
                                    <input type="text" class="form-control" name="modelo" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="tipo_carroceria">Tipo carroceria</label>
                                    <input type="text" class="form-control" name="tipo_carroceria" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="linea">Linea</label>
                                    <input type="text" class="form-control" name="linea" required>
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file" class="form-control" name="foto" required accept="image/x-png,image/jpg,image/jpeg" >
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label for="documentos">Anexar documentos</label>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="customFile">Adjunte uno o varios archivos</label>
                                        <input type="file" name="documentos[]" class="custom-file-input" id="customFile" multiple>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="realizado">Realizado</label>
                                    <input type="text" class="form-control" name="realizado" required value="GE-INNOVA">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="revisado">Revisado</label>
                                    <input type="text" class="form-control" name="revisado" required value="Calidad">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="aprovado">Aprobado</label>
                                    <input type="text" class="form-control" name="aprovado" required value="Gerencia">
                                </div>
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
    $(document).ready(function(){
        $('#fecha').val(new Date().toISOString().substr(0,10));
    });
</script>
@endsection