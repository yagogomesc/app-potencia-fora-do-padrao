<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClientePotencia;

class ClientePotenciaControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = ClientePotencia::getClientes();
        
        return view('potencias', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Recebe dados do request para ser passado a model
        $clienteId = $request->input('id');
        $ocorrencia = $request->input('ocorrencia');
        //Função da model para registrar o cliente que esta agendado
        ClientePotencia::clienteAgendado($clienteId, $ocorrencia);
        
        return redirect('/potencias');
    }
}
