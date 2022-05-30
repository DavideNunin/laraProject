@extends('layouts.public',['home_type' => '0'])

@section('title', 'Offerte')

<!-- inizio sezione prodotti -->
@section('content')
<div class="container">
<h2> Le tue Offerte </h2>
</div>

@foreach ($catalogo as $offerta)
{{$offerta->id}}
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
                            {{ $offerta->titolo }} {{ $offerta->id}}
                        </h3>
                        <div class="subtitle-offerta">
                            <div>@if ($offerta->tipologia == 'A')
                                    appartamento
                                @elseif ($offerta->tipologia == 'P')
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
                            <a type = "button" class ="elimina-button" onclick="return confirm('Sei sicuro di voler eliminare questo annuncio?')" href="{{ route ('cancella_offerta', [$offerta->offerta_id]) }}">Elimina annuncio</a>
                        </div>
                        <div class = "col-4 text-end btn-sm modifica-annuncio " >
                            <a type = "button" class ="modifica-button">Modifica annuncio</a>
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
