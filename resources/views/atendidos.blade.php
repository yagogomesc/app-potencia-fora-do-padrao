@extends('layout.principal')

@section('titulo', 'Clientes Atendidos')

@section('conteudo')
<h2 id="titulo">Clientes atendidos</h2>

    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Cliente</th>
          <th scope="col">Localidade</th>
          <th scope="col">Potencia pós reparo</th>
          <th scope="col">Ocorrencia</th>
        </tr>
      </thead>
      <tbody>
        @foreach($clientes as $cliente)
        <tr>
          <th><a href="{{$cliente['cliente_potencia']['login']}}" target="_blank"> {{$cliente['cliente_potencia']['login']}} </a></th>
          <td>{{$cliente['cliente_potencia']['localidade']}}</td>
          <td>
            <span class="content show-tooltip" data-html="true"
             id="potencia"
             rel="tooltip"
             title="23/06: {{$cliente['cliente_potencia']['potencia_anterior']}} dBm <br> 22/06: {{$cliente['cliente_potencia']['potencia_dias_atras']}} dBm">
             {{$cliente['potencia_pos_reparo']}} dBm
            </span>
          </td>
          <td><a href="{{$cliente['ocorrencia']}}" target="_blank"> {{$cliente['ocorrencia']}}</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>


  </div>

@endsection
