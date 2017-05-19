<?php

use Illuminate\Database\Seeder;
use Intranet\User;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'fullname' => 'Sys Admin',
            'email' => 'admin@admin.com',
            'password' => 'administrator',
            'position' => 'administrador',
            'unit_id' => 1,
            'sector_id' => 1,
            'bio' => 'Este es un administrador',
            'rol_id' => 1,
            'status' => 1
        ]);
    }
}
