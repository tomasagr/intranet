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
            'password' => Hash::make('administrator'),
            'position' => 'administrador',
            'unit_id' => null,
            'sector_id' => null,
            'bio' => 'Este es un administrador',
            'rol_id' => null,
            'status' => 1
        ]);
    }
}
