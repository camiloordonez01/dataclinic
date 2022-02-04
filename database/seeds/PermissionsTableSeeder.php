<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //usuarios
        Permission::create([
            'name' => 'Navegar usuarios',
            'slug' => 'usuarios.index',
            'description' => 'Lista y navega todos los usuarios del sistema',
        ]);
        Permission::create([
            'name' => 'Ver detalle de usuario',
            'slug' => 'usuarios.show',
            'description' => 'Ver en detalle cada usuario del sistema',
        ]);
        Permission::create([
            'name' => 'Creacion de usuarios',
            'slug' => 'usuarios.create',
            'description' => 'Crear cualquier dato de un usuario del sistema',
        ]);
        Permission::create([
            'name' => 'Edicion de usuarios',
            'slug' => 'usuarios.edit',
            'description' => 'Editar cualquier dato de un usuario del sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar usuario',
            'slug' => 'usuarios.destroy',
            'description' => 'Eliminar cualquier dato de un usuario del sistema',
        ]);
        //pacientes
        Permission::create([
            'name' => 'Navegar pacientes',
            'slug' => 'pacientes.index',
            'description' => 'Lista y navega todos los pacientes del sistema',
        ]);
        Permission::create([
            'name' => 'Ver detalle de paciente',
            'slug' => 'pacientes.show',
            'description' => 'Ver en detalle cada paciente del sistema',
        ]);
        Permission::create([
            'name' => 'Creacion de pacientes',
            'slug' => 'pacientes.create',
            'description' => 'Crear cualquier dato de un paciente del sistema',
        ]);
        Permission::create([
            'name' => 'Edicion de pacientes',
            'slug' => 'pacientes.edit',
            'description' => 'Editar cualquier dato de un paciente del sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar paciente',
            'slug' => 'pacientes.destroy',
            'description' => 'Eliminar cualquier dato de un paciente del sistema',
        ]);
        //Perfil
        Permission::create([
            'name' => 'Navegar perfil',
            'slug' => 'perfil.index',
            'description' => 'Lista y navega todos los perfil del sistema',
        ]);
        Permission::create([
            'name' => 'Edicion de perfil',
            'slug' => 'perfil.edit',
            'description' => 'Editar cualquier dato de un perfil del sistema',
        ]);
        //Roles
        Permission::create([
            'name' => 'Navegar roles',
            'slug' => 'roles.index',
            'description' => 'Lista y navega todos los roles del sistema',
        ]);
        Permission::create([
            'name' => 'Ver detalle de role',
            'slug' => 'roles.show',
            'description' => 'Ver en detalle cada role del sistema',
        ]);
        Permission::create([
            'name' => 'Creacion de roles',
            'slug' => 'roles.create',
            'description' => 'Crear cualquier dato de un role del sistema',
        ]);
        Permission::create([
            'name' => 'Edicion de roles',
            'slug' => 'roles.edit',
            'description' => 'Editar cualquier dato de un role del sistema',
        ]);
        Permission::create([
            'name' => 'Eliminar role',
            'slug' => 'roles.destroy',
            'description' => 'Eliminar cualquier dato de un role del sistema',
        ]);
    }
}
