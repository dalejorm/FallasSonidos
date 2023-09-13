<?php

namespace Database\seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        Permission::create(['name' => 'admin.user.index']);
        Permission::create(['name' => 'admin.user.show']);
        Permission::create(['name' => 'admin.user.update']);
        Permission::create(['name' => 'admin.user.destroy']);

        $roleAdm = Role::find(1);
        Permission::findByName('admin.user.index')->assignRole($roleAdm);
        Permission::findByName('admin.user.show')->assignRole($roleAdm);
        Permission::findByName('admin.user.destroy')->assignRole($roleAdm);
        Permission::findByName('admin.user.update')->assignRole($roleAdm);
        


    }
}
