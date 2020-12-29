@extends('layout.principal')

@section('titulo', 'Clientes Agendados')

@section('conteudo')
    <h2 id="titulo">Clientes agendados</h2>
    
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Cliente</th>
          <th scope="col">Localidade</th>
          <th scope="col">Potência atual</th>
          <th scope="col">Ocorrencia</th>
          <th scope="col">Potência pós reparo</th>
          <th></th>
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
              {{$cliente['cliente_potencia']['potencia_atual']}} dBm
            </span>
          </td>
            <td><a href="{{$cliente['ocorrencia']}}" target="_blank"> {{$cliente['ocorrencia']}}</a></td>
             
          <td>
            <form action="/agendados" method="POST">
              @csrf
              <div class="input-group sm-3 col-sm-9">
                <input type="text" class="form-control" name="potenciaPosReparo" placeholder="Potencia pós reparo" aria-label="Potencia pós reparo" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2">dBm</span>
                </div>
              </div>
              </td>
              <td>
              <input type="hidden" name="id" value="{{$cliente['agendado_id']}}" />
              <button type="submit" class="btn btn-success btn-sm">Registrar
              </button>
              </td>
            </form>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection
