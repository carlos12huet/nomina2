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
            $table->unsignedBigInteger('contract_id')->nullable(false);  //llave foranea contract
            $table->unsignedBigInteger('payroll_id')->nullable(false);    //llave foranea nomina
            $table->double('percepcion',15,5)->nullable();
            $table->double('per_gravable',15,5)->nullable();
            $table->double('deduccion',15,5)->nullable();
            $table->double('monto_total',15,5)->nullable();
            $table->date('created_at');
            $table->date('updated_at')->nullable();

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
