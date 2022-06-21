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
            $table->unsignedBigInteger('satperception_id')->nullable();// LLave foranea sat percepciones
            $table->date('created_at');
            $table->date('updated_at')->nullable();

            //relacion sat percepciones
            $table->foreign('satperception_id')->references('id')->on('satperceptions');
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
