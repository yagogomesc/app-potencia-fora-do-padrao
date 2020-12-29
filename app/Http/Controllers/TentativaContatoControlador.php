<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TentativaContatos;

class TentativaContatoControlador extends Controller
{
    public function store(Request $request)
    {
        //Recebem dados que serão passados ao banco de dados
        $id = $request->input('id');
        $tipoContato = $request->input('tipoContato');
        //Registra uma nova tentativa de contato com o cliente
        TentativaContatos::novoTentativaContato($id, $tipoContato);

        return redirect('/potencias');
    }

    public function showJson($id)
    {
        //Recebe as tentativas de contato de um cliente a partir de seu ID
        $registro = TentativaContatos::getTentativas($id);

        //Retorna o valor recebi em JSON para que seja tratado e exibido
        return json_encode($registro);
    }
}
