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
        Schema::create('tabdetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tab_id')->nullable(false);   //llave foranea tabs
            $table->unsignedBigInteger('position_id')->nullable(false);    //llave foranea puestos
            $table->double('compensacion',15,5)->nullable();
            $table->string('zona_economica')->nullable();
            $table->double('sueldo_diario',15,5);
            $table->double('sueldo_mensual',15,5);
            $table->date('created_at');
            $table->date('updated_at')->nullable();

            //relaciones
            $table->foreign('tab_id')->references('id')->on('tabs');//TABS
            $table->foreign('position_id')->references('id')->on('positions');//PUESTOS
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabdetails');
    }
};