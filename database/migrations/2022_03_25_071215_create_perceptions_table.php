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
        Schema::create('perceptions', function (Blueprint $table) {
            $table->id();
            $table->string('clave')->unique()->nullable(false);
            $table->string('nombre');
            $table->unsignedBigInteger('per_sat_id');// LLave foranea sat percepciones
            $table->timestamps();

            //relacion sat percepciones
            $table->foreign('per_sat_id')->references('id')->on('satperceptions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perceptions');
    }
};
