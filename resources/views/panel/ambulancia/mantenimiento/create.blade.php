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
                    <h3 class="card-title">Registrar mantenimiento Ambulancia</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!!Form::open(array('url'=> 'ambulancias/mantenimientos/store','method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}
                    <div class="card-body">
                        <h4 class="text-center">Datos</h4>
                        <div class="row"> 
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="fechaActualizacion">Fecha creacion</label>
                                    <input type="date" class="form-control" name="fecha" id="fecha" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="responsable">Responsable</label>
                                    <input type="text" class="form-control" name="responsable" required>
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
                                    <label for="kilometraje">Kilometraje</label>
                                    <input type="text" class="form-control" name="kilometraje" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="mantenimiento">Mantenimiento realizado</label>
                                    <textarea name="mantenimiento" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="observaciones">Observaciones</label>
                                    <textarea name="observaciones" class="form-control" required></textarea>
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