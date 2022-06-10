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
        Schema::create('contract_perception', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('perception_id');
            $table->unsignedBigInteger('contract_id');
            $table->timestamps();

            $table->foreign('perception_id')->references('id')->on('perceptions')->onDelete('cascade');
            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract_perception');
    }
};
