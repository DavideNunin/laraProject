@extends('layouts.public',['home_type' => '0'])

<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
        function deleteOpzionamento(id){
            if(confirm("sicuro di voler eliminare?")){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    type:'POST',
                    url: "{{route('delete.Opzionamento')}}",
                    data: {
                            id: id},
                    dataType: 'json',
                    error: function(response){
                        console.log(response);
                        alert("errore");
                    },
                    success:function(response){
                       console.log("ti prego");
                        },
                })
            }
        }
</script>

@section('title', 'Inserisci_offerta')
@section('content')
<div class="container">
    <div class="row single-offerta mb-5">
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
                        @if ($offerta->genereRichieto == 'M') Uomo(entrambi)
                        @else Donna
                        @endif
                        , di età minima {{$offerta->etaRichiesta}} anni
                    </p>  
                    <p>
                    <h5> A partire dal:</h5>
                        {{$offerta-> periodo}}
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

    
    @if(empty($opz)) <h4> Richieste di opzionamento: Caro dennis dovresti far scomparire il titolo per favore se non ci sono opzionamenti </h4>
    @endif

    @foreach($opz as $opzionamento)
    @foreach($user as $utente)
    @if($opzionamento->user_id == $utente->id)
        <div class="row single-offerta mb-5">
            <h5> L'utente {{$utente->username}} ha opzionato l'offerta in data {{$opzionamento->data}} 
            <div class="text-end">
                    <a href = "javascript:void(0)" onclick="deleteOpzionamento({{$opzionamento->id}})" class="btn btn-danger">Annulla</a> 
                    <a href="#" type="button">Assegna</a> 
            </div>   
            </h5>
            <hr>
            <p class ="subtitle col-sm-4">
                Nome: {{$utente->nome}} <br>
                Cognome: {{$utente->cognome}}
            </p>
            <p class = "subtitle col-sm-4">
                Genere: @if($utente->sesso == 'M') Uomo
                        @else Donna
                        @endif <br>
                Nato il: {{$utente->data_nascita}}        
            </p> 
            <div class="text-end">
                <a href="#" type="button" id="{{$utente->id}}" class="open-chat">Apri chat con {{$utente->username}}</a> 
            </div>    
        </div>


    @endif
    @endforeach
    @endforeach

</div>
@endsection

