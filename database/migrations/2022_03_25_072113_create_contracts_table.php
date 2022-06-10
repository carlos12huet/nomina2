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
            $table->unsignedBigInteger('worker_id')->nullable(false);    //llave foranea trabajadores
            $table->unsignedBigInteger('regime_id')->nullable(false);   //llave foranea regimen
            $table->unsignedBigInteger('tax_id')->nullable(false);    //llave foranea fiscal
            $table->unsignedBigInteger('workday_id')->nullable(false);   //llave foranea jornadas
            $table->unsignedBigInteger('tcontract_id')->nullable(false);    //llave foranea tpcontratos
            $table->unsignedBigInteger('project_id')->nullable(false);  //llave foranea proyectos
            $table->unsignedBigInteger('position_id')->nullable(false);    //llave foranea puestos
            $table->unsignedBigInteger('department_id')->nullable(false);  //llave foranea departamentos
            $table->unsignedBigInteger('municipality_id')->nullable(false); //llave foranea municipios
            $table->unsignedBigInteger('period_id')->nullable(false);   //llave foranea perpagos
            $table->boolean('sindicalizado');
            $table->boolean('status');
            $table->text('observaciones')->nullable();
            $table->date('created_at');
            $table->date('updated_at')->nullable();

            //relaciones
            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('cascade'); //relacion tabla trabajadores
            $table->foreign('regime_id')->references('id')->on('regimes')->onDelete('cascade'); //relacion tabla regimen
            $table->foreign('tax_id')->references('id')->on('taxs')->onDelete('cascade');   //relacion tabla fiscal
            $table->foreign('workday_id')->references('id')->on('workdays')->onDelete('cascade');    //relacion tabla jornadas
            $table->foreign('tcontract_id')->references('id')->on('tcontracts')->onDelete('cascade');  //relacion tabla tpcontratos
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');  //relacion tabla proyectos
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');  //relacion tabla puestos
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');  //relacion tabla departamentos
            $table->foreign('municipality_id')->references('id')->on('municipalities')->onDelete('cascade');    //relacion tabla municipios
            $table->foreign('period_id')->references('id')->on('periods')->onDelete('cascade');    //relacion tabla perpagos
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
