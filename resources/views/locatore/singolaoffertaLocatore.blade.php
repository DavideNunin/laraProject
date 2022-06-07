@extends('layouts.public',['home_type' => '0'])
@section('title', 'Singola Offerta')

@section('scripts')

@parent

<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript" src="{{ asset('js/function.js') }}"></script>

<script>
    $(function () {
        var addUrl = "{{ route('chat.send') }}";
        var formAdd = 'newfaq-form';
        let id_talking;

        $(".open-chat").on('click', function(){
        id_talking = $(this).attr("id");
        console.log(id_talking);
        openPopup(popupMessage);
        });

        // clic per inviare un messaggio
        $("#formSendMessage").on('submit', function (event) {
            event.preventDefault(); 
            sendMessageFromPopup(addUrl, id_talking);
        });
    });

    
</script>
@endsection


@section('content')
@include('popupmessage')

@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
<div class="container">
    <div class="row offerta mb-5">
        <div class="col-sm-4">
            @include('offerta/carousel')
        </div>
    <div class="col-sm-8">
        <div class="container">
                <div class="row">
                    <div class="col-sm-10">
                    <h3> Titolo dell'offerta: {{$offerta->titolo}}
                   </h3>
                    <p> @if ($offerta->tipologia == 'A') Appartamento
                        @else Posto letto
                        @endif
                    </p>
                    <p> <h5>Descrizione:</h5>
                        {{$offerta->descrizione}}
                    </p>
                    <p> 
                        <h5>Situato in:</h5>
                        {{$offerta -> citta}}, via {{$offerta->via}} {{$offerta->ncivico}}
                    </p>
                    <p>
                        <h5> Genere indicato:</h5>
                        @if ($offerta->genereRichiesto == 'M') Uomo  
                        @elseif ($offerta->genereRichiesto == 'F') Donna
                        @else Nessuna preferenza di genere
                        @endif
                        , età minima richiesta: {{$offerta->etaRichiesta}} anni
                    </p>  
                    <p>
                    <h5> A partire dal:</h5>
                        {{$offerta-> dataInizioLocazione}}
                    </p>
                    </div>
                    <div class ="col-sm-2">
                        <h3> {{$offerta-> prezzo}}€ </h3>
                    </div>  
                </div>
            </div>
    </div>  

    <div class ="row mx-auto">
        <p></p>
        <h4>Caratteristiche:</h4>
        <div class="row">
        @if ($offerta->tipologia == 'A')
        @foreach ($appartamento as $app)
            <p class = "subtitle col-sm-4">
                Presenza di un Locale Ricreativo: @if($app-> loc_ricr) Sì
                                                      @else No
                                                      @endif

            </p>
            <p class = "subtitle col-sm-4">
                Presenza di un terrazzo: @if($app -> terrazzo)Sì
                                         @else No
                                         @endif
            </p>
            <p class = "subtitle col-sm-4">
                Presenza di un cucina: @if($app -> cucina)Sì
                                       @else No
                                       @endif
            </p>
            <p class = "subtitle col-sm-4">
                Numero bagni dell'appartamento: {{$app-> nbagni}}
            </p>
            <p class = "subtitle col-sm-4">
                Numero posti letto dell'appartamento: {{$app-> npostiletto}}
            </p>
            <p class = "subtitle col-sm-4">
                Numero camere dell'appartamento: {{$app-> ncamere}}
            </p>
            <p class = "subtitle col-sm-4">
                Superficie dell'appartamento: {{$app-> superficie}}m²   
            </p>   
        @endforeach    
        @endif
        </div>
        <div class = "row">
        @if ($offerta->tipologia == 'P')
        @foreach ($postoletto as $pl)
        <p class = "subtitle col-sm-4">
                Tipo di camera: @if($pl-> doppia) Singola
                                @else Doppia
                                @endif
        </p>
        <p class = "subtitle col-sm-4">
        Presenza di un luogo studio:@if($pl-> luogoStudio) Sì
                                    @else No
                                    @endif
        </p>
        <p class = "subtitle col-sm-4">
        Presenza di una finestra:@if($pl-> finestra) Sì
                                    @else No
                                    @endif
        </p>
        <p class = "subtitle col-sm-4">
                Superficie della camera: {{$pl-> superficie_postoletto}}m²   
        </p>   
        @endforeach
        @endif
        </div>
    </div>
</div>
</div>

<div class="container">
    @foreach($opz as $opzionamento)
    @foreach($user as $utente)
    @if($opzionamento->user_id == $utente->id)

        <div class="row mb-5">             
            @if($contratti->isNotEmpty())
                @if($contratti[0]->studente_id == $utente->id)
                <div class="col-lg-9">
                    <h5> Hai assegnato l'offerta all'utente {{$utente->username}} che ha opzionato l'offerta in data {{$opzionamento->data}} </h5> 
                </div>
                <div class="col-lg-3">
                    <div class="text-end"><a class="link-website" href="{{ route('vediContratto', [$contratti[0]->id]) }}">Vedi il contratto</a></div>
                </div>
                @else
                <div class="col-lg-9">
                    <h5> L'utente {{$utente->username}} ha opzionato l'offerta in data {{$opzionamento->data}} </h5> 
                </div>
                <div class="col-lg-3">
                    <div class="text-end">
                        <a href = "javascript:void(0)" onclick="deleteOpzionamento({{$opzionamento->id}}, {{$offerta->offerta_id}})" class="link-annulla">Annulla</a> 
                        <a href="{{ route('contratto', [$opzionamento->id]) }}" class="link-website">Assegna</a> 
                    </div>
                </div>
                @endif
            @else
            <div class="col-lg-9">
                <h5> L'utente {{$utente->username}} ha opzionato l'offerta in data {{$opzionamento->data}} </h5> 
            </div>
            <div class="col-lg-3">
                <div class="text-end">
                    <a href = "javascript:void(0)" onclick="deleteOpzionamento({{$opzionamento->id}}, {{$offerta->offerta_id}})" class="link-annulla">Annulla</a> 
                    <a href="{{ route('contratto', [$opzionamento->id]) }}" class="link-website">Assegna</a> 
                </div>
            </div>
            @endif
            <hr>
        </div>
        <div class="row mb-3">
            <div class="col-lg-4">
                <p class ="subtitle">
                    Nome: {{$utente->nome}} <br>
                    Cognome: {{$utente->cognome}}
                </p>
            </div>
            <div class="col-lg-4">
                <p class = "subtitle">
                    Genere: @if($utente->sesso == 'M') Uomo
                            @else Donna
                            @endif <br>
                    Nato il: {{$utente->data_nascita}}        
                </p>
            </div>
            <div class="col-lg-4 justify-content-end align-items-center d-flex">
                <div class="text-end">
                    <a type="button" id="{{$utente->id}}" class="open-chat link-open-chat">Invia un messaggio a {{$utente->username}}</a> 
                </div>
            </div>
        </div>   
    @endif
    @endforeach
    @endforeach

</div>
@endsection

