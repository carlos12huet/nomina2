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
        Schema::create('deduction_paydetail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paydetail_id');
            $table->unsignedBigInteger('deduction_id');
            $table->double('monto',15,5);
            $table->timestamps();
            $table->foreign('paydetail_id')->references('id')->on('paydetails')->onDelete('cascade');
            $table->foreign('deduction_id')->references('id')->on('deductions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deduction_paydetail');
    }
};
