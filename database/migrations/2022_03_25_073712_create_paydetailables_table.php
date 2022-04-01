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
        Schema::create('paydetailables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paydetailable_id'); // ID tabla de la que viene
            $table->string('paydetailable_type');//donde se guardara de que tabla viene
            $table->unsignedBigInteger('paydetail_id');//llave foranea contract, la tabla unica
            $table->double('monto',8,2);
            $table->timestamps();

            //relacion nominadetails
            $table->foreign('paydetail_id')->references('id')->on('paydetails');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paydetailables');
    }
};
