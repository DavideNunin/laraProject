@extends('layouts.public',['utente' => $type_user , 'home_type' => '$type_user'])

@section('title', 'Offerte')

<!-- inizio sezione prodotti -->
@section('content')
<div class="container">
<h2> Le tue Offerte </h2>
</div>
@foreach ($catalogo as $offerta)
<div class="container">
    <div class="row single-offerta mb-5">
        <div class="col-sm-4">
            @include('carousel')
        </div>
        <div class="col-sm-8">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10">
                        <h3 class="title-offerta">
                            <a href="https://www.youtube.com/watch?v=Z2Y1pHUfamM">{{ $offerta->titolo }}</a>
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
                            <a type = "button" class ="elimina-button">Elimina annuncio</a>
                        </div>
                        <div class = "col-4 text-end btn-sm modifica-annuncio ">
                            <a type = "button" class ="modifica-button">Modifica annuncio</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
@endforeach
</div>