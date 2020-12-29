<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientePotenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_potencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('login');
            $table->string('localidade');
            $table->float('potencia_atual');
            $table->float('potencia_anterior');
            $table->float('potencia_dias_atras');
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
        Schema::dropIfExists('cliente_potencias');
    }
}
