<?php

// Home
Breadcrumbs::for('Inicio', function ($trail) {
    $trail->push('Inicio', route('Inicio'));
});

// Perfil
Breadcrumbs::for('Perfil', function ($trail) {
    $trail->parent('Inicio');
    $trail->push('Perfil', route('Perfil'));
});
Breadcrumbs::for('Perfil.edit', function ($trail) {
    $trail->parent('Perfil');
    $trail->push('Editar');
});

// Usuarios 
Breadcrumbs::for('Usuarios', function ($trail) {
    $trail->parent('Inicio');
    $trail->push('Usuarios', route('Usuarios'));
});
Breadcrumbs::for('Usuarios.create', function ($trail) {
    $trail->parent('Usuarios');
    $trail->push('Create');
});
Breadcrumbs::for('Usuarios.edit', function ($trail) {
    $trail->parent('Usuarios');
    $trail->push('Edit');
});
Breadcrumbs::for('Usuarios.show', function ($trail) {
    $trail->parent('Usuarios');
    $trail->push('Ver');
});
//Pacientes
Breadcrumbs::for('Pacientes', function ($trail) {
    $trail->parent('Inicio');
    $trail->push('Pacientes', route('Pacientes'));
});
Breadcrumbs::for('Pacientes.create', function ($trail) {
    $trail->parent('Pacientes');
    $trail->push('Create');
});
Breadcrumbs::for('Pacientes.edit', function ($trail) {
    $trail->parent('Pacientes');
    $trail->push('Edit');
});
Breadcrumbs::for('Pacientes.show', function ($trail) {
    $trail->parent('Pacientes');
    $trail->push('Ver');
});


//Historia
Breadcrumbs::for('Historia', function ($trail) {
    $trail->parent('Inicio');
    $trail->push('Historia', route('Historia'));
});
Breadcrumbs::for('Historia.create', function ($trail) {
    $trail->parent('Historia');
    $trail->push('Create');
});
Breadcrumbs::for('Historia.edit', function ($trail) {
    $trail->parent('Historia');
    $trail->push('Edit');
});
Breadcrumbs::for('Historia.show', function ($trail) {
    $trail->parent('Historia');
    $trail->push('Ver');
});
Breadcrumbs::for('Historia.reporte', function ($trail) {
    $trail->parent('Historia');
    $trail->push('Reporte');
});
//Tipo Historia
Breadcrumbs::for('TipoHistoria', function ($trail) {
    $trail->parent('Historia');
    $trail->push('Tipo', route('TipoHistoria'));
});
Breadcrumbs::for('TipoHistoria.create', function ($trail) {
    $trail->parent('Tipo');
    $trail->push('Create');
});
Breadcrumbs::for('TipoHistoria.edit', function ($trail) {
    $trail->parent('Tipo');
    $trail->push('Edit');
});
Breadcrumbs::for('TipoHistoria.show', function ($trail) {
    $trail->parent('Tipo');
    $trail->push('Ver');
});

//  Roles
Breadcrumbs::for('Roles', function ($trail) {
    $trail->parent('Inicio');
    $trail->push('Roles', route('Roles'));
});
Breadcrumbs::for('Roles.create', function ($trail) {
    $trail->parent('Roles');
    $trail->push('Create');
});
Breadcrumbs::for('Roles.edit', function ($trail) {
    $trail->parent('Roles');
    $trail->push('Edit');
});
Breadcrumbs::for('Roles.show', function ($trail) {
    $trail->parent('Roles');
    $trail->push('Ver');
});

//  Temperatura
Breadcrumbs::for('Temperatura', function ($trail) {
    $trail->parent('Inicio');
    $trail->push('Temperatura', route('Temperatura'));
});
Breadcrumbs::for('Temperatura.create', function ($trail) {
    $trail->parent('Temperatura');
    $trail->push('Create');
});
Breadcrumbs::for('Temperatura.edit', function ($trail) {
    $trail->parent('Temperatura');
    $trail->push('Edit');
});
Breadcrumbs::for('Temperatura.show', function ($trail) {
    $trail->parent('Temperatura');
    $trail->push('Ver');
});

