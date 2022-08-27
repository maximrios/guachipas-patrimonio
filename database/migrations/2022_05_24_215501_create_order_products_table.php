<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->bigInteger('id', true)->unsigned();
            $table->foreignId('order_id');
            $table->foreignId('product_id');
            $table->foreignId('order_product_found_id');
            $table->foreignId('order_product_status_id');
            $table->foreignId('order_product_origin_id');
            $table->tinyInteger('valuation');
            $table->integer('quantity');
            $table->text('description');
            $table->integer('registration_from')->nullable();
            $table->integer('registration_to')->nullable();
            $table->integer('section')->nullable(0);
            $table->integer('subsection')->nullable(0);
            $table->foreignId('invoice_id')->nullable();
            $table->string('invoice')->nullable();
            $table->foreignId('order_payment_id')->nullable();
            $table->string('order_payment')->nullable();
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
        Schema::dropIfExists('order_products');
    }
}
