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
        Schema::create('isrdetails', function (Blueprint $table) {
            $table->id();
            $table->double('lim_inf',8,2);
            $table->double('lim_sup',8,2);
            $table->double('cuota',8,2);
            $table->double('excedente',8,2);
            $table->unsignedBigInteger('isr_id');//llave foranea ISR
            $table->timestamps();

            //Relacion tabla isr
            $table->foreign('isr_id')->references('id')->on('isr');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('isrdetails');
    }
};
