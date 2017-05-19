<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeders = [
            'Users', 'Sector', 'Unit', 'Permissions', 'Roles', 'PermissionRol', 'Category', 'Contenidos'
        ];

        foreach($seeders as $seeder) {
            $name = $seeder.'TableSeeder';
            $this->call($name);    
        }
    }
}
