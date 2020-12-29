<html>
<head>
  <title>@yield('titulo')</title>
  <link href="{{asset('css/app.css')}}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

  <meta name="csrf-token" content="{{csrf_token()}}">
  
</head>

<div class="container">

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Potencias</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/">Fora do padrão</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/agendados">Agendados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/atendidos">Atendidos</a>
        </li>
      </ul>
    </div>
  </nav>

    @yield('conteudo')

    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>

  </body>
</html>