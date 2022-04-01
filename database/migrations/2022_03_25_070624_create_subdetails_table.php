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
        Schema::create('subdetails', function (Blueprint $table) {
            $table->id();
            $table->double('desde',8,2);
            $table->double('hasta',8,2);
            $table->double('cantidad',8,2);
            $table->unsignedBigInteger('subsidy_id')->nullable(false);//llave foranea subsidio
            $table->timestamps();

            $table->foreign('subsidy_id')->references('id')->on('subsidies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subdetails');
    }
};
