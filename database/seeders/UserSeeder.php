<?php

namespace Database\Seeders;

use App\Models\Permiso;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'nombre'            => 'Richard',
            'apellido'          => 'Mestra',
            'telefono'          => '3213211212',
            'email'             => 'richard@gmail.com',
            'email_verified_at' => date(now()),
            'password'          => Hash::make('123123123')
        ]);

        $user2 = User::create([
            'nombre'            => 'Andres',
            'apellido'          => 'Alvarez',
            'telefono'          => '3213212121',
            'email'             => 'andres@gmail.com',
            'password'          => Hash::make('123123123')
        ]);

        // roles
        $administrador = Role::create([
            'nombre'          => 'administrador',
        ]);
        $usuario = Role::create([
            'nombre'          => 'usuario',
        ]);

        $permiso1 = Permiso::create(['permiso' => 'permiso 1']);
        $permiso2 = Permiso::create(['permiso' => 'permiso 2']);
        $permiso3 = Permiso::create(['permiso' => 'permiso 3']);

        // $user1->asignarRol($administrador);
    }
}
