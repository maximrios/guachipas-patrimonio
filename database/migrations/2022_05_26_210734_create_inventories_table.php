<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->bigInteger('id', true)->unsigned();
            $table->foreignId('organization_id');
            $table->foreignId('product_id');
            $table->foreignId('status_id');
            $table->foreignId('order_id')->nullable();
            $table->foreignId('sale_id')->nullable();
            $table->integer('registration');
            $table->integer('current_organization');
            $table->text('description')->nullable();
            $table->text('observations')->nullable();
            $table->timestamps();
			$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
