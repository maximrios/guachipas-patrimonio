<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigInteger('id', true)->unsigned();
            $table->foreignId('category_id')->nullable();
			$table->string('type', 191);
            $table->string('group', 191);
            $table->string('subgroup', 191);
            $table->string('account', 191);
            $table->string('species', 191);
            $table->string('subspecies', 191)->nullable();
			$table->string('name', 191);
            $table->text('description')->nullable();
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
        Schema::dropIfExists('products');
    }
}
