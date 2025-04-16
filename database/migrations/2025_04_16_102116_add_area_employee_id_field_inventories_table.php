<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAreaEmployeeIdFieldInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventories', function (Blueprint $table) {
            $table->integer('area_id')->nullable()->default(null);
            $table->integer('employee_id')->nullable()->default(null)->after('area_id');
            $table->boolean('available')->default(1)->after('status_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventories', function (Blueprint $table) {
            $table->dropColumn('area_id');
            $table->dropColumn('employee_id');
            $table->dropColumn('available');
        });
    }
}
