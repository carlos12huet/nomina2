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
        Schema::create('municipality_project', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('municipality_id'); //Llave foranea municipio
            $table->unsignedBigInteger('project_id'); //llave foranea proyeco
            $table->timestamps();

            $table->foreign('municipality_id')->references('id')->on('municipalities');
            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipality_project');
    }
};
