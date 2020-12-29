@extends('layout.principal')

@section('titulo', 'Potencia Fora do Padrão')

@section('conteudo')
<h2 id="titulo">Potencia fora do padrão</h2>

    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Cliente</th>
          <th scope="col">Localidade</th>
          <th scope="col">Potencia atual</th>
          <th scope="col">Contato</th>
          <th scope="col">Ocorrencia</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($clientes as $cliente)

        <tr>
          <th>
            <a href="{{$cliente->login}}" target="_blank"> 
            {{$cliente->login}} 
            </a>
          </th>
          <td>{{$cliente->localidade}}</td>
          <td>
            <span class="content show-tooltip" data-html="true"
             id="potencia"
             rel="tooltip"
             title="23/06: {{$cliente->potencia_anterior}} dBm <br> 22/06: {{$cliente->potencia_dias_atras}} dBm">
              {{$cliente->potencia_atual}} dBm
            </span>
          </td>
          <td><button class="btn btn-warning btn-sm" id="tentativaBotao" data-toggle="modal" data-id="{{$cliente->id}}" data-target="#modalTentativa">Tentativa</button>
          <button class="btn btn-info btn-sm" id="registrosBotao" data-toggle="modal" data-id="{{$cliente->id}}" data-target="#modalRegistros">Registros</button></td>
          <form action="/potencias" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$cliente->id}}" >
            <td><input type="text" class="form-control col-sm-6" name="ocorrencia"></td>
            <td><button type="submit" class="btn btn-success btn-sm">Registrar
            </button></td>
          </form>
        </tr>
       
        @endforeach
      </tbody>
    </table>
      <div class="mx-auto" style="width: 200px;">{{$clientes->links()}}</div>
  </div>

  <!-- Modal tentativa de contato -->
  <div class="modal fade" id="modalTentativa" tabindex="-1" role="dialog" aria-labelledby="modalTentativa" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTentativaTitulo">Tentativa de contato</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <form action="/contato" class="modal-tentativa-contato" method="POST">
              @csrf
              <div class="form-group row">
                <label for="diaContato" class="col-sm-4 col-form-label">Dia do contato:</label>
                <input type="text" class="form-control col-sm-6" id="diaContato" name="diaContato" value="<?php echo date('d/m/Y H:i'); ?>" disabled />
              </div>
              <p id="teste"></p>
              <div class="form-group row">
                <label for="tipoContato" class="col-sm-4 col-form-label">Tipo de contato:</label>
                <select class="custom-select col-sm-6" id="tipoContato" name="tipoContato">
                  <option value="1">Telefone</option>
                  <option value="2">Whatsapp</option>
                  <option value="3">Email</option>
                  <option value="4">Telefone e Whatsapp</option>
                  <option value="5">Telefone e Email</option>
                  <option value="6">Whatsapp e Email</option>
                  <option value="7">Telefone, Whatsapp e Email</option>
                </select>
              </div>
            
          </div>
          <div class="modal-footer">
            <input type="hidden" id="contato_id" name="id" >
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" id="salvarTentativa" class="btn btn-primary">Salvar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- fim modal tentativa de contato -->

  <!-- Modal registros de contatos -->

  <div class="modal fade" id="modalRegistros" tabindex="-1" role="dialog" aria-labelledby="modalRegistros" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalRegistrosTitulo">Registros de contatos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Tipo de contato</th>
              <th scope="col">Data</th>
            </tr>
          </thead>
          <tbody id="registrosContatos">
            
          </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="limparModal()" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection
  <!-- fim modal registros de contatos-->