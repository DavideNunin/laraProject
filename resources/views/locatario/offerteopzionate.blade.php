@extends('layouts.public',['home_type' => '0'])

@section('title', 'Offerte')
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

<!-- inizio sezione prodotti -->
@section('content')
@include('popupmessage')
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
                    <div class="col-lg-6 d-flex justify-content-start">
                        @foreach($locatori as $locatore)
                        @if($locatore->offerta_id == $offerta->offerta_id)
                        <a type="button" class ="send-message link-website" id="{{$offerta->offerta_id}}">Invia un messaggio a {{$locatore->nome}} {{$locatore->cognome}}</a>
                        @endif
                        @endforeach
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        @if ($offerta->opzionabile)
                        <a href="{{route('rimuoviopzionamento',['id' => $offerta->offerta_id ])}}" class ="rimuovi_opz link-website">Rimuovi opzionamento</a>
                        @elseif(!$offerta->opzionabile and $offerta->user_id == $utente->id)
                        <a href="#" class =" link-website"> Vedi Contratto</a>
                        @elseif(!$offerta->opzionabile) mriariairair
                        @endif
                    </div>
                </div>

        </div>

    </div>
</div>
@endforeach
</div>
@include('pagination.paginator', ['paginator' => $offerte_opzionate])
@endsection
