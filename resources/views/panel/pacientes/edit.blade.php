@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
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
                    <h3 class="card-title">Editar paciente</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!!Form::model($paciente,['method'=>'PUT','route'=>['Pacientes.update',$paciente->id]])!!}
                {{Form::token()}}
                    <div class="card-body">
                        <h4 class="text-center">Datos Personales</h4>
                        <div class="form-group row">
                            <label for="nombres" class="col-sm-3 col-form-label">Nombres</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nombres" required value="{{$paciente->nombres}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellidos" class="col-sm-3 col-form-label">Apellidos</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="apellidos" required value="{{$paciente->apellidos}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="correo" class="col-sm-3 col-form-label">Correo</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="correo" required value="{{$paciente->correo}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tipo_documento" class="col-sm-3 col-form-label">Tipo de documento</label>
                            <div class="col-sm-9">
                                <select name="tipo_documento" class="form-control" required>
                                    <option selected disabled>Seleccionar</option>
                                    <option value="CC" @if ($paciente->tipo_documento=='CC'){{'selected'}} @endif>Cédula de Ciudadanía</option>
                                    <option value="CE" @if ($paciente->tipo_documento=='CE'){{'selected'}} @endif>Cédula de Extranjería</option>
                                    <option value="PA" @if ($paciente->tipo_documento=='PA'){{'selected'}} @endif>Pasaporte</option>
                                    <option value="RC" @if ($paciente->tipo_documento=='RC'){{'selected'}} @endif>Registro Civil</option>
                                    <option value="TI" @if ($paciente->tipo_documento=='TI'){{'selected'}} @endif>Tarjeta de Identidad</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="documento" class="col-sm-3 col-form-label">N° documento</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="documento" required value="{{$paciente->documento}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fecha_nacimiento" class="col-sm-3 col-form-label">Fecha de nacimiento</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control"  name="fecha_nacimiento"  required value="{{$paciente->fecha_nacimiento}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telefono" class="col-sm-3 col-form-label">Telefono</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="telefono" required value="{{$paciente->telefono}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="celular" class="col-sm-3 col-form-label">Celular</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="celular" required value="{{$paciente->celular}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="genero" class="col-sm-3 col-form-label">Genero</label>
                            <div class="col-sm-9">
                                <select name="genero" class="form-control" required>
                                    <option selected disabled>Seleccionar</option>
                                    <option value="M" @if ($paciente->genero=='M'){{'selected'}} @endif>Masculino</option>
                                    <option value="F" @if ($paciente->genero=='F'){{'selected'}} @endif>Femenino</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <h4 class="text-center">Dirección</h4>
                        <div class="form-group row">
                            <label for="departamento" class="col-sm-3 col-form-label">Departamento</label>
                            <div class="col-sm-9">
                                <select name="departamento" class="form-control" required id="departamento">
                                    <option selected disabled>Seleccionar</option>
                                    @foreach($departamentos as $departamento)
                                    <option value="{{$departamento->codigo}}" @if ($ciudad->departamentos_id==$departamento->codigo){{'selected'}} @endif>{{$departamento->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ciudad" class="col-sm-3 col-form-label">Ciudad</label>
                            <div class="col-sm-9">
                                <select name="ciudad" class="form-control" required id="ciudad">
                                    <option selected disabled>Seleccionar</option>
                                    @foreach($ciudades as $val)
                                    <option value="{{$val->id}}" @if ($ciudad->id==$val->id){{'selected'}} @endif>{{$val->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="zona" class="col-sm-3 col-form-label">Zona</label>
                            <div class="col-sm-9">
                                <select name="zona" class="form-control" required>
                                    <option selected disabled>Seleccionar</option>
                                    <option value="Rural " @if ($paciente->zona=='Rural'){{'selected'}} @endif>Rural</option>
                                    <option value="Urbana" @if ($paciente->zona=='Urbana'){{'selected'}} @endif>Urbana</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="direccion" class="col-sm-3 col-form-label">Direccion</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="direccion" required value="{{$paciente->direccion}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="barrio" class="col-sm-3 col-form-label">Barrio</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="barrio" value="{{$paciente->barrio}}">
                            </div>
                        </div>
                        <input type="hidden" name="paciente_id" value="{{$paciente->paciente_id}}">
                        <input type="hidden" name="direcciones_id" value="{{$paciente->direcciones_id}}">
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-principal">Aceptar</button>
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
        $('#departamento').change(function(){
            $.ajax({
                    url:'/pacientes/ciudades',
                    data:{'codigo' : $(this).val(), "_token": "{{ csrf_token() }}"},
                    type:'POST',
                    success: function (response) {
                        var ciudades = JSON.parse(response);
                        $('#ciudad').html('');
                        $('#ciudad').append('<option selected disabled>Seleccionar</option>');
                        for(var i = 0; i < ciudades.length; i++){
                            var aux = '<option value="'+ciudades[i]['id']+'" >'+ciudades[i]['nombre']+'</option>';
                            $('#ciudad').append(aux);
                        }
                    },
                    error:function(response){
                        console.log(response.responseText);
                    }
                });
        });
    });
</script>
@endsection