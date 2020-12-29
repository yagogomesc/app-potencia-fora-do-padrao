<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTentativaContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * 
     * Tipos de contato: 
     * 1 - Telefone
     * 2 - Whatsapp
     * 3 - Email
     * 4 - Telefone e Whatsapp
     * 5 - Telefone e Email
     * 6 - Whatsapp e Email 
     * 7 - Telefone, Whatsapp e Email
     */
    public function up()
    {
        Schema::create('tentativa_contatos', function (Blueprint $table) {
            $table->bigIncrements('tentativa_contato_id');
            $table->integer('tipo_contato');
            $table->dateTime('data_contato');
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
        Schema::dropIfExists('tentativa_contatos');
    }
}
