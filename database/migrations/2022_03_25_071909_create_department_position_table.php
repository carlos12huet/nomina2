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
        Schema::create('department_position', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id');//llave foranea departamento
            $table->unsignedBigInteger('position_id');//Llave foranea puesto
            $table->timestamps();

            //relacion departamento
            $table->foreign('department_id')->references('id')->on('departments');
            //relacion puesto
            $table->foreign('position_id')->references('id')->on('positions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department_position');
    }
};
