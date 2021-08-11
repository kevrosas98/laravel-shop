<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('clientes')->insert([
            'nombres' => 'Daniel Santos',
            'dni' => '66666666',
            'telefono' => '98765431',
            'direccion' => 'Calle Las Gaviotas 126, Lince',
            'email' => 'dsantos@mail.com',
            'password' => Hash::make('123456'),
        ]);
        DB::table('clientes')->insert([
            'nombres' => 'Karen Mendoza',
            'dni' => '66666666',
            'telefono' => '98765431',
            'direccion' => 'Avenida Los Corales 258, Los Olivos',
            'email' => 'kmendoza@mail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
