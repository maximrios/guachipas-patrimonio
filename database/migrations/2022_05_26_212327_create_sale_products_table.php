<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_products', function (Blueprint $table) {
            $table->bigInteger('id', true)->unsigned();
            $table->foreignId('sale_id');
            $table->foreignId('inventory_id');
            $table->foreignId('sale_product_status_id');
            $table->foreignId('sale_product_reason_id');
            $table->integer('quantity');
            $table->integer('registration_from');
            $table->integer('registration_to');
            $table->text('description');
            $table->integer('section')->nullable(0);
            $table->integer('subsection')->nullable(0);
            $table->foreignId('order_id')->nullable();
            $table->decimal('unit_price')->nullable();
            $table->decimal('total_price')->nullable();
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
        Schema::dropIfExists('sale_products');
    }
}
