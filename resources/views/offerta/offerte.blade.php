@extends('layouts.public',['home_type' => '0'])

@section('title', 'Offerte')

<!-- inizio sezione prodotti -->
@section('content')
<div class="container">
<h2> Offerte </h2>
</div>
@foreach ($catalogo as $offerta)
<div class="container">
    <div id="prova" class="row single-offerta mb-5">
        <div class="col-sm-4">
            @include('offerta/carousel')
        </div>
        <div class="col-sm-8">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10">
                        <h3 class="title-offerta">
                        <a href="{{ route('dettaglioOffertaGenerico', [$offerta->offerta_id]) }}" class="link-offerta-title"> {{ $offerta->titolo }} </a>
                        </h3>
                        <div class="subtitle-offerta">
                            <div>
                            @foreach($locatori as $locatore)
                            @if($locatore->offerta_id == $offerta->offerta_id)
                            Proposto da {{$locatore->nome}} {{$locatore->cognome}},
                            @endif
                            @endforeach
                                @if ($offerta->tipologia == 'a')
                                    appartamento
                                @elseif ($offerta->tipologia == 'p')
                                    Posto letto
                                @endif
                            </div>
                            <div>{{ $offerta->via }} n.{{$offerta->ncivico}}, {{$offerta->citta}}</div>
                            <div class="mt-1"> Genere accettato dal locatore: 
                                @if($offerta->genereRichiesto == 'A')
                                    <i class="fa-solid fa-venus-mars"></i>
                                @elseif($offerta->genereRichiesto == 'M')
                                    <i class="fa-solid fa-mars"></i>
                                @elseif($offerta->genereRichiesto == 'F')
                                    <i class="fa-solid fa-venus"></i>
                                @endif
                            </div>         
                            <div class="mt-2 ">
                                Descrizione:<br>
                                {{$offerta->descrizione}}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <h4 class="price-offerta">{{ $offerta->prezzo }}???</h4>
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

<!-- fine sezione laterale -->
@endsection

