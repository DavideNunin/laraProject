@extends('layouts.public',['home_type' => '0'])

@section('title', 'Offerte')

<!-- inizio sezione prodotti -->
@section('content')
<div class="container">
<h2>Offerte Opzionate </h2>
</div>

@foreach ($offerte_opzionate as $offerta)
<div class="container">
    <div class="row single-offerta mb-5">
        <div class="col-sm-4">
            @include('offerta/carousel')
        </div>
        <div class="row col-sm-8">
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
                    <div class="col-sm-2 justify-content-end">
                        <h4 class="price-offerta">{{ $offerta->prezzo }}€</h4>
                    </div>
                </div>
                <div class="row d-flex align-items-end">
                    <div class = "col-lg-12 d-flex justify-content-end btn-sm ">
                        <a type = "button" href="{{route('rimuoviopzionamento',['id' => $offerta->offerta_id ])}}" class ="rimuovi_opz">Rimuovi opzionamento</a>
                    </div>
                </div>
        </div>

    </div>
</div>
@endforeach
</div>
@include('pagination.paginator', ['paginator' => $offerte_opzionate])
@endsection