//  Oxigeno
Breadcrumbs::for('Oxigeno', function ($trail) {
    $trail->parent('Inicio');
    $trail->push('Oxigeno', route('Oxigeno'));
});
Breadcrumbs::for('Oxigeno.create', function ($trail) {
    $trail->parent('Oxigeno');
    $trail->push('Create');
});
Breadcrumbs::for('Oxigeno.edit', function ($trail) {
    $trail->parent('Oxigeno');
    $trail->push('Edit');
});
Breadcrumbs::for('Oxigeno.show', function ($trail) {
    $trail->parent('Oxigeno');
    $trail->push('Ver');
});

Breadcrumbs::for('Cilindros', function ($trail) {
    $trail->parent('Oxigeno');
    $trail->push('Cilindros');
});

//  Reuniones
Breadcrumbs::for('Reuniones', function ($trail) {
    $trail->parent('Inicio');
    $trail->push('Reuniones', route('Reuniones'));
});
Breadcrumbs::for('Reuniones.create', function ($trail) {
    $trail->parent('Reuniones');
    $trail->push('Create');
});
Breadcrumbs::for('Reuniones.edit', function ($trail) {
    $trail->parent('Reuniones');
    $trail->push('Edit');
});
Breadcrumbs::for('Reuniones.show', function ($trail) {
    $trail->parent('Reuniones');
    $trail->push('Ver');
});

//  Lavadero
Breadcrumbs::for('Lavadero', function ($trail) {
    $trail->parent('Inicio');
    $trail->push('Lavadero', route('Lavadero'));
});
Breadcrumbs::for('Lavadero.create', function ($trail) {
    $trail->parent('Lavadero');
    $trail->push('Create');
});
Breadcrumbs::for('Lavadero.edit', function ($trail) {
    $trail->parent('Lavadero');
    $trail->push('Edit');
});
Breadcrumbs::for('Lavadero.show', function ($trail) {
    $trail->parent('Lavadero');
    $trail->push('Ver');
});

//  Desinfeccion
Breadcrumbs::for('Desinfeccion', function ($trail) {
    $trail->parent('Inicio');
    $trail->push('Desinfeccion', route('Desinfeccion'));
});
Breadcrumbs::for('Desinfeccion.create', function ($trail) {
    $trail->parent('Desinfeccion');
    $trail->push('Create');
});
Breadcrumbs::for('Desinfeccion.edit', function ($trail) {
    $trail->parent('Desinfeccion');
    $trail->push('Edit');
});
Breadcrumbs::for('Desinfeccion.show', function ($trail) {
    $trail->parent('Desinfeccion');
    $trail->push('Ver');
});

//  Ambulancias
Breadcrumbs::for('Ambulancias', function ($trail) {
    $trail->parent('Inicio');
    $trail->push('Ambulancias', route('Ambulancias'));
});
Breadcrumbs::for('Ambulancias.create', function ($trail) {
    $trail->parent('Ambulancias');
    $trail->push('Create');
});
Breadcrumbs::for('Ambulancias.edit', function ($trail) {
    $trail->parent('Ambulancias');
    $trail->push('Edit');
});
Breadcrumbs::for('Ambulancias.show', function ($trail) {
    $trail->parent('Ambulancias');
    $trail->push('Ver');
});

//  Ambulancias control
Breadcrumbs::for('Controles', function ($trail) {
    $trail->parent('Inicio');
    $trail->push('Controles', route('Controles'));
});
Breadcrumbs::for('Controles.create', function ($trail) {
    $trail->parent('Controles');
    $trail->push('Create');
});
Breadcrumbs::for('Controles.edit', function ($trail) {
    $trail->parent('Controles');
    $trail->push('Edit');
});
Breadcrumbs::for('Controles.show', function ($trail) {
    $trail->parent('Controles');
    $trail->push('Ver');
});

//  Ambulancias mantenimientos
Breadcrumbs::for('Mantenimientos', function ($trail) {
    $trail->parent('Inicio');
    $trail->push('Mantenimientos', route('Mantenimientos'));
});
Breadcrumbs::for('Mantenimientos.create', function ($trail) {
    $trail->parent('Mantenimientos');
    $trail->push('Create');
});
Breadcrumbs::for('Mantenimientos.edit', function ($trail) {
    $trail->parent('Mantenimientos');
    $trail->push('Edit');
});
Breadcrumbs::for('Mantenimientos.show', function ($trail) {
    $trail->parent('Mantenimientos');
    $trail->push('Ver');
});
