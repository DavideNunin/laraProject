@extends('layouts.contrattoLayout')

@section('title', 'Contratto')

<!-- inizio sezione prodotti -->
@section('content')
<div class="container">
    <div class="mt-3 d-flex justify-content-center title-contratto">Contratto di Locazione  </div>

    <div class="col-lg-12">
        Contratto Stipulato in data {{$contratto_info[0]->dataStipula}} tra il locatore {{Auth::user()->nome}} {{Auth::user()->cognome}} 
        e il locatario {{$contratto_info[0]->nome}} {{$contratto_info[0]->cognome}}.
    </div>

    <div class="row">
        <div class="col-lg-6 mt-3">
            <div class="subtitle-contratto">Dettagli del locatore</div>
            <div class="col-lg-12">{{Auth::user()->nome}} {{Auth::user()->cognome}}</div>
            <div class="col-lg-12">
                @if(Auth::user()->sesso == 'M')
                    Genere: Uomo
                @else 
                    Genere: Donna
                @endif
            </div>
            <div class="col-lg-12">
                Data di nascita: {{Auth::user()->data_nascita}}
            </div>
            <div class="col-lg-12">
               Telefono: {{Auth::user()->telefono}}
            </div>
            <div class="col-lg-12">
                Registrato al sito con l'username: {{Auth::user()->username}}
            </div>
        </div>
        <div class="col-lg-6 mt-3">
            <div class="subtitle-contratto">Dettagli del locatario</div>
            <div class="col-lg-12">{{$contratto_info[0]->nome}} {{$contratto_info[0]->cognome}}</div>
            <div class="col-lg-12">
                @if($contratto_info[0]->sesso == 'M')
                    Genere: Uomo
                @else 
                    Genere: Donna
                @endif
            </div>
            <div class="col-lg-12">
                Data di nascita: {{$contratto_info[0]->data_nascita}}
            </div>
            <div class="col-lg-12">
                Telefono: {{$contratto_info[0]->telefono}}
             </div>
            <div class="col-lg-12">
                Registrato al sito con l'username: {{$contratto_info[0]->username}}
            </div>
        </div>
    </div>
    <div class="col-lg-12 mt-5">
        <div class="subtitle-contratto"> Dettagli dell'offerta </div>
        <div class="row">
            <div class="col-lg-4 title-offer">{{$contratto_info[0]->titolo}}</div>
            @if($contratto_info[0]->tipologia == 'A')
                    <div class="col-lg-3">Tipologia: appartamento</div>
                @else 
                <div class="col-lg-3">Tipologia: posto letto</div>
            @endif
            <div class="col-lg-3"> Data Pubblicazione {{$contratto_info[0]->dataPubblicazione}}</div>
        </div>
        <div class="row">
            <div class="col-lg-4"> {{$contratto_info[0]->descrizione}} </div>
            <div class="col-lg-3"> {{$contratto_info[0]->citta}}, {{$contratto_info[0]->via}} {{$contratto_info[0]->ncivico}}</div>
            <div class="col-lg-3"> Prezzo: {{$contratto_info[0]->prezzo}} </div>
        </div>

    </div>

    <div class="mt-2 col-lg-12">
        
        @if($contratto_info[0]->tipologia == 'A')
        <div class="descrizione-offerta">Dettagli Appartamento</div>
            <div class="row">
                <div class="col-lg-3">Numero locali ricreativi: {{$info_casa->loc_ricr}} </div>
                <div class="col-lg-3">Numero posti letto: {{$info_casa->npostiletto}} </div>
                <div class="col-lg-3">Numero camere: {{$info_casa->ncamere}} </div>
            </div>
            <div class="row">
                <div class="col-lg-3">Presenza della cucina: @if($info_casa->cucina)
                                                Si
                                            @else No
                                        @endif
                </div>
                <div class="col-lg-3">Presenza del terrazzo: @if($info_casa->terrazzo)
                        Si
                    @else No
                    @endif
                </div>
                <div class="col-lg-3">Numero bagni: {{$info_casa->nbagni}} </div>
                <div class="col-lg-3">Superficie: {{$info_casa->superficie}} </div>
            </div>


        @elseif($contratto_info[0]->tipologia == 'P')
        <div class="descrizione-offerta">Dettagli Posto letto</div>
            <div>Tipo di stanza: @if($info_casa->doppia) Doppia
                                @else Singola
                                @endif 
            </div>
            <div>Presenza luogo studio: @if($info_casa->luogoStudio) Si
                @else No
                @endif 
            </div>
            <div>Superficie camera: {{$info_casa->superficie_postoletto}} </div>
        @endif
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-lg-6">
            Firma locatore {{Auth::user()->nome}} {{Auth::user()->cognome}}
            <div class="box-firma"></div>
        </div>
        <div class="col-lg-6">
            Firma locatario {{$contratto_info[0]->nome}} {{$contratto_info[0]->cognome}}
            <div class="box-firma"></div>
        </div>
    </div>

</div>
@endsection
