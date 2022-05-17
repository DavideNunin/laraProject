@extends('layouts.public',['utente' => $type_user , 'home_type' => '$type_user'])

@section('title', 'Offerte')

<!-- inizio sezione prodotti -->
@section('content')
<div class="container">
<h2> Offerte </h2>
</div>
@foreach ($catalogo as $offerta)
<div class="container">
    <div id="prova" class="row single-offerta mb-5" onclick="{{ route('single_offerta', ['id'=>$offerta->id]) }}">
        <div class="col-sm-4">
            @include('carousel')
        </div>
        <div class="col-sm-8">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10">
                        <h3 class="title-offerta"><a href="{{ route('single_offerta', ['id'=>$offerta->id]) }}">{{ $offerta->titolo }}</a></h3>
                        <div class="subtitle-offerta">
                            <div>Proposto da {{$offerta->user_id}}, 
                                @if ($offerta->tipologia == 'a')
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
                </div>
            </div>
        </div>

    </div>
</div>
</div>
@endforeach
</div>

<!-- fine sezione laterale -->
@endsection

