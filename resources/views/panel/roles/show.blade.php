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
                    <h3 class="card-title">Ver rol</h3>
                </div>
                <div class="card-body">
                <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th colspan="2" class="text-center">Datos</th>
                            </tr>
                            <tr>
                                <th>Nombre</th>
                                <td>{{$rol->name}}</td>
                            </tr>
                            <tr>
                                <th>Slug</th>
                                <td>{{$rol->slug}}</td>
                            </tr>
                            <tr>
                                <th>Descripcion</th>
                                <td>
                                    @if($rol->description==null)
                                    Ninguna
                                    @else
                                    {{$rol->description}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Fecha de creacion</th>
                                <td>{{$rol->created_at}}</td>
                            </tr>
                            <tr>
                                <th>Fecha de actualizacion</th>
                                <td>{{$rol->updated_at}}</td>
                            </tr>
                            <tr>
                                <th>Especial</th>
                                <td>
                                    @if($rol->special==null)
                                    Ninguno
                                    @elseif($rol->special=='all-access')
                                    Acceso completo
                                    @elseif($rol->special=='no-access')
                                    Acceso bloqueado
                                    @endif
                                </td>
                            </tr>
                            @if(!($permisos == ''))
                            <tr>
                                <th colspan="2" class="text-center">Permisos</th>
                            </tr>
                            <tr>
                                <th colspan="2" class="text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Slug</th>
                                                <th>Descripcion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($permisos as $permiso)
                                            <tr>
                                                <th>{{$permiso->name}}</th>
                                                <th>{{$permiso->slug}}</th>
                                                <th>{{$permiso->description}}</th>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </th>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="/roles" class="btn btn-principal">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection