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
        Schema::create('department_project', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id')->nullable(false); //Llave foranea proyectos
            $table->unsignedBigInteger('department_id');//llave foranea departamento
            $table->timestamps();
            
            //Relacion con proyectos
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            //relacion departamento
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department_project');
    }
};
