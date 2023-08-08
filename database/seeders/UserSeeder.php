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
            'document_type' => 'cc',
            'document_number' => '10000000',
            'cellphone_number' => '3000000000',
            'role' => '1',
            'active' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'David Alejandro Ramírez Marin',
            'email' => 'davidalejo_14@hotmail.com',
            'password' => Hash::make('Abcd1234'),
            'document_type' => 'cc',
            'document_number' => '10538508998',
            'cellphone_number' => '3008508998',
            'role' => '4',
            'active' => '1'
        ]);

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }
}
