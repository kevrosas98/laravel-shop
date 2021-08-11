<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categorias')->insert(['id'=>1,'nombre' => 'Gaseosas','url_seo'=>'gaseosas']);
        DB::table('categorias')->insert(['id'=>2,'nombre' => 'Snacks','url_seo'=>'snacks']);
        DB::table('categorias')->insert(['id'=>3,'nombre' => 'Chocolates','url_seo'=>'chocolates']);
        DB::table('categorias')->insert(['id'=>4,'nombre' => 'Galletas','url_seo'=>'galletas']);
        DB::table('categorias')->insert(['id'=>5,'nombre' => 'Abarrotes','url_seo'=>'abarrotes']);
    }
}
