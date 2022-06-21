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
        Schema::create('compdetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('complement_id');
            $table->unsignedBigInteger('worker_id');
            $table->boolean('status');
            $table->date('autorizacion');
            $table->double('monto',15,5);
            $table->timestamps();

            $table->foreign('complement_id')->references('id')->on('complements')->onDelete('cascade');
            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compdetails');
    }
};
