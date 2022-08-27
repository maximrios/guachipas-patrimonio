<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_statuses')->insert([
            array (
                'id' => 1,
                'name' => 'Pendiente',
                'slug' => 'pending',
            ),
            array (
                'id' => 2,
                'name' => 'Aprobada',
                'slug' => 'approve',
            ),
            array (
                'id' => 3,
                'name' => 'Cancelada',
                'slug' => 'cancelled',
            ),
        ]);
    }
}
