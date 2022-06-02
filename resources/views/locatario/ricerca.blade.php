@extends('layouts/public')
@section('title', 'Offerte')

<!-- inizio sezione prodotti -->
@section('scripts')
@parent

<script type="text/javascript" src="{{ asset('js/function.js') }}"></script>
<script>
    $(function () {
        var addUrl = "{{ route('offerte.sendMessage') }}";
        var formAdd = 'newfaq-form';
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
            sendMessage(addUrl, id_talking);
        });
    });

        function sendFilter(){
            var inputs=$('.campo');
            console.log(inputs);
            var json= jsonifier(inputs);
            $.ajax({
                type: 'POST',
                url: 'TODO',
                data: inputs,
                dataType: "json",
                error: function (data) {
                alert("errore");
                },
                success: function (data) {
                console.log(data.messaggi);
                console.log(data.user);
                displayChat(data.messaggi, data.user);
                },
                contentType: false,
                processData: false
                });
            return null;
        }
        function test(){
            var inputs=$('.campo');
            console.log(inputs);
            var json= jsonifier(inputs);
            console.log(json);
        }
    
        function jsonifier(inputs){
            jsonobj={};
    
            inputs.each ( function(){
                var type= $(this).attr("id");
                var value= $(this).val();
                jsonobj[type]=value;
            }
            )
            console.log(jsonobj);
            return jsonobj;
        }
    </script>

@endsection

@section('content')
<div class="container">
<h2>Offerte Opzionate </h2>
</div>
<!--ci andrà la navbar-->
@include('locatario/popupmessage')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
        {{Form::open(array( 'id' => 'form-filtri', 'files' => 'true', 'class' => 'form-filtri' ))}}
    <ul class="navbar-nav mr-auto">
        <div class="col-lg-1 d-flex justify-content-center">
            Filtri:
        </div>
        <div class="my-2 mylg-0">
                <div>Stai cercando in</div>
                {{ Form::search('ciaone','', array( 'class' => 'form-control mr-sm-2 campo' , 'id' => 'citta-field', 'onchange' => 'sendFilter()', 'placeholder' => 'Cerca città', 'aria-label' => 'Search' )) }}
              <!-- <input class="form-control mr-sm-2 campo" id="" type="search" onchange="sendFilter()" placeholder="Cerca città" aria-label="Search"> -->
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cerca</button>
        </div>

      <li>
        <div class="my-2 mylg-0">
                  <div>Età minima</div>
            {{ Form::number('ciaone','18', array( 'type' => 'number', 'min' => '18', 'max'=> '100', 'onchange' => 'sendFilter()', 'class' => 'form-control campo')) }}
                      <!-- <input type="number" min="18" max="100" onchange="sendFilter()" class="form-control campo"> -->
        </div>
      </li>
        <li>
            <div class="my-2 mylg-0">
            <div>
                Data inizio locazione
            </div>
            {{ Form::date('ciaone', '', array( 'class' => 'form-control campo', 'onchange' => 'sendFilter()') ) }}
            <!-- <input class="form-control campo" onchange="sendFilter()" type="date"></div> -->
        </li>

        <li class="nav-item dropdown">
            <select class="nav-link dropdown-toggle" id="navbarDropdown" onchange="sendFilter()" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <option class="dropdown-item campo" value="A" selected >Appartamento</option>
                    <option class="dropdown-item campo" value="P" >Posto letto</option>
            </select>
        </li>
        <li class="nav-item dropdown">
            <select class="nav-link dropdown-toggle" id="navbarDropdown" onchange="sendFilter()" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <option class="dropdown-item campo" value="0-100" selected >0-100€</option>
                    <option class="dropdown-item campo" value="100-300" >100€-300€</option>
            </select>
        </li>

    <li>
        <div class="my-2 mylg-0">
            <div>
            Presenza locale ricreativo
            </div>
            <input class="campo" type="checkbox" onclick="sendFilter()" checked>
        </div>
    </li>
    </ul>
    {{ Form::close()}}
  </div>
</nav>


<!--sopra stà la navbar-->


@foreach ($risultati as $offerta)
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
                            <div>
                                Offerta Pubblicata da {{$offerta->username}}
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
                    <!-- qui sull'id ci metto l'id dell'utente a cui invia un messaggio -->
                    <a type="button" class ="send-message" id="{{$offerta->id}}">Invia un messaggio</a>
                </div>
                <div class="col-lg-6 d-flex justify-content-end">
                    <a type = "button" class ="aggiungi_opz">Opziona offerta</a>
                    <a type = "button" class ="rimuovi_opz">Rimuovi opzionamento</a>
                </div>
                
            </div>
        </div>
        

    </div>
</div>
@endforeach
</div>
@endsection
