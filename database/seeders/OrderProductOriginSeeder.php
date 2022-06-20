<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderProductOriginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_product_origins')->insert(array(
            array (
                'id' => 1,
                'name' => 'Compra',
            ),
            array (
                'id' => 2,
                'name' => 'Transferencias definitivas',
            ),
            array (
                'id' => 3,
                'name' => 'Construcción',
            ),
            array (
                'id' => 4,
                'name' => 'Donación',
            ),
            array (
                'id' => 5,
                'name' => 'Cooperación',
            ),
            array (
                'id' => 6,
                'name' => 'Recuperación',
            ),
            array (
                'id' => 7,
                'name' => 'Préstamo',
            ),
            array (
                'id' => 8,
                'name' => 'Rezago',
            ),
            array (
                'id' => 9,
                'name' => 'Desuso',
            ),
            array (
                'id' => 10,
                'name' => 'Robo o perdida',
            ),
            array (
                'id' => 11,
                'name' => 'Destrucción',
            ),
            array (
                'id' => 12,
                'name' => 'Modificación',
            ),
            array (
                'id' => 13,
                'name' => 'Arrendamiento',
            ),
            array (
                'id' => 14,
                'name' => 'Compra y Venta',
            ),
            array (
                'id' => 15,
                'name' => 'Por inventario',
            ),
        ));
    }
}
