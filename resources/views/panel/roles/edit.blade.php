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
                    <h3 class="card-title">Editar un rol</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!!Form::model($rol,['method'=>'PUT','route'=>['Roles.update',$rol->id]])!!}
                {{Form::token()}}
                    <div class="card-body">
                        <h4 class="text-center">Informacion</h4>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Nombre</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" required value="{{$rol->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slug" class="col-sm-3 col-form-label">Slug</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="slug" required value="{{$rol->slug}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Descripcion</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description" required>{{$rol->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="special" class="col-sm-3 col-form-label">Especial</label>
                            <div class="col-sm-9">
                                <select name="special" class="form-control" required id="special">
                                    <option value="ninguno" selected>Ninguno</option>
                                    <option value="all-access" @if($rol->special=='all-access'){{'selected'}}@endif>Acceso completo</option>
                                    <option value="no-access" @if($rol->special=='no-access'){{'selected'}}@endif>Acceso restringido</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="permisosSeccion" 
                        @if($rol->special=='all-access' || $rol->special=='no-access')
                        style="display: none;"
                        @endif >
                            <hr>
                            <h4 class="text-center">Permisos</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <select class="form-control" id="permisos">
                                        <option value="" selected>Ninguno</option>
                                        @foreach($permisos as $permiso)
                                        <option value='{"description":"{{$permiso->description}}","slug":"{{$permiso->slug}}","name":"{{$permiso->name}}","opt_id":"optionPer{{$permiso->id}}" }' id="optionPer{{$permiso->id}}">{{$permiso->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 table-bordered text-center">
                                    <h5>Decripcion</h5>
                                    <p class="descriptionSelect"></p>
                                </div>
                                <div class="col-md-2">
                                    <a href="javascript:void(0)" id="addPermiso" class="btn btn-principal float-right">Agregar</a>
                                </div>
                            </div>
                            <div class="permisosSelected text-center  mt-3 row" style="display: flex;">
                                <label class="ningunSelect" style="font-size:12px; color: #ccc;display:none;">Ningun permiso seleccionado</label>
                                @if(!($permisos_rol==''))
                                @foreach($permisos_rol as $permiso)
                                <div class="col-md-2 " style="
                                    width: max-content;
                                    padding: 8px;
                                    background-color: gray;
                                    color: white;
                                    border-radius: 5px;
                                    margin: 0px 10px;
                                    margin-bottom:10px;
                                    cursor: pointer;
                                " onclick="deleteElement(this, 'optionPer{{$permiso->id}}')">
                                    <span>{{$permiso->name}}</span>
                                    <input type="hidden" value="{{$permiso->slug}}" name="permissions[]">
                                </div>
                                <script>
                                        $('#optionPer{{$permiso->id}}').prop("disabled", true);
                                </script>
                                @endforeach
                                @endif
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
<style>
    #permisos option:disabled {
        background-color: #dee2e6;
    }
</style>
<script>
    $(document).ready(function(){
        var per = $('input[name="permissions[]"]').val();
        if(per==undefined){
            $('.ningunSelect').css('display','block');
        }else{
            $('.ningunSelect').css('display','none');
        }
        
        $('#special').change(function(){
            if(!($(this).val()=='ninguno')){
                $('.permisosSeccion').css('display','none');
            }else{
                $('.permisosSeccion').css('display','block');
            }
        });
        $('#permisos').change(function(){
            let datos = JSON.parse($(this).val());
            $('.descriptionSelect').html(datos.description);
            $('#addPermiso').val('{"name":"'+datos.name+'","slug":"'+datos.slug+'", "opt_id":"'+datos.opt_id+'"}');
        });
        $('#addPermiso').click(function(){
            console.log($(this).val());
            let datos = JSON.parse($(this).val());
            $('#'+datos.opt_id).prop("disabled", true);
            $('.ningunSelect').css('display','none');
            $('.permisosSelected').append(`
                <div class="col-md-2 " style="
                    width: max-content;
                    padding: 8px;
                    background-color: gray;
                    color: white;
                    border-radius: 5px;
                    margin: 0px 10px;
                    margin-bottom:10px;
                    cursor: pointer;
                " onclick="deleteElement(this, '`+datos.opt_id+`')">
                    <span>`+datos.name+`</span>
                    <input type="hidden" value="`+datos.slug+`" name="permissions[]">
                </div>`);
        });
    });
    function deleteElement(element, opt_id){
        var padre = element.parentNode;
        padre.removeChild(element);
        $('#'+opt_id).prop("disabled", false);
    }
</script>
@endsection