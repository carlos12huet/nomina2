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
        Schema::create('infonacot', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('worker_id');
            $table->double('prestamo',15,5);
            $table->double('pago_quincenal',15,5);
            $table->double('pago_total',15,5)->nullable();
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infonacot');
    }
};
