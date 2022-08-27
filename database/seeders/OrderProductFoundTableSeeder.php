<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderProductFoundTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_product_founds')->insert([
            array (
                'id' => 1,
                'name' => 'Arancelamiento',
            ),
            array (
                'id' => 2,
                'name' => 'Presupuestario',
            ),
            array (
                'id' => 3,
                'name' => 'Plan Sumar',
            ),
            array (
                'id' => 4,
                'name' => 'Otros',
            ),
        ]);
    }
}
