<?php

use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cliente_potencias')->insert(
          ['login' => 'yago.gomes', 'localidade' => 'Rio das Ostras',
            'potencia_atual' => '-28.84', 'potencia_anterior' => '-28.54',
            'potencia_dias_atras' => '-27.97']);
        DB::table('cliente_potencias')->insert(
          ['login' => 'teste.teste', 'localidade' => 'Barra de São João',
            'potencia_atual' => '-27.84', 'potencia_anterior' => '-28.54',
            'potencia_dias_atras' => '-27.97']);
        DB::table('cliente_potencias')->insert(
          ['login' => 'teste.teste2', 'localidade' => 'Casimiro de Abreu',
            'potencia_atual' => '-28.34', 'potencia_anterior' => '-27.54',
            'potencia_dias_atras' => '-27.97']);
        DB::table('cliente_potencias')->insert(
          ['login' => 'teste.teste3', 'localidade' => 'Rio das Ostras',
            'potencia_atual' => '-29.84', 'potencia_anterior' => '-27.54',
            'potencia_dias_atras' => '-27.97']);
        DB::table('cliente_potencias')->insert(
          ['login' => 'teste.teste4', 'localidade' => 'Barra de São João',
            'potencia_atual' => '-28.84', 'potencia_anterior' => '-28.54',
            'potencia_dias_atras' => '-27.97']);
        DB::table('cliente_potencias')->insert(
          ['login' => 'teste.teste5', 'localidade' => 'Rio das Ostras',
            'potencia_atual' => '-30.84', 'potencia_anterior' => '-28.54',
            'potencia_dias_atras' => '-27.97']);
        DB::table('cliente_potencias')->insert(
          ['login' => 'teste.teste6', 'localidade' => 'Rio das Ostras',
            'potencia_atual' => '-31.84', 'potencia_anterior' => '-28.54',
            'potencia_dias_atras' => '-27.97']);
        DB::table('cliente_potencias')->insert(
          ['login' => 'teste.teste7', 'localidade' => 'Rio das Ostras',
            'potencia_atual' => '-27.84', 'potencia_anterior' => '-28.54',
            'potencia_dias_atras' => '-27.97']);
        DB::table('cliente_potencias')->insert(
          ['login' => 'teste.teste8', 'localidade' => 'Rio das Ostras',
            'potencia_atual' => '-28.13', 'potencia_anterior' => '-28.54',
            'potencia_dias_atras' => '-27.97']);
        DB::table('cliente_potencias')->insert(
          ['login' => 'teste.teste9', 'localidade' => 'Rio das Ostras',
            'potencia_atual' => '-29.11', 'potencia_anterior' => '-28.54',
            'potencia_dias_atras' => '-27.97']);
        DB::table('cliente_potencias')->insert(
          ['login' => 'teste.teste10', 'localidade' => 'Rio das Ostras',
            'potencia_atual' => '-28.64', 'potencia_anterior' => '-28.54',
            'potencia_dias_atras' => '-27.97']);

    }
}
