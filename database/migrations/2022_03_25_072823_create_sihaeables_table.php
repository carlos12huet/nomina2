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
        Schema::create('sihaeables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sihaeable_id'); // ID tabla de la que viene
            $table->string('sihaeable_type');//donde se guardara de que tabla viene
            $table->unsignedBigInteger('sihae_id');//llave foranea contract, la tabla unica
            $table->timestamps();

            //relacion sihae
            $table->foreign('sihae_id')->references('id')->on('sihae');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sihaeables');
    }
};
