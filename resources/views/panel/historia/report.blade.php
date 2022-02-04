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
                {!!Form::open(array('url'=> 'historia/reporte/generar','method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Fecha inicio</label>
                            <input type="date" name="fechaInicial" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Fecha fin</label>
                            <input type="date" name="fechaFinal" class="form-control" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-principal">Generar</button>
                        <button type="submit" class="btn btn-default float-right">Cancel</button>
                    </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
@endsection