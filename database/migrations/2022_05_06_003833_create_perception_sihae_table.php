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
        Schema::create('perception_sihae', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sihae_id');
            $table->unsignedBigInteger('perception_id');
            $table->timestamps();

            $table->foreign('sihae_id')->references('id')->on('sihaes')->onDelete('cascade');
            $table->foreign('perception_id')->references('id')->on('perceptions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perception_sihae');
    }
};
