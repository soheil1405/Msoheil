<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_in_db = Role::where('name' , config('permission.default_roles'));
        if($role_in_db->count()<1){
            foreach (config('permission.default_roles') as $role){
                Role::create([
                    'name'=>$role
                ]);
            }
        }

        $permission_in_db = Permission::where('name' , config('permission.default_permissions'));
        if($permission_in_db->count()<1){
            foreach (config('permission.default_permissions') as $permissions){
                Permission::create([
                    'name'=>$permissions
                ]);
            }
        }
    }
}
