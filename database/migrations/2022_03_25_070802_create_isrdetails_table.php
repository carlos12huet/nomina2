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
            $table->double('lim_inf',15,5);
            $table->double('lim_sup',15,5);
            $table->double('cuota',15,5);
            $table->double('excedente',15,5);
            $table->unsignedBigInteger('isr_id')->nullable(false);//llave foranea ISR
            $table->date('created_at');
            $table->date('updated_at')->nullable();

            //Relacion tabla isr
            $table->foreign('isr_id')->references('id')->on('isr')->onDelete('cascade');
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
