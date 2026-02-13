<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventory_id')->constrained('inventories')->onDelete('cascade');
            $table->string('vehicle_type'); // auto, camioneta, maquinaria
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->year('year')->nullable();
            $table->string('plate')->nullable();
            $table->string('engine_number')->nullable();
            $table->string('chassis_number')->nullable();
            $table->string('color')->nullable();
            $table->string('acquisition_type')->nullable();
            $table->date('acquisition_date')->nullable();
            $table->decimal('acquisition_value', 14, 2)->default(0);
            $table->string('valuation_type')->nullable();
            $table->decimal('valuation_value', 14, 2)->default(0);
            $table->string('operational_status')->default('operativo'); // operativo, reparación, baja
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_vehicles');
    }
};
