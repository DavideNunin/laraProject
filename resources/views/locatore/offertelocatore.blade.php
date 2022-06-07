@extends('layouts.public',['home_type' => '0'])

@section('title', 'Offerte')

<!-- inizio sezione prodotti -->
@section('content')
<div class="container">
<h2> Le tue Offerte </h2>
</div>

@if($off)
    <div class="container mb-5">
        Non ci sono offerte da visualizzare.
        <div class="col-lg-3">
            <a type="button" href="{{route("inserisci_offerta")}}" class="link-website"> <i class="fa-solid fa-plus"></i> Aggiungi una nuova offerta </a>
        </div>
    </div>
@endif

@foreach ($catalogo as $offerta)
{{$offerta->id}}
<div class="container">
    <div class="row single-offerta mb-5">
        <div class="col-sm-4">
            @include('offerta/carousel')
        </div>
        <div class="col-sm-8 row">
            <div class="container row">
                        <div class="col-lg-10">
                            <h3 class="title-offerta">
                                <a href="{{ route('dettaglioOfferta', [$offerta->offerta_id]) }}" class="link-offerta-title"> {{ $offerta->titolo }} {{ $offerta->id}} </a>
                            </h3>
                            <div class="subtitle-offerta">
                                <div>@if ($offerta->tipologia == 'A')
                                        Appartamento
                                    @elseif ($offerta->tipologia == 'P')
                                        Posto letto
                                    @endif
                                </div>
                                <div>{{ $offerta->via }} n.{{$offerta->ncivico}}, {{$offerta->citta}}</div>
                                <div class="mt-2 mb-2">
                                    Descrizione:<br>
                                    {{$offerta->descrizione}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 row">
                            <h4 class="price-offerta">{{ $offerta->prezzo }}€</h4>
                        </div>
                        <div class="row justify-content-end align-items-end">
                            <div class="col-lg-4 text-end">
                                <a type="button" class ="elimina-button link-website" onclick="return confirm('Sei sicuro di voler eliminare questo annuncio?')" href="{{ route ('cancella_offerta', [$offerta->offerta_id]) }}">Elimina annuncio</a>
                            </div>
                            <div class="col-lg-4 text-end modifica-annuncio">
                                <a type="button" class ="modifica-button link-website" href ="{{ route('modifica_offerta', [$offerta->offerta_id]) }}">Modifica annuncio</a>
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

@include('pagination.paginator', ['paginator' => $catalogo])
@endsection
