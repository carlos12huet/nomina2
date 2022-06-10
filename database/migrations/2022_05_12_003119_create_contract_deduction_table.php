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
        Schema::create('contract_deduction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('deduction_id');
            $table->unsignedBigInteger('contract_id');
            $table->timestamps();
            $table->foreign('deduction_id')->references('id')->on('deductions')->onDelete('cascade');
            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract_deduction');
    }
};
