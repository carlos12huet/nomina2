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
        Schema::create('isr', function (Blueprint $table) {
            $table->id();
            $table->string('clave')->unique()->nullable(false);
            $table->string('descripcion')->unique()->nullable(false);
            $table->string('tipo');
            $table->boolean('status');
            $table->date('created_at');
            $table->date('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('isr');
    }
};
