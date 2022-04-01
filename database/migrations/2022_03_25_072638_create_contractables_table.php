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
        Schema::create('contractables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contractable_id'); // ID tabla de la que viene
            $table->string('contractable_type');//donde se guardara de que tabla viene
            $table->unsignedBigInteger('contract_id');//llave foranea contract
            $table->boolean('status');
            $table->timestamps();

            //relacion contracts
            $table->foreign('contract_id')->references('id')->on('contracts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contractables');
    }
};
