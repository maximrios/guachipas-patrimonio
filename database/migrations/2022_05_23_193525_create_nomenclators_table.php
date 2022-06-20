<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNomenclatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nomenclators', function (Blueprint $table) {
            $table->bigInteger('id', true)->unsigned();
			$table->integer('type');
            $table->integer('group');
            $table->integer('subgroup');
            $table->integer('account');
            $table->integer('species');
			$table->string('name', 191);
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
        Schema::dropIfExists('nomenclators');
    }
}
