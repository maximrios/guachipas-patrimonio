<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizations')->insert(
            array (
                'id' => 1,
                'code' => '5',
                'name' => env('ADMINO_NAME', 'Admino'),
                'parent_id' => 0,
                '_lft' => 1,
                '_rgt' => 2
            ),
        );
    }
}
