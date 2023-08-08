<?php

namespace Database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'administrador',
            'guard_name' => 'web',
        ]);
        
        DB::table('roles')->insert([
            'name' => 'instructor',
            'guard_name' => 'web',
        ]);

        DB::table('roles')->insert([
            'name' => 'aprendiz',
            'guard_name' => 'web',
        ]);

        DB::table('roles')->insert([
            'name' => 'investigador',
            'guard_name' => 'web',
        ]);

        DB::table('roles')->insert([
            'name' => 'tallerconcesionario',
            'guard_name' => 'web',
        ]);
        
    }
}
