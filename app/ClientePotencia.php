<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OcoPotenciaAgendados;
use App\TentativaContatos;

class ClientePotencia extends Model
{
    public function ocosPotencia(){
        //Um cliente pode ter varios agendamentos
          return $this->hasMany('App\OcoPotenciaAgendados');
          
    }

    static function getClientes(){
        
        //Monta query na variavel
        $clientes = ClientePotencia::query();
        //Realiza Join com tabela onde estão registradas as ocorrencias abertas
        $clientes->leftjoin('oco_potencia_agendados', 'cliente_potencias.id', '=', 'oco_potencia_agendados.cliente_potencia_id')->orderby('potencia_atual', 'asc');
        //Condiciona a recuperar dados apenas onde não tiver cliente_potencia_id definida, dessa forma, 
        $clientes->where('ocorrencia', '=', null);
        //Realiza paginação da consulta de acordo com parametro passado como numero de resultados por pagina
        $clientes = $clientes->paginate(5);

        return $clientes;
    }

    static function clienteAgendado($id, $ocorrencia){
        //Encontra e armazena cliente que foi agendado
        $cliente = ClientePotencia::find($id);
        //Registra um novo agendamento de cliente
        $oco = new OcoPotenciaAgendados();
        //Passa dados para que sejam salvos no banco de dados
        $oco->ocorrencia = $ocorrencia;
        $oco->cliente_potencia_id = $id;
        //Associa o agendamento ao cliente armazenado anteriormente
        $oco->clientePotencia()->associate($cliente);
        //Salva no banco de dado os registros do agendamento
        $oco->save();
        
        //Utiliza a classe TentativaContatos para apagar as tentativas realizadas antes de que fosse agendado visita com o cliente.
        TentativaContatos::where('cliente_potencia_id', '=', $id)->delete();

    }
}
