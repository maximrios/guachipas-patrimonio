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
                'organization_id' => 0,
                'code' => '5',
                'name' => 'Hospital San Bernardo',
            ),
        );
    }
}
