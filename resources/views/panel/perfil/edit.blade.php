@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card card-principal">
                <div class="card-header">
                    <h3 class="card-title">Editar datos del perfil</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!!Form::model($persona,['method'=>'PUT','route'=>['Perfil.update',$persona->id]])!!}
                {{Form::token()}}
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nombres" class="col-sm-3 col-form-label text-right">Nombres</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nombres" required value="{{$persona->nombres}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellidos" class="col-sm-3 col-form-label text-right">Apellidos</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="apellidos" required value="{{$persona->apellidos}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="correo" class="col-sm-3 col-form-label text-right">Correo</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="correo" required value="{{$persona->correo}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tipo_documento" class="col-sm-3 col-form-label text-right">Tipo de documento</label>
                            <div class="col-sm-9">
                                <select name="tipo_documento" class="form-control" required>
                                    <option selected disabled>Seleccionar</option>
                                    <option value="CC" @if ($persona->tipo_documento=='CC'){{'selected'}} @endif>Cédula de Ciudadanía</option>
                                    <option value="CE" @if ($persona->tipo_documento=='CE'){{'selected'}} @endif>Cédula de Extranjería</option>
                                    <option value="PA" @if ($persona->tipo_documento=='PA'){{'selected'}} @endif>Pasaporte</option>
                                    <option value="RC" @if ($persona->tipo_documento=='RC'){{'selected'}} @endif>Registro Civil</option>
                                    <option value="TI" @if ($persona->tipo_documento=='TI'){{'selected'}} @endif>Tarjeta de Identidad</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="documento" class="col-sm-3 col-form-label text-right">N° documento</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="documento" required value="{{$persona->documento}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fecha_nacimiento" class="col-sm-3 col-form-label text-right">Fecha de nacimiento</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control"  name="fecha_nacimiento"  required value="{{$persona->fecha_nacimiento}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telefono" class="col-sm-3 col-form-label text-right">Telefono</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="telefono" required value="{{$persona->telefono}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="celular" class="col-sm-3 col-form-label text-right">Celular</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="celular" required value="{{$persona->celular}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="genero" class="col-sm-3 col-form-label text-right">Genero</label>
                            <div class="col-sm-9">
                                <select name="genero" class="form-control" required>
                                    <option selected disabled>Seleccionar</option>
                                    <option value="M" @if ($persona->genero=='M'){{'selected'}} @endif>Masculino</option>
                                    <option value="F" @if ($persona->genero=='F'){{'selected'}} @endif>Femenino</option>
                                </select>
                            </div>
                        </div>
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
@endsection