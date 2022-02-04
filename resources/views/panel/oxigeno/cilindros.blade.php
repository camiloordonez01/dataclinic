@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 mx-auto">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <input type="text" class="form-control w-75 float-left" name="numero" id="numero" placeholder="Numero del cilindro">
                        <button class="btn btn-primary float-right" id="crear">Crear</button>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
            <div class="col-6 mx-auto">
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
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Numero cilindro</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($datos as $dato)
                            <tr>
                                <td>{{$dato->numero}}</td>
                                <td>
                                    <a class="btn btn-danger btn-sm" href="#" onclick="eliminar({{$dato->id}})">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Numero cilindro</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
        </div>
    </div>
</section>
<script>
    function eliminar(id){
        $.ajax({
	            type: 'post',
	            url: '/oxigeno/cilindros/delete',
                data: {numero: id, "_token": "{{ csrf_token() }}"},
                success: function (response) {
                    window.location = '/oxigeno/cilindros';
                },
                error:function(response){
                    console.log(response.responseText);
                }
	        });
    }
    $(document).ready(function(){
        $('#crear').click(function(){
            var valor = $('#numero').val();
            $.ajax({
	            type: 'post',
	            url: '/oxigeno/cilindros/store',
                data: {numero: valor, "_token": "{{ csrf_token() }}"},
                success: function (response) {
                    window.location = '/oxigeno/cilindros';
                },
                error:function(response){
                    console.log(response.responseText);
                }
	        });
        });
    });
</script>
@endsection