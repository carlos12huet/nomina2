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
            $table->double('desde',15,5);
            $table->double('hasta',15,5);
            $table->double('cantidad',15,5);
            $table->unsignedBigInteger('subsidy_id')->nullable(false);//llave foranea subsidio
            $table->date('created_at');
            $table->date('updated_at')->nullable();

            $table->foreign('subsidy_id')->references('id')->on('subsidies')->onDelete('cascade');
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
