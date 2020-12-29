<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ClientePotencia;

class TentativaContatos extends Model
{
    public function clientePotencia(){
        //Tentativa de contato pertence a um cliente
        return $this->belongsTo('App\ClientePotencia');

    }

    static function novoTentativaContato($id, $tipoContato){
        //Recebe o valor do cliente a partir de um ID
        $cliente = ClientePotencia::find($id);
        //Cria uma nova tentativa de contato
        $tentativa = new TentativaContatos();
        //Define o tipo de contato que foi feito
        $tentativa->tipo_contato = $tipoContato;
        //Define a data do contato como a data atual
        $tentativa->data_contato = date('Y/m/d H:i:s');
        //Define o ID do cliente que foi feito a tentativa do contato
        $tentativa->cliente_potencia_id = $id;
        //Associa o cliente recebido anteriormente a tentativa de contato criada
        $tentativa->clientePotencia()->associate($cliente);
        //Salva os dados no banco de dados
        $tentativa->save();

    }

    static function getTentativas($id){
        //retorna todas tentativas de contato com um usuario a partir de seu ID
        return self::where('cliente_potencia_id', '=', $id)->get();

    }
}
