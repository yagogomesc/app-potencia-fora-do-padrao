<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcosPotenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oco_potencia_agendados', function (Blueprint $table) {
          $table->bigIncrements('agendado_id');
          $table->integer('ocorrencia');
          $table->boolean('atendido')->nullable();
          $table->float('potencia_pos_reparo')->nullable();
          $table->bigInteger('cliente_potencia_id')->unsigned()->nullable();
          $table->foreign('cliente_potencia_id')->references('id')->on('cliente_potencias');
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
        Schema::dropIfExists('oco_potencia_agendados');
    }
}
