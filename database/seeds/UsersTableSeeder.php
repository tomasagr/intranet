<?php

use Illuminate\Database\Seeder;
use App\User;
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
            'first_name' => 'Sys',
            'last_name' => 'Admin',
            'email' => 'Admin@Admin.com',
            'username' => 'administrator',
            'password' => Hash::make('administrator')
        ]);
    }
}
