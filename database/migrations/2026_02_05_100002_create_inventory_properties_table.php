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
        Schema::create('inventory_properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventory_id')->constrained('inventories')->onDelete('cascade');
            $table->string('property_type'); // terreno, edificio, oficina
            $table->string('address')->nullable();
            $table->string('locality')->nullable();
            $table->string('cadastral_number')->nullable();
            $table->string('parcel')->nullable();
            $table->string('deed_number')->nullable();
            $table->date('deed_date')->nullable();
            $table->string('acquisition_type')->nullable(); // compra, donación, cesión
            $table->decimal('acquisition_value', 14, 2)->default(0);
            $table->string('valuation_type')->nullable(); // fiscal, compra, tasación
            $table->decimal('valuation_value', 14, 2)->default(0);
            $table->string('use_type')->nullable(); // administrativo, salud, etc.
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
        Schema::dropIfExists('inventory_properties');
    }
};
