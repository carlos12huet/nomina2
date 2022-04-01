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
        Schema::create('paydetails', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->unsignedBigInteger('contract_id');  //llave foranea contract
            $table->unsignedBigInteger('payroll_id');    //llave foranea nomina
            $table->double('percepcion',8,2);
            $table->double('per_gravable',8,2);
            $table->double('deduccion',8,2);
            $table->double('monto_total',8,2);
            $table->timestamps();

            //relacion nomina y contracts
            $table->foreign('contract_id')->references('id')->on('contracts');
            $table->foreign('payroll_id')->references('id')->on('payrolls');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paydetails');
    }
};
