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
        Schema::create('deductions', function (Blueprint $table) {
            $table->id();
            $table->string('clave')->unique()->nullable(false);
            $table->string('nombre');
            $table->unsignedBigInteger('satdeduction_id')->nullable(); //llave foranea sat deducciones
            $table->integer('tipo');
            $table->date('created_at');
            $table->date('updated_at')->nullable();
            $table->foreign('satdeduction_id')->references('id')->on('satdeductions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deductions');
    }
};
