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
                    <h3 class="card-title">Ver usuario</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th colspan="2" class="text-center">Datos personales</th>
                            </tr>
                            <tr>
                                <th>Nombres</th>
                                <td>{{$persona->nombres}}</td>
                            </tr>
                            <tr>
                                <th>Apellidos</th>
                                <td>{{$persona->apellidos}}</td>
                            </tr>
                            <tr>
                                <th>Correo</th>
                                <td>{{$persona->correo}}</td>
                            </tr>
                            <tr>
                                <th>Tipo documento</th>
                                <td>{{$persona->tipo_documento}}</td>
                            </tr>
                            <tr>
                                <th>Numero documento</th>
                                <td>{{$persona->documento}}</td>
                            </tr>
                            <tr>
                                <th>Fecha nacimiento</th>
                                <td>{{$persona->fecha_nacimiento}}</td>
                            </tr>
                            <tr>
                                <th>Telefono</th>
                                <td>{{$persona->telefono}}</td>
                            </tr>
                            <tr>
                                <th>Celular</th>
                                <td>{{$persona->celular}}</td>
                            </tr>
                            <tr>
                                <th>Genero</th>
                                <td> @if ($persona->genero=='M'){{'Masculino'}}@else {{'Femenino'}}@endif</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="/pacientes" class="btn btn-principal">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection