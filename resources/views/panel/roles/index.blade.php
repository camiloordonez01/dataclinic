@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
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
                                <th>Nombre</th>
                                <th>Slug</th>
                                <th>Descripcion</th>
                                <th>Especial</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $rol)
                            <tr>
                                <td>{{$rol->name}}</td>
                                <td>{{$rol->slug}}</td>
                                <td>
                                    @if($rol->description==null)
                                    Ninguna
                                    @else
                                    {{$rol->description}}
                                    @endif
                                </td>
                                <td>
                                    @if($rol->special==null)
                                    Ninguno
                                    @elseif($rol->special=='all-access')
                                    Acceso completo
                                    @elseif($rol->special=='no-access')
                                    Acceso bloqueado
                                    @endif
                                </td>
                                <td>
                                    @can('roles.show')
                                    <a class="btn btn-success btn-sm" href="{{URL::action('RolesController@show',$rol->id)}}">
                                        <i class="fas fa-eye">
                                        </i>
                                        Ver
                                    </a>
                                    @endcan
                                    @can('roles.edit')
                                    <a class="btn btn-info btn-sm" href="{{URL::action('RolesController@edit',$rol->id)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    @endcan
                                    @can('roles.destroy')
                                    <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modal-warning-{{$rol->id}}">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                    
                                    <div class="modal fade show" id="modal-warning-{{$rol->id}}" aria-modal="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content modal-principal">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Eliminar perfil</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                {{Form::Open(array('action'=>array('RolesController@destroy',$rol->id),'method'=>'delete'))}}
                                                    <div class="modal-body">
                                                        <p class="text-center">Confirme si desea eliminar el perfil {{$rol->name}}</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-outline-light btn-principal">Confirmar</button>
                                                    </div>
                                                {{Form::Close()}}
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    @endcan
                                </td>  
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Slug</th>
                                <th>Descripcion</th>
                                <th>Especial</th>
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
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection