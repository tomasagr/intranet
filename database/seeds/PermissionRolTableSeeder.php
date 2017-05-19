<?php

use Illuminate\Database\Seeder;
use Intranet\Permission;
use Intranet\PermissionRol;

class PermissionRolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            PermissionRol::create([
                'rol_id' => 1,
                'permission_id' => $permission->id,
            ]);

            if ($permission->name != 'usuarios') {
                PermissionRol::create([
                    'rol_id' => 2,
                    'permission_id' => $permission->id,
                ]);
            }
            
            if (strpos($permission->tag, "SHOW") !== false && $permission->name != 'usuarios') {
                PermissionRol::create([
                    'rol_id' => 3,
                    'permission_id' => $permission->id,
                ]);
            }
        }
    }
}
