<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OcoPotenciaAgendados extends Model
{

    public function clientePotencia(){
        //Uma ocorrencia agendada pertencia a um cliente
        return $this->belongsTo('App\ClientePotencia');

    }

    static function getOcosAgendadas(){
        //Retorna todos clientes que tenham ocorrencias agendadas e não estejam marcadas como atendido
        return self::with('clientePotencia')->where('atendido', '=', null)->get()->toArray();

    }

    static function getOcosAtendidas(){
        //Retorna da todos clientes com with na tabela de clientes que tiverem 1 na coluna de atendido
        return self::with('clientePotencia')->where('atendido', '=', 1)->get()->toArray();
    }

    static function saveOcosAtendidas($id, $potenciaPosReparo){
        //Salva no banco de dados o valor 1 na coluna de atendido do cliente
        return self::where('agendado_id', '=', $id)
        ->update(['atendido' => 1, 'potencia_pos_reparo' => $potenciaPosReparo]);

    }
}
