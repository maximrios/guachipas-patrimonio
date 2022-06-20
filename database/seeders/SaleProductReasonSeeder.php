<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleProductReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sale_product_reasons')->insert(array(
            array (
                'id' => 10,
                'name' => 'Pérdida o robo',
            ),
            array (
                'id' => 2,
                'name' => 'Transferencias definitivas',
            ),
            array (
                'id' => 11,
                'name' => 'Destrucción',
            ),
            array (
                'id' => 4,
                'name' => 'Donación',
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
                'id' => 12,
                'name' => 'Modificación total',
            ),
            array (
                'id' => 13,
                'name' => 'Arrendamiento',
            ),
            array (
                'id' => 14,
                'name' => 'Compra y Venta',
            ),
        ));
    }
}
