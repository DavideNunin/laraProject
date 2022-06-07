@extends('layouts.public',['home_type' => '0'])
@section('title', 'Singola Offerta')

@section('scripts')
@parent
<script type="text/javascript" src="{{ asset('js/function.js') }}"></script>
<script>
    $(function () {
            $("#filters-appartamento").hide();
            $("#filters-postoletto").hide();
            var addUrl = "{{ route('chat.send') }}";
            let id_talking;

            $(".send-message").on('click', function(){
            id_talking = $(this).attr("id");
            console.log(id_talking);
            openPopup(popupMessage);
            });

            // clic per inviare un messaggio
            $("#formSendMessage").on('submit', function (event) {
                event.preventDefault(); 
                // devo passare anche l'utente, il destinatario
                sendMessageFromPopup(addUrl, id_talking);
            });
            
            $("#tipo-filter").change(function(){
                if(this.value == 'A'){
                    $("#filters-postoletto").hide();
                    $("#filters-appartamento").show();
                }
                else if(this.value == 'P'){
                    $("#filters-appartamento").hide();
                    $("#filters-postoletto").show();
                }
            });

            $("#open-filter").click(function(){
                if($('#filters').css('display') == 'none'){ 
                    $('#filters').show(); 
                } else { 
                    $('#filters').hide(); 
                }
            });

            var slider=document.getElementById('slider');
            var input=document.getElementById('numberfield');

            input.addEventListener('change',function(){
                slider.value=input.value;
            });
            slider.addEventListener('change',function(){
                input.value=slider.value;
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
    @if($utente != null AND $utente->tipologia == 's')
    <div class="col-lg-6 d-flex justify-content-start">
    @foreach($locatori as $locatore)
        @if($locatore->id == $offerta->user_id)
        <a type="button" class ="send-message link-website" id="{{$offerta->user_id}}">Invia un messaggio a {{$locatore->nome}} {{$locatore->cognome}}</a>
        @endif
    @endforeach
    </div> 
    @endif
</div>
</div>
@endsection
