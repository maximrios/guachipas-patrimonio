<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributeValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attribute_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('inventory_id')->unsigned()->index('product_attributes_inventory_id_foreign');
            $table->bigInteger('attribute_id')->unsigned()->index('product_attributes_attribute_id_foreign');
            $table->string('value', 191)->nullable();
            $table->bigInteger('option_id')->unsigned()->nullable()->index('product_attributes_option_id_foreign')->nullable();
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
        Schema::dropIfExists('product_attribute_values');
    }
}
