<?php

use Illuminate\Database\Seeder;
use Intranet\Rol;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create([
            'name' => 'Administrador',
            'tag' => 'ADMIN'
        ]);

        Rol::create([
            'name' => 'Editor',
            'tag' => 'EDITOR'
        ]);

        Rol::create([
            'name' => 'Default',
            'tag' => 'DEFAULT'
        ]);
    }
}
