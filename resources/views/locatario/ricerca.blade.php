@extends('layouts/public')
@section('title', 'Offerte')

<!-- inizio sezione prodotti -->
@section('content')
<div class="container">
<h2>Offerte Opzionate </h2>
</div>
<!--ci andrà la navbar-->




<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <div>
            Stai cercando in: 
        </div>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Cerca città" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cerca</button>
    </form>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Prezzi
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tipologia di affitto
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Appartamento</a>
          <a class="dropdown-item" href="#">Posto letto</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
  </div>
</nav>


<!--sopra stà la navbar-->


@foreach ($risultati as $offerta)
<div class="container">
    <div class="row single-offerta mb-5">
        <div class="col-sm-4">
            @include('offerta/carousel')
        </div>
        <div class="col-sm-8">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10">
                        <h3 class="title-offerta">
                            {{ $offerta->titolo }}
                        </h3>
                        <div class="subtitle-offerta">
                            <div>@if ($offerta->tipologia == 'a')
                                    appartamento
                                @elseif ($offerta->tipologia == 'p')
                                    Posto letto
                                @endif
                            </div>
                            <div>{{ $offerta->via }} n.{{$offerta->ncivico}}, {{$offerta->citta}}</div>
                            <div class="mt-2">
                                Descrizione:<br>
                                {{$offerta->descrizione}}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <h4 class="price-offerta">{{ $offerta->prezzo }}€</h4>
                    </div>
                    <div class="row justify-content-end">
                        <div class = "col-3 text-end btn-sm ">
                            <a type = "button" class ="aggiungi_opz">Opziona offerta</a>
                            <a type = "button" class ="rimuovi_opz">Rimuovi opzionamento</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endforeach
</div>
@endsection
