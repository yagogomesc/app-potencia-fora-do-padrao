<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OcoPotenciaAgendados;

class OcoPotenciaControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Retorna todos os clientes agendados
        $clientes = OcoPotenciaAgendados::getOcosAgendadas();

        return view('agendados', compact('clientes'));
    }

    public function atendidos()
    {
        //Recebe todos os clientes que foram marcados como atendidos
        $clientes = OcoPotenciaAgendados::getOcosAtendidas();

        return view('atendidos', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Dados armazenados antes de serem usados como parametro para que possam ser tratados se necessario
        //Recebe valor da ID
        $id = $request->input('id');
        //Recebe o valor da potencia inserida
        $potencia = $request->input('potenciaPosReparo');
        //Marca que um cliente foi atendido
        OcoPotenciaAgendados::saveOcosAtendidas($id, $potencia);
        //Redireciona para pagina de agendados para que seja atualizado a lista após cliente ser marcado como atendido
        return redirect('/agendados');
    }
}
