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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('worker_id');    //llave foranea trabajadores
            $table->unsignedBigInteger('regime_id');   //llave foranea regimen
            $table->unsignedBigInteger('tax_id');    //llave foranea fiscal
            $table->unsignedBigInteger('workday_id');   //llave foranea jornadas
            $table->unsignedBigInteger('tcontract_id');    //llave foranea tpcontratos
            $table->unsignedBigInteger('project_id');  //llave foranea proyectos
            $table->unsignedBigInteger('position_id');    //llave foranea puestos
            $table->unsignedBigInteger('department_id');  //llave foranea departamentos
            $table->unsignedBigInteger('municipality_id'); //llave foranea municipios
            $table->unsignedBigInteger('period_id');   //llave foranea perpagos
            $table->boolean('sindicalizado');
            $table->boolean('status');
            $table->text('observaciones');
            $table->timestamps();

            //relaciones
            $table->foreign('worker_id')->references('id')->on('workers'); //relacion tabla trabajadores
            $table->foreign('regime_id')->references('id')->on('regimes'); //relacion tabla regimen
            $table->foreign('tax_id')->references('id')->on('taxs');   //relacion tabla fiscal
            $table->foreign('workday_id')->references('id')->on('workdays');    //relacion tabla jornadas
            $table->foreign('tcontract_id')->references('id')->on('tcontracts');  //relacion tabla tpcontratos
            $table->foreign('project_id')->references('id')->on('projects');  //relacion tabla proyectos
            $table->foreign('position_id')->references('id')->on('positions');  //relacion tabla puestos
            $table->foreign('department_id')->references('id')->on('departments');  //relacion tabla departamentos
            $table->foreign('municipality_id')->references('id')->on('municipalities');    //relacion tabla municipios
            $table->foreign('period_id')->references('id')->on('periods');    //relacion tabla perpagos
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
};
