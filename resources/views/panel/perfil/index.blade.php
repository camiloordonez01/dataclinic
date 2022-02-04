@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7">
                <div class="card card-principal">
                    <div class="card-header">
                        <h3 class="card-title">Datos del perfil</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tbody>
                                <tr >
                                    <th scope="row">Nombres</th>
                                    <td>{{$persona->nombres}}</td>
                                </tr>
                                <tr >
                                    <th scope="row">Apellidos</th>
                                    <td>{{$persona->apellidos}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Correo</th>
                                    <td>{{$persona->correo}}</td>
                                </tr>
                                <tr >
                                    <th scope="row">Tipo Documento</th>
                                    <td>
                                    @if ($persona->tipo_documento=='CC')
                                        Cédula de Ciudadanía
                                        @elseif ($persona->tipo_documento=='CE')
                                        Cédula de Extranjería
                                        @elseif ($persona->tipo_documento=='PA')
                                        Pasaporte
                                        @elseif ($persona->tipo_documento=='RC')
                                        Registro Civil
                                        @elseif ($persona->tipo_documento=='TI')
                                        Tarjeta de Identidad
                                        @endif
                                    </td>
                                </tr>
                                <tr >
                                    <th scope="row">N° Documento</th>
                                    <td>{{$persona->documento}}</td>
                                </tr>
                                <tr >
                                    <th scope="row">Fecha de nacimiento</th>
                                    <td>{{$persona->fecha_nacimiento}}</td>
                                </tr>
                                
                                <tr>
                                    <th scope="row">Telefono</th>
                                    <td>{{$persona->telefono}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Celular</th>
                                    <td>{{$persona->celular}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Genero</th>
                                    <td>
                                        @if($persona->genero == 'M')
                                        Masculino
                                        @else 
                                        Femenino
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="perfil/{{$persona->id}}/edit" class="btn btn-principal btn-block  mt-4">Editar</a>
                    </div>
                </div>
        </div>
        <div class="col-md-5">
            <div class="card card-principal">
                    <div class="card-header">
                        <h3 class="card-title">Cambiar contraseña</h3>
                    </div>
                    <div class="card-body">
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
                        <form method="post" enctype="multipart/form-data" action="{{ url('/perfil/resetPassword') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="password">Contraseña actual</label>
                                <input type="password" class="form-control" name="current_password">
                            </div>
                            <div class="form-group">
                                <label for="password">Nueva contraseña</label>
                                <input type="password" class="form-control" name="new_password">
                            </div>
                            <div class="form-group">
                                <label for="password2">Repetir contraseña</label>
                                <input type="password" class="form-control" name="new_confirm_password">
                            </div>
                            <button type="submit" class="btn btn-principal btn-block">Cambiar</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection