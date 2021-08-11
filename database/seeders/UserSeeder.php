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
            'role' => 'A',
            'name' => 'Administrador Web',
            'email' => 'admin@mail.com',
            'password' => Hash::make('123456'),
        ]);

        DB::table('users')->insert([
            'role' => 'U',
            'name' => 'Kevin Rosas',
            'email' => 'krosas@mail.com',
            'password' => Hash::make('123456')
        ]);

        DB::table('users')->insert([
            'role' => 'U',
            'name' => 'Miguel Arevalo',
            'email' => 'marevalo@mail.com',
            'password' => Hash::make('123456')
        ]);
    }
}
