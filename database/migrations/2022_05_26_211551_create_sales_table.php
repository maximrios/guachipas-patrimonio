<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigInteger('id', true)->unsigned();
            $table->foreignId('user_id');
            $table->foreignId('status_id')->default(1);
            $table->foreignId('area_id')->nullable();
            $table->string('character', 191)->nullable();
            $table->string('institution', 191)->nullable();
            $table->string('area_name', 191)->nullable();
			$table->string('file', 191)->nullable();
            $table->integer('number')->nullable();
            $table->integer('year')->nullable();
            $table->dateTime('generated_at')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
