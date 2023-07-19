<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin123'),
            'tipo_documento' => 'cc',
            'numero_documento' => '10000000',
            'numero_celular' => '3000000000',
            'intereses' => '["investigar"]',
            'biografia' => 'None',
            'cvlac' => 'None',
            'esta_habilitado' => 1,
            'autorizacion_tratamiento_datos' => 1
        ]);
    }
}
