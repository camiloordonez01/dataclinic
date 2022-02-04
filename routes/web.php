<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(["register" => false]);

Route::get('/', 'InicioController@index')->name('Inicio')->middleware('auth');


Route::middleware(['auth'])->group(function(){
    //Perfil
    Route::get('perfil', 'perfilController@index')->name('Perfil')
        ->middleware('can:perfil.index');

    Route::get('perfil/{id}/edit', 'perfilController@edit')->name('Perfil.edit')
        ->middleware('can:perfil.edit');

    Route::put('perfil/{id}', 'perfilController@update')->name('Perfil.update')
        ->middleware('can:perfil.edit');
        
    Route::post('/perfil/resetPassword', 'perfilController@resetPassword');
    
    //Usuarios
    Route::post('usuarios/store', 'UsuariosController@store')->name('Usuarios.store')
		->middleware('can:usuarios.create');

	Route::get('usuarios', 'UsuariosController@index')->name('Usuarios')
		->middleware('can:usuarios.index');

	Route::get('usuarios/create', 'UsuariosController@create')->name('Usuarios.create')
		->middleware('can:usuarios.create');

	Route::put('usuarios/{id}', 'UsuariosController@update')->name('Usuarios.update')
		->middleware('can:usuarios.edit');

	Route::get('usuarios/{id}', 'UsuariosController@show')->name('Usuarios.show')
		->middleware('can:usuarios.show');

	Route::delete('usuarios/{id}', 'UsuariosController@destroy')->name('Usuarios.destroy')
		->middleware('can:usuarios.destroy');

	Route::get('usuarios/{id}/edit', 'UsuariosController@edit')->name('Usuarios.edit')
		->middleware('can:usuarios.edit');
    //pacientes
    Route::post('pacientes/store', 'PacientesController@store')->name('Pacientes.store')
		->middleware('can:pacientes.create');

	Route::get('pacientes', 'PacientesController@index')->name('Pacientes')
		->middleware('can:pacientes.index');

	Route::get('pacientes/create', 'PacientesController@create')->name('Pacientes.create')
		->middleware('can:pacientes.create');

	Route::put('pacientes/{id}', 'PacientesController@update')->name('Pacientes.update')
		->middleware('can:pacientes.edit');

	Route::get('pacientes/{id}', 'PacientesController@show')->name('Pacientes.show')
		->middleware('can:pacientes.show');

	Route::delete('pacientes/{id}', 'PacientesController@destroy')->name('Pacientes.destroy')
		->middleware('can:pacientes.destroy');

	Route::get('pacientes/{id}/edit', 'PacientesController@edit')->name('Pacientes.edit')
        ->middleware('can:pacientes.edit');
        
	Route::post('/pacientes/ciudades', 'PacientesController@getCiudades');
	
	//Tipos de historia
	Route::get('historia/tipo', 'TipoHistoriaController@index')->name('TipoHistoria')
		->middleware('can:historia.tipo.index');
		
	Route::post('historia/tipo/store', 'TipoHistoriaController@store')->name('TipoHistoria.store')
		->middleware('can:historia.tipo.create');
		
	Route::delete('historia/tipo/{id}', 'TipoHistoriaController@destroy')->name('TipoHistoria.destroy')
		->middleware('can:historia.tipo.destroy');

    //Historia clinica
	Route::post('/historia/paciente/encuesta','HistoriaController@encuesta');

	Route::get('/historia/paciente/encuesta/descargar/{id}','HistoriaController@encuestaPdf');

	Route::post('/historia/paciente','HistoriaController@getPaciente');
	
    Route::get('historia', 'HistoriaController@index')->name('Historia')
        ->middleware('can:historia.index');
        
    Route::get('historia/create', 'HistoriaController@create')->name('Historia.create')
        ->middleware('can:historia.create');

    Route::post('historia/store', 'HistoriaController@store')->name('Historia.store')
        ->middleware('can:historia.create');

    Route::put('historia/{id}', 'HistoriaController@update')->name('Historia.update')
		->middleware('can:historia.edit');

	Route::get('historia/{id}', 'HistoriaController@show')->name('Historia.show')
		->middleware('can:historia.show');

	Route::delete('historia/{id}', 'HistoriaController@destroy')->name('Historia.destroy')
		->middleware('can:historia.destroy');

	Route::get('historia/{id}/edit', 'HistoriaController@edit')->name('Historia.edit')
		->middleware('can:historia.edit');

	Route::get('historia/reporte/generar', 'HistoriaController@reporte')->name('Historia.reporte');

	Route::post('historia/reporte/generar', 'HistoriaController@reporteGenerate');
		
	Route::get('historia/soporte/{file}', 'HistoriaController@download');

	Route::get('historia/reporte/pdf/{id}', 'HistoriaController@downloadPdf');

	Route::get('historia/reporte/excel/{id}', 'HistoriaController@downloadExcel');

	Route::get('historia/reporte/desestimiento/{id}', 'HistoriaController@downloadDesestimiento');

	Route::delete('historia/{id}', 'HistoriaController@close')->name('Historia.close')
		->middleware('can:historia.close');
    // Roles
    Route::get('roles', 'RolesController@index')->name('Roles')
        ->middleware('can:roles.index');
        
    Route::get('roles/create', 'RolesController@create')->name('Roles.create')
        ->middleware('can:roles.create');

    Route::post('roles/store', 'RolesController@store')->name('Roles.store')
        ->middleware('can:roles.create');

    Route::put('roles/{id}', 'RolesController@update')->name('Roles.update')
		->middleware('can:roles.edit');

	Route::get('roles/{id}', 'RolesController@show')->name('Roles.show')
		->middleware('can:roles.show');

	Route::delete('roles/{id}', 'RolesController@destroy')->name('Roles.destroy')
		->middleware('can:roles.destroy');

	Route::get('roles/{id}/edit', 'RolesController@edit')->name('Roles.edit')
		->middleware('can:roles.edit');
		
	// Temperatura
    Route::get('temperatura', 'TemperaturaController@index')->name('Temperatura')
        ->middleware('can:temperatura.index');
        
    Route::get('temperatura/create', 'TemperaturaController@create')->name('Temperatura.create')
        ->middleware('can:temperatura.create');

    Route::post('temperatura/store', 'TemperaturaController@store')->name('Temperatura.store')
        ->middleware('can:temperatura.create');

    Route::put('temperatura/{id}', 'TemperaturaController@update')->name('Temperatura.update')
		->middleware('can:temperatura.edit');

	Route::get('temperatura/{id}', 'TemperaturaController@show')->name('Temperatura.show')
		->middleware('can:temperatura.show');

	Route::delete('temperatura/{id}', 'TemperaturaController@destroy')->name('Temperatura.destroy')
		->middleware('can:temperatura.destroy');

	Route::get('temperatura/{id}/edit', 'TemperaturaController@edit')->name('Temperatura.edit')
		->middleware('can:temperatura.edit');
		
	Route::get('temperatura/generatePdf/{id}', 'TemperaturaController@generatePdf');

	// Oxigeno
	Route::get('oxigeno/cilindros', 'OxigenoController@cilindros')->name('Cilindros');
	
	Route::post('oxigeno/cilindros/store', 'OxigenoController@cilindrosStore');

	Route::post('oxigeno/cilindros/delete', 'OxigenoController@cilindrosDelete');

    Route::get('oxigeno', 'OxigenoController@index')->name('Oxigeno')
        ->middleware('can:oxigeno.index');
        
    Route::get('oxigeno/create', 'OxigenoController@create')->name('Oxigeno.create')
        ->middleware('can:oxigeno.create');

    Route::post('oxigeno/store', 'OxigenoController@store')->name('Oxigeno.store')
        ->middleware('can:oxigeno.create');

    Route::put('oxigeno/{id}', 'OxigenoController@update')->name('Oxigeno.update')
		->middleware('can:oxigeno.edit');

	Route::get('oxigeno/{id}', 'OxigenoController@show')->name('Oxigeno.show')
		->middleware('can:oxigeno.show');

	Route::delete('oxigeno/{id}', 'OxigenoController@destroy')->name('Oxigeno.destroy')
		->middleware('can:oxigeno.destroy');

	Route::get('oxigeno/{id}/edit', 'OxigenoController@edit')->name('Oxigeno.edit')
		->middleware('can:oxigeno.edit');
		
	Route::get('oxigeno/generatePdf/{id}', 'OxigenoController@generatePdf');


	// Reuniones
    Route::get('reuniones', 'ReunionesController@index')->name('Reuniones')
        ->middleware('can:reuniones.index');
        
    Route::get('reuniones/create', 'ReunionesController@create')->name('Reuniones.create')
        ->middleware('can:reuniones.create');

    Route::post('reuniones/store', 'ReunionesController@store')->name('Reuniones.store')
        ->middleware('can:reuniones.create');

    Route::put('reuniones/{id}', 'ReunionesController@update')->name('Reuniones.update')
		->middleware('can:reuniones.edit');

	Route::get('reuniones/{id}', 'ReunionesController@show')->name('Reuniones.show')
		->middleware('can:reuniones.show');

	Route::delete('reuniones/{id}', 'ReunionesController@destroy')->name('Reuniones.destroy')
		->middleware('can:reuniones.destroy');

	Route::get('reuniones/{id}/edit', 'ReunionesController@edit')->name('Reuniones.edit')
		->middleware('can:reuniones.edit');
		
	Route::get('reuniones/generatePdf/{id}', 'ReunionesController@generatePdf');

	// Lavadero
    Route::get('lavadero', 'LavaderoDesinfeccionController@index')->name('Lavadero')
        ->middleware('can:lavadero.index');
        
    Route::get('lavadero/create', 'LavaderoDesinfeccionController@create')->name('Lavadero.create')
        ->middleware('can:lavadero.create');

    Route::post('lavadero/store', 'LavaderoDesinfeccionController@store')->name('Lavadero.store')
        ->middleware('can:lavadero.create');

    Route::put('lavadero/{id}', 'LavaderoDesinfeccionController@update')->name('Lavadero.update')
		->middleware('can:lavadero.edit');

	Route::delete('lavadero/{id}', 'LavaderoDesinfeccionController@destroy')->name('Lavadero.destroy')
		->middleware('can:lavadero.destroy');

	Route::get('lavadero/{id}/edit', 'LavaderoDesinfeccionController@edit')->name('Lavadero.edit')
		->middleware('can:lavadero.edit');
		
	Route::get('lavadero/generatePdf/{id}', 'LavaderoDesinfeccionController@generatePdf');

	// Desinfeccion
    Route::get('desinfeccion', 'DesinfeccionAmbulanciasController@index')->name('Desinfeccion')
        ->middleware('can:desinfeccion.index');
        
    Route::get('desinfeccion/create', 'DesinfeccionAmbulanciasController@create')->name('Desinfeccion.create')
        ->middleware('can:desinfeccion.create');

    Route::post('desinfeccion/store', 'DesinfeccionAmbulanciasController@store')->name('Desinfeccion.store')
        ->middleware('can:desinfeccion.create');

    Route::put('desinfeccion/{id}', 'DesinfeccionAmbulanciasController@update')->name('Desinfeccion.update')
		->middleware('can:desinfeccion.edit');

	Route::delete('desinfeccion/{id}', 'DesinfeccionAmbulanciasController@destroy')->name('Desinfeccion.destroy')
		->middleware('can:desinfeccion.destroy');
		
	Route::get('desinfeccion/{id}/edit', 'DesinfeccionAmbulanciasController@edit')->name('Desinfeccion.edit')
		->middleware('can:desinfeccion.edit');
		
	Route::get('desinfeccion/generatePdf/{id}', 'DesinfeccionAmbulanciasController@generatePdf');

	// Ambulancias
    Route::get('ambulancias', 'AmbulanciasController@index')->name('Ambulancias')
        ->middleware('can:ambulancias.index');
        
    Route::get('ambulancias/create', 'AmbulanciasController@create')->name('Ambulancias.create')
        ->middleware('can:ambulancias.create');

    Route::post('ambulancias/store', 'AmbulanciasController@store')->name('Ambulancias.store')
        ->middleware('can:ambulancias.create');

    Route::put('ambulancias/{id}', 'AmbulanciasController@update')->name('Ambulancias.update')
		->middleware('can:ambulancias.edit');

	Route::delete('ambulancias/{id}', 'AmbulanciasController@destroy')->name('Ambulancias.destroy')
		->middleware('can:ambulancias.destroy');
		
	Route::get('ambulancias/{id}/edit', 'AmbulanciasController@edit')->name('Ambulancias.edit')
		->middleware('can:ambulancias.edit');
		
	Route::get('ambulancias/generatePdf/{id}', 'AmbulanciasController@generatePdf');

	// Ambulancias control
    Route::get('ambulancias/control', 'AmbulanciasControlController@index')->name('Controles')
        ->middleware('can:controles.index');
        
    Route::get('ambulancias/control/create', 'AmbulanciasControlController@create')->name('Controles.create')
        ->middleware('can:controles.create');

    Route::post('ambulancias/control/store', 'AmbulanciasControlController@store')->name('Controles.store')
        ->middleware('can:controles.create');

    Route::put('ambulancias/control/{id}', 'AmbulanciasControlController@update')->name('Controles.update')
		->middleware('can:controles.edit');

	Route::delete('ambulancias/control/{id}', 'AmbulanciasControlController@destroy')->name('Controles.destroy')
		->middleware('can:controles.destroy');
		
	Route::get('ambulancias/control/{id}/edit', 'AmbulanciasControlController@edit')->name('Controles.edit')
		->middleware('can:controles.edit');
		
	Route::get('ambulancias/control/generatePdf/{id}', 'AmbulanciasControlController@generatePdf');

	Route::get('ambulancias/control/generateAllPdf', 'AmbulanciasControlController@generateAllPdf');

	// Ambulancias control
    Route::get('ambulancias/mantenimientos', 'AmbulanciasMantenimientosController@index')->name('Mantenimientos')
        ->middleware('can:mantenimientos.index');
        
    Route::get('ambulancias/mantenimientos/create', 'AmbulanciasMantenimientosController@create')->name('Mantenimientos.create')
        ->middleware('can:mantenimientos.create');

    Route::post('ambulancias/mantenimientos/store', 'AmbulanciasMantenimientosController@store')->name('Mantenimientos.store')
        ->middleware('can:mantenimientos.create');

    Route::put('ambulancias/mantenimientos/{id}', 'AmbulanciasMantenimientosController@update')->name('Mantenimientos.update')
		->middleware('can:mantenimientos.edit');

	Route::delete('ambulancias/mantenimientos/{id}', 'AmbulanciasMantenimientosController@destroy')->name('Mantenimientos.destroy')
		->middleware('can:mantenimientos.destroy');
		
	Route::get('ambulancias/mantenimientos/{id}/edit', 'AmbulanciasMantenimientosController@edit')->name('Mantenimientos.edit')
		->middleware('can:mantenimientos.edit');
		
	Route::get('ambulancias/mantenimientos/generatePdf', 'AmbulanciasMantenimientosController@generatePdf');

});

//Route::get('/home', 'HomeController@index')->name('home');
