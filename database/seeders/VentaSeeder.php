<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ventas')->insert([
            'id' => 1,
            'cliente_id' => 1,
            'forma_envio' => 'D',
            'forma_pago' => 'P',
            'direccion' => 'Calle Las Gaviotas 126, Lince',
            'codigo_transaccion' => '3215478541',
            'total' => 7.9,
            'pago' => 1,
            'fecha_pago' => '2021-06-10 14:12:00',
            'fecha_registro' => '2021-06-10 14:12:00',
            'estado' => 'E',
        ]);
        DB::table('venta_productos')->insert([
            'venta_id' => 1,
            'producto_id' => 3,
            'precio' => 2.5,
            'cantidad' => 1,
            'total' => 2.5,
        ]);
        DB::table('venta_productos')->insert([
            'venta_id' => 1,
            'producto_id' => 9,
            'precio' => 1.5,
            'cantidad' => 2,
            'total' => 3,
        ]);
        DB::table('venta_productos')->insert([
            'venta_id' => 1,
            'producto_id' => 13,
            'precio' => 0.8,
            'cantidad' => 3,
            'total' => 2.4,
        ]);
        DB::table('ventas')->insert([
            'id' => 2,
            'cliente_id' => 1,
            'forma_envio' => 'D',
            'forma_pago' => 'P',
            'direccion' => 'Calle Las Gaviotas 126, Lince',
            'codigo_transaccion' => '5120021485',
            'total' => 8.9,
            'pago' => 1,
            'fecha_pago' => '2021-06-17 18:37:00',
            'fecha_registro' => '2021-06-17 18:37:00',
            'estado' => 'E',
        ]);
        DB::table('venta_productos')->insert([
            'venta_id' => 2,
            'producto_id' => 8,
            'precio' => 1.5,
            'cantidad' => 3,
            'total' => 4.5,
        ]);
        DB::table('venta_productos')->insert([
            'venta_id' => 2,
            'producto_id' => 2,
            'precio' => 2.2,
            'cantidad' => 2,
            'total' => 4.4,
        ]);
    }
}
