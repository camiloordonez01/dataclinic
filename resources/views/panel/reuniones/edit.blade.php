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
                    <h3 class="card-title">Editar reunion</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!!Form::model($reunion,['method'=>'PUT','route'=>['Reuniones.update',$reunion->id]])!!}
                {{Form::token()}}
                    <div class="card-body">
                        <h4 class="text-center">Datos iniciales</h4>
                        <div class="row"> 
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="fecha">Fecha</label>
                                    <input type="date" class="form-control" name="fecha" id="fecha" value="{{$reunion->fecha}}" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="hora">Hora</label>
                                    <input type="time" class="form-control" name="hora" id="hora" value="{{$reunion->hora}}" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="tema">Tema</label>
                                    <input type="text" class="form-control" name="tema" id="tema" value="{{$reunion->tema}}" placeholder="Escribe el tema a tratar" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4 class="text-center">Asistentes</h4>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="#" data-toggle="modal" data-target="#modalAsistente"><i class="fas fa-plus-square" style="font-size: 40px;"></i></a>
                                <div class="modal fade " id="modalAsistente" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-firma" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Agregar asistente</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center" style="background-color:#e8e8e8;">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <input type="text" class="form-control" placeholder="Nombre completo" id="nombreAsistente">
                                                        <input type="text" class="form-control mt-2" placeholder="Telefono" id="telefonoAsistente">
                                                        <input type="text" class="form-control mt-2" placeholder="Cargo" id="cargoAsistente">
                                                        <label class="mt-2">Firma</label>
                                                        <canvas width="555" height="250" style="touch-action: none;border: 1px solid black;" class="mt-2" id="firma3"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer text-center d-block">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrarCanvas3">Cerrar</button>
                                                <button type="button" class="btn btn-success" id="guardarCanvas3">Agregar</button>
                                                <script>
                                                    var canvas3 = document.getElementById("firma3");
                                                    var signaturePad3 = new SignaturePad(canvas3, {
                                                        backgroundColor: 'rgb(255, 255, 255)'
                                                    });
                                                    var aux = {{count($asistentes)}};
                                                    $('#guardarCanvas3').on('click',function(){
                                                        if (!signaturePad3.isEmpty()) {
                                                            var file= trimCanvas (canvas3);
                                                            $nombreAsistente = $('#nombreAsistente').val();
                                                            $telefonoAsistente = $('#telefonoAsistente').val();
                                                            $cargoAsistente = $('#cargoAsistente').val();
                                                            $firma = file.toDataURL();

                                                            var html = "";
                                                            html += "<tr id='trAsistente"+aux+"'>"; 
                                                            html += "<td><input type='hidden' name='nombresAsistentes[]' value='"+$nombreAsistente+"'>"+$nombreAsistente+"</td>"; 
                                                            html += "<td><input type='hidden' name='telefonosAsistentes[]' value='"+$telefonoAsistente+"'>"+$telefonoAsistente+"</td>"; 
                                                            html += "<td><input type='hidden' name='cargosAsistentes[]' value='"+$cargoAsistente+"'>"+$cargoAsistente+"</td>"; 
                                                            html += "<td><img src='"+$firma+"' width='80'><input type='hidden' name='firmasAsistentes[]' value='"+$firma+"'></td>"; 
                                                            html += "<td><a href='#' class='btn btn-danger' onclick='eliminarAsistente( \"trAsistente"+aux+" \")'><i class='fas fa-trash-alt'></i></a></td>"; 
                                                            html += "</tr>"; 
                                                            aux += 1;
                                                            $('#tablaAsistentes').DataTable().destroy();
                                                            $('#tablaAsistentes tbody').append(html);
                                                            $('#tablaAsistentes').DataTable({
                                                                "paging": true,
                                                                "lengthChange": false,
                                                                "searching": false,
                                                                "ordering": false,
                                                                "info": true,
                                                                "autoWidth": false,
                                                                "responsive": true,
                                                            });

                                                            $('#nombreAsistente').val('');
                                                            $('#telefonoAsistente').val('');
                                                            $('#cargoAsistente').val('');
                                                            signaturePad3.clear();  
                                                            $('#modalAsistente').modal('hide');
                                                        }else{
                                                            toastr.info('Debes firmar para guardar');
                                                        }
                                                    });
                                                    $('#limpiarCanvas3').on('click',function(){
                                                        signaturePad3.clear();
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <table id="tablaAsistentes" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nombre completo</th>
                                            <th>Telefono</th>
                                            <th>Cargo</th>
                                            <th>Firma</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($asistentes as $asistente)
                                        <tr id="trAsistente{{$loop->index}}">
                                            <td><input type="hidden" name="idsAsistentes[]" value="{{$asistente->id}}">{{$asistente->nombre}}</td>
                                            <td>{{$asistente->telefono}}</td>
                                            <td>{{$asistente->cargo}}</td>
                                            <td><img src="{{ asset('files/reuniones/'.$asistente->firma) }}"  width='80'></td>
                                            <td><a href='#' class='btn btn-danger' onclick='eliminarAsistente("trAsistente{{$loop->index}}")'><i class='fas fa-trash-alt'></i></a></td>
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
                                    <textarea name="contenido" class="form-control" rows="5" required>{{$reunion->contenido}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="observaciones">Observaciones</label>
                                    <textarea name="observaciones" class="form-control" rows="5" required>{{$reunion->observaciones}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <input type="hidden" name="firmaInstructor1" id="firmaInstructor1">
                                <img id="firma1Tomada" class="w-100" src="{{ asset('files/reuniones/'.$reunion->firmaInstructor) }}">
                                <hr>
                                <p class="text-center">Firma instructor</p>
                                <div class="text-center">
                                    <a href="javascript:void(0)" class="btn btn-success disabled" data-toggle="modal" data-target="#modalFirma1" id="crearFirma1">Crear</a>
                                    <a href="javascript:void(0)" class="btn btn-info" data-toggle="modal" data-target="#modalFirma1" id="editarFirma1">Editar</a>
                                </div>
                                <input type="text" name="cedulaInstructor" placeholder="Cedula del instructor" class="form-control mt-2" value="{{$reunion->cedulaInstructor}}" required>
                                <input type="text" name="cargoInstructor" placeholder="Cargo del instructor" class="form-control mt-2 mb-2" value="{{$reunion->cargoInstructor}}" required>
                                <div class="modal fade " id="modalFirma1" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-firma" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Firma instructor</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center" style="background-color:#e8e8e8;">
                                                <canvas width="600" height="250" style="touch-action: none;" id="firma1"></canvas>
                                            </div>
                                            <div class="modal-footer text-center d-block">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrarCanvas1">Cerrar</button>
                                                <button type="button" class="btn btn-info" id="limpiarCanvas1">Limpiar</button>
                                                <button type="button" class="btn btn-success" id="guardarCanvas1">Guardar</button>
                                                <script>
                                                    var canvas = document.getElementById("firma1");
                                                    var signaturePad = new SignaturePad(canvas, {
                                                        backgroundColor: 'rgb(255, 255, 255)'
                                                    });
                                                    signaturePad.fromDataURL("{{ asset('files/reuniones/'.$reunion->firmaInstructor) }}", {width: 600, height: 250});
                                                    $('#guardarCanvas1').on('click',function(){
                                                        if (!signaturePad.isEmpty()) {
                                                            var file= trimCanvas (canvas);
                                                            //Input
                                                            $('#firmaInstructor1').val(file.toDataURL());
                                                            //Img
                                                            $('#firma1Tomada').attr('src',file.toDataURL());

                                                            $('#editarFirma1').removeClass('disabled');
                                                            $('#crearFirma1').addClass('disabled');
                                                            toastr.success('Firmado correctamente');
                                                            $('#modalFirma1').modal('hide');
                                                        }else{
                                                            toastr.info('Debes firmar para guardar');
                                                        }
                                                    });
                                                    $('#limpiarCanvas1').on('click',function(){
                                                        signaturePad.clear();
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <input type="hidden" name="firmaCoordinador1" id="firmaCoordinador1">
                                <img id="firma2Tomada" class="w-100" src="{{ asset('files/reuniones/'.$reunion->firmaCoordinador) }}">
                                <hr>
                                <p class="text-center">Firma coordinador</p>
                                <div class="text-center">
                                    <a href="javascript:void(0)" class="btn btn-success disabled" data-toggle="modal" data-target="#modalFirma2" id="crearFirma2">Crear</a>
                                    <a href="javascript:void(0)" class="btn btn-info" data-toggle="modal" data-target="#modalFirma2" id="editarFirma2">Editar</a>
                                </div>
                                <input type="text" name="cedulaCoordinador" placeholder="Cedula del Coordinador" class="form-control mt-2" value="{{$reunion->cedulaCoordinador}}" required>
                                <div class="modal fade " id="modalFirma2" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-firma" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Firma coordinador</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center" style="background-color:#e8e8e8;">
                                                <canvas width="600" height="250" style="touch-action: none;" id="firma2"></canvas>
                                            </div>
                                            <div class="modal-footer text-center d-block">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrarCanvas2">Cerrar</button>
                                                <button type="button" class="btn btn-info" id="limpiarCanvas2">Limpiar</button>
                                                <button type="button" class="btn btn-success" id="guardarCanvas2">Guardar</button>
                                                <script>
                                                    var canvas2 = document.getElementById("firma2");
                                                    var signaturePad2 = new SignaturePad(canvas2, {
                                                        backgroundColor: 'rgb(255, 255, 255)'
                                                    });
                                                    signaturePad2.fromDataURL("{{ asset('files/reuniones/'.$reunion->firmaCoordinador) }}", {width: 600, height: 250});
                                                    $('#guardarCanvas2').on('click',function(){
                                                        if (!signaturePad2.isEmpty()) {
                                                            var file= trimCanvas (canvas2);
                                                            //Input
                                                            $('#firmaCoordinador1').val(file.toDataURL());
                                                            //Img
                                                            $('#firma2Tomada').attr('src',file.toDataURL());

                                                            $('#editarFirma2').removeClass('disabled');
                                                            $('#crearFirma2').addClass('disabled');
                                                            toastr.success('Firmado correctamente');
                                                            $('#modalFirma2').modal('hide');
                                                        }else{
                                                            toastr.info('Debes firmar para guardar');
                                                        }
                                                    });
                                                    $('#limpiarCanvas2').on('click',function(){
                                                        signaturePad2.clear();
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
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
    function trimCanvas(c) {
        var ctx = c.getContext('2d'),
            copy = document.createElement('canvas').getContext('2d'),
            pixels = ctx.getImageData(0, 0, c.width, c.height),
            l = pixels.data.length,
            i,
            bound = {
                top: null,
                left: null,
                right: null,
                bottom: null
            },
            x, y;
        
        // Iterate over every pixel to find the highest
        // and where it ends on every axis ()
        for (i = 0; i < l; i += 4) {
            if (pixels.data[i + 3] !== 0) {
                x = (i / 4) % c.width;
                y = ~~((i / 4) / c.width);

                if (bound.top === null) {
                    bound.top = y;
                }

                if (bound.left === null) {
                    bound.left = x;
                } else if (x < bound.left) {
                    bound.left = x;
                }

                if (bound.right === null) {
                    bound.right = x;
                } else if (bound.right < x) {
                    bound.right = x;
                }

                if (bound.bottom === null) {
                    bound.bottom = y;
                } else if (bound.bottom < y) {
                    bound.bottom = y;
                }
            }
        }
        
        // Calculate the height and width of the content
        var trimHeight = bound.bottom - bound.top,
            trimWidth = bound.right - bound.left,
            trimmed = ctx.getImageData(bound.left, bound.top, trimWidth, trimHeight);

        copy.canvas.width = trimWidth;
        copy.canvas.height = trimHeight;
        copy.putImageData(trimmed, 0, 0);

        // Return trimmed canvas
        return copy.canvas;
    }
    function eliminarAsistente(value){
        console.log(value);
        var table = $('#tablaAsistentes').DataTable();
        table.row( $("#"+value) ).remove().draw();
    }
</script>
@endsection