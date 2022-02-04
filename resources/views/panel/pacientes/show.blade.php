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
                    <h3 class="card-title">Ver paciente</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th colspan="2" class="text-center">Datos personales</th>
                            </tr>
                            <tr>
                                <th>Nombres</th>
                                <td>{{$paciente->nombres}}</td>
                            </tr>
                            <tr>
                                <th>Apellidos</th>
                                <td>{{$paciente->apellidos}}</td>
                            </tr>
                            <tr>
                                <th>Correo</th>
                                <td>{{$paciente->correo}}</td>
                            </tr>
                            <tr>
                                <th>Tipo documento</th>
                                <td>{{$paciente->tipo_documento}}</td>
                            </tr>
                            <tr>
                                <th>Numero documento</th>
                                <td>{{$paciente->documento}}</td>
                            </tr>
                            <tr>
                                <th>Fecha nacimiento</th>
                                <td>{{$paciente->fecha_nacimiento}}</td>
                            </tr>
                            <tr>
                                <th>Telefono</th>
                                <td>{{$paciente->telefono}}</td>
                            </tr>
                            <tr>
                                <th>Celular</th>
                                <td>{{$paciente->celular}}</td>
                            </tr>
                            <tr>
                                <th>Genero</th>
                                <td> @if ($paciente->genero=='M'){{'Masculino'}}@else {{'Femenino'}}@endif</td>
                            </tr>
                            <tr>
                                <th colspan="2" class="text-center">Dirección</th>
                            </tr>
                            <tr>
                                <th>Departamento</th>
                                <td>
                                @foreach($departamentos as $departamento)
                                    @if ($ciudad->departamentos_id==$departamento->codigo) {{$departamento->nombre}} @endif
                                @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Ciudad</th>
                                <td>
                                @foreach($ciudades as $val)
                                    @if ($val->id==$ciudad->id) {{$val->nombre}} @endif
                                @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Zona</th>
                                <td> @if ($paciente->zona=='Rural'){{'Rural'}}@else {{'Urbana'}}@endif</td>
                            </tr>
                            <tr>
                                <th>Direccion</th>
                                <td>{{$paciente->direccion}}</td>
                            </tr>
                            <tr>
                                <th>Barrio</th>
                                <td>{{$paciente->barrio}}</td>
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