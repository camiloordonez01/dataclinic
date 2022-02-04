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
                    <h3 class="card-title">Registrar oxigeno</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!!Form::open(array('url'=> 'oxigeno/store','method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}
                    <div class="card-body">
                        <h4 class="text-center">Datos iniciales</h4>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="responsable">Responsable</label>
                                    <input type="text" class="form-control" disabled required value="{{$nombres}}">
                                    <input type="hidden" name="idPersona" value="{{$idPersona}}">
                                </div>
                            </div>  
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="fecha">Fecha</label>
                                    <input type="date" class="form-control" name="fecha" id="fecha" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4 class="text-center">Registro</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="numeroCilindro">Numero cilindro</label>
                                <select name="numeroCilindro" class="form-control" required>
                                    <option value="" selected disabled>Seleccione el numero</option>
                                    @foreach($cilindros as $cilindro)
                                    <option value="{{$cilindro->numero}}">{{$cilindro->numero}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="fugas">Fugas</label>
                                <select name="fugas" class="form-control" required>
                                    <option value="" selected disabled>Seleccione</option>
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="col-md-6 mt-4">
                                <label for="abolladura">Abolladura</label>
                                <select name="abolladura" class="form-control" required>
                                    <option value="" selected disabled>Seleccione</option>
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="col-md-6 mt-4">
                                <label for="nivelAdecuado">Nivel de valvula</label>
                                <select name="nivelAdecuado" class="form-control" required>
                                    <option value="" selected disabled>Seleccione</option>
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="col-md-6 mt-4">
                                <label for="cierreValvula">Cierre de valvula</label>
                                <select name="cierreValvula" class="form-control" required>
                                    <option value="" selected disabled>Seleccione</option>
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <h4 class="text-center">Firma</h4>
                        <div class="row">
                            <div class="col-md-6 mx-auto">
                                <input type="hidden" name="firmaPaciente1" id="firmaPaciente1">
                                <img src="" id="firma1Tomada" class="w-100">
                                <hr>
                                <div class="text-center">
                                    <a href="javascript:void(0)" class="btn btn-success" data-toggle="modal" data-target="#modalFirma1" id="crearFirma1">Crear</a>
                                    <a href="javascript:void(0)" class="btn btn-info disabled" data-toggle="modal" data-target="#modalFirma1" id="editarFirma1">Editar</a>
                                </div>
                                <div class="modal fade " id="modalFirma1" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-firma" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Firma del responsable</h5>
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
                                                    
                                                    $('#guardarCanvas1').on('click',function(){
                                                        if (!signaturePad.isEmpty()) {
                                                            var file= trimCanvas (canvas);
                                                            //Input
                                                            $('#firmaPaciente1').val(file.toDataURL());
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
</script>
@endsection