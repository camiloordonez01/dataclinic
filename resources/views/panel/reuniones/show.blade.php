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
                    <h3 class="card-title">Ver reunion</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                    <div class="card-body">
                        <h4 class="text-center">Datos iniciales</h4>
                        <div class="row"> 
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="fecha">Fecha</label>
                                    <input type="date" class="form-control" name="fecha" id="fecha" value="{{$reunion->fecha}}" required disabled>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="hora">Hora</label>
                                    <input type="time" class="form-control" name="hora" id="hora" value="{{$reunion->hora}}" required disabled>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="tema">Tema</label>
                                    <input type="text" class="form-control" name="tema" id="tema" value="{{$reunion->tema}}" placeholder="Escribe el tema a tratar" required disabled>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4 class="text-center">Asistentes</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="tablaAsistentes" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nombre completo</th>
                                            <th>Telefono</th>
                                            <th>Cargo</th>
                                            <th>Firma</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($asistentes as $asistente)
                                        <tr id="trAsistente{{$loop->index}}">
                                            <td><input type="hidden" name="idsAsistentes[]" value="{{$asistente->id}}">{{$asistente->nombre}}</td>
                                            <td>{{$asistente->telefono}}</td>
                                            <td>{{$asistente->cargo}}</td>
                                            <td><img src="{{ asset('files/reuniones/'.$asistente->firma) }}"  width='80'></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <h4 class="text-center">Datos finales</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="contenido">Contenido del tema</label>
                                    <textarea name="contenido" class="form-control" rows="5" required disabled>{{$reunion->contenido}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="observaciones">Observaciones</label>
                                    <textarea name="observaciones" class="form-control" rows="5" required disabled>{{$reunion->observaciones}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <input type="hidden" name="firmaInstructor1" id="firmaInstructor1">
                                <img id="firma1Tomada" class="w-100" src="{{ asset('files/reuniones/'.$reunion->firmaInstructor) }}">
                                <hr>
                                <p class="text-center">Firma instructor</p>
                                <input type="text" name="cedulaInstructor" disabled placeholder="Cedula del instructor" class="form-control mt-2" value="{{$reunion->cedulaInstructor}}" required>
                                <input type="text" name="cargoInstructor" disabled placeholder="Cargo del instructor" class="form-control mt-2 mb-2" value="{{$reunion->cargoInstructor}}" required>
                                
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <input type="hidden" name="firmaCoordinador1" id="firmaCoordinador1">
                                <img id="firma2Tomada" class="w-100" src="{{ asset('files/reuniones/'.$reunion->firmaCoordinador) }}">
                                <hr>
                                <p class="text-center">Firma coordinador</p>
                                <input type="text" name="cedulaCoordinador" disabled placeholder="Cedula del Coordinador" class="form-control mt-2" value="{{$reunion->cedulaCoordinador}}" required>
                                
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('#tablaAsistentes').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "order": [[0, 'des']],
        });
    });
</script>
@endsection