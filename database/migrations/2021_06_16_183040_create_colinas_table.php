<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colinas', function (Blueprint $table) {
            $table->id('codigo')->unsigned();
            $table->string('dato', 100);
            $table->string('pregunta_1', 150);
            $table->string('pregunta_2', 150);
            $table->string('pregunta_3', 150);
            $table->integer('codigo_registro');
            $table->string('telefono');
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
        Schema::dropIfExists('colinas');
    }
}
