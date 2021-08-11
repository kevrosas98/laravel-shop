<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Gaseosas => 1 , Snacks => 2 , Chocolates => 3 , Galletas => 4 , Abarrotes => 5
        $productos = [
            [1,'Coca Cola Zero 500ml','coca-cola-zero-500ml.jpg','coca-cola-zero-500ml','1 Unidad','2.50',24,1],
            [1,'Fanta Naranja 400ml','fanta-naranja-400ml.jpg','fanta-naranja-400ml','1 Unidad','2.20',24,0],
            [1,'Sprite 500ml','sprite-500ml.jpg','sprite-500ml','1 Unidad','2.50',24,0],
            [2,'Cheetos 74g','cheetos-74g.jpg','cheetos-74g','1 Unidad','1.30',24,1],
            [2,'Chizitos 190g','chizitos-190g.jpg','chizitos-190g','1 Unidad','2.00',24,0],
            [2,'Papas Lays 32g','papas-lays-32g.jpg','papas-lays-32g','1 Unidad','1.20',24,0],
            [2,'Tortees Picante 138g','tortees-picante-138g.jpg','tortees-picante-138g','1 Unidad','2.20',24,1],
            [3,'Oreo Barra Crujiente 20g','oreo-barra-crujiente-20g.jpg','oreo-barra-crujiente-20g','1 Unidad','1.50',24,0],
            [3,'Princesa','princesa.jpg','princesa','1 Unidad','1.50',24,1],
            [3,'Sublime Clásico 100g','sublime-clasico-100g.jpg','sublime-clasico-100g','1 Unidad','2.50',24,1],
            [4,'Chocosada 6unid','chocosada-6unid.jpg','chocosada-6unid','Paquete 6 unidades','7.20',24,1],
            [4,'Coronita 6unid','coronita-6unid.jpg','coronita-6unid','Paquete 6 unidades','4.80',24,0],
            [4,'Casino Menta','casino-menta.jpg','casino-menta','1 Unidad','0.80',24,0],
            [5,'Spaghetti Don Victorio 500g','spaghetti-don-victorio-500g.jpg','spaghetti-don-victorio-500g','1 Unidad','2.50',24,0],
            [5,'Aceite Primor 500ml','aceite-primor-500ml.jpg','aceite-primor-500ml','1 Unidad','9.50',24,1],
            [5,'Arroz Costeño 750g','arroz-costeno-750g.jpg','arroz-costeno-750g','1 Unidad','2.50',24,0],
            [5,'Atún A1 Pack 3','atun-a1-pack-3.jpg','atun-a1-pack-3','3 Unidad','15.00',24,1],
        ];
        foreach($productos as $producto){
            DB::table('productos')->insert([
                'categoria_id' => $producto[0],
                'nombre' => $producto[1],
                'imagen'=> $producto[2],
                'url_seo'=> $producto[3],
                'descripcion'=> $producto[4],
                'precio'=> $producto[5],
                'existencias'=> $producto[6],
                'portada'=> $producto[7],
            ]);
        }
    }
}
