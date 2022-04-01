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
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('rfc',13)->unique()->nullable(false);
            $table->string('curp',18)->unique()->nullable(false);
            $table->string('nss',11)->unique()->nullable(false);
            $table->string('nombre',45)->unique()->nullable(false);
            $table->string('correo',45)->unique()->nullable();
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workers');
    }
};
