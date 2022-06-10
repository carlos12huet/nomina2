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
        Schema::create('paydetail_perception', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paydetail_id');
            $table->unsignedBigInteger('perception_id');
            $table->double('monto',15,5);
            $table->timestamps();
            $table->foreign('paydetail_id')->references('id')->on('paydetails');
            $table->foreign('perception_id')->references('id')->on('perceptions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paydetail_perception');
    }
};
