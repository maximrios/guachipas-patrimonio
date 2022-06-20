<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderProductStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_product_statuses')->insert(array(
            array (
                'id' => 1,
                'name' => 'Muy bueno',
            ),
            array (
                'id' => 2,
                'name' => 'Bueno',
            ),
            array (
                'id' => 3,
                'name' => 'Regular',
            ),
            array (
                'id' => 4,
                'name' => 'Deficiente',
            ),
            array (
                'id' => 5,
                'name' => 'Malo',
            ),
        ));
    }
}
