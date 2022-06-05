@extends('layouts/public')
@section('title', 'Offerte')

<!-- inizio sezione prodotti -->
@section('scripts')
@parent

<script type="text/javascript" src="{{ asset('js/function.js') }}"></script>
<script>
        $(function () {
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
                sendMessage(addUrl, id_talking);
            });
        });



$(document).ready(function () {

    var slider=document.getElementById('slider');
    var input=document.getElementById('numberfield');
    input.addEventListener('change',function(){
        slider.value=input.value;
    });
    slider.addEventListener('change',function(){
        input.value=slider.value;
    });
    $('select > option ').addClass('nav-link dropdown-toggle opt');
    //$("option:contains('Appartamento')").click(console.log("pippo"),$('.appartamento-field').prop('disabled',false).show(),$('.posto_letto-field').prop('disabled',true).hide());
    //$("option:contains('Posto letto')").click($('.appartamento-field').prop('disabled',true).hide(),$('.posto_letto-field').prop('disabled',false).show());
    console.log($("option:contains('Appartamento')"));

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

        function createOpzionamento(id){
            if(confirm("Sei sicuro di voler opzionare quest'offerta ?")){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    type:'POST',
                    url: "{{route('opziona_offerta')}}",
                    data: {
                            id: id},

                    dataType: 'json',
                    error: function(response){
                        console.log(response);
                        alert("non puoi opzionare due volte la stessa offerta");
                    },
                    success:function(data){
                        window.location.replace(data.redirect);
                    },
                })
            }
         }
</script>

@endsection

@section('content')
<div class="container">
<h2>Offerte Opzionate </h2>
</div>
<!--ci andrà la navbar-->
@include('popupmessage')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
        {{Form::open(array( 'id' => 'form-filtri','route'=> 'locatario_ricerca', 'files' => 'true', 'method' => 'GET' , 'class' => 'form-filtri' ))}}
    <ul class="navbar-nav mr-auto">
        <div class="col-lg-1 d-flex justify-content-center">
            Filtri:
        </div>
        <div class="my-2 mylg-0">
                <div>Stai cercando in</div>
                {{ Form::search('citta','', array( 'class' => 'form-control mr-sm-2 campo' , 'id' => 'citta-field', 'placeholder' => 'Cerca città', 'aria-label' => 'Search' )) }}
              <!-- <input class="form-control mr-sm-2 campo" id="" type="search" onchange="sendFilter()" placeholder="Cerca città" aria-label="Search"> -->
        </div>

      <li>
        <div class="my-2 mylg-0">
                  <div>Età minima</div>
                <div id="rangeBox">
                    {{Form::number('eta_minima',null, array('id'=>'numberfield', 'type' => 'number', 'min' => '18', 'max'=> '100', 'class' => 'form-control campo')) }}
                    {{Form::range('ciaone', null ,array('step'=>'1', 'id' => 'slider','min' => '18', 'max' => '100'))}}
                </div>
                      <!-- <input type="number" min="18" max="100" onchange="sendFilter()" class="form-control campo"> -->
        </div>
      </li>
        <li>
            <div class="my-2 mylg-0">
            <div>
                Data inizio locazione
            </div>
            {{ Form::date('data_inizio_locazione', '', array( 'class' => 'form-control campo') ) }}
            <!-- <input class="form-control campo" onchange="sendFilter()" type="date"></div> -->
        </li>
        <li class="nav-item dropdown">
                {{Form::select('fascia_prezzo',array(null => "Seleziona","0-100" => "0-100€", "100-300" => "100€-300€", "300-1000"=>"300€-1000€"), null ,array( 'id'=>'mysel', 'class' => 'form-control mysel nav-link dropdown-toggle', 'role' => 'button', 'data-toggle' => 'dropdown', 'aria-haspopup' => 'true', 'aria-expanded' => 'false')  )}}
        <!--    <select class="nav-link dropdown-toggle" id="navbarDropdown" onchange="sendFilter()" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <option class="dropdown-item campo" value="0-100" selected >0-100€</option>
                    <option class="dropdown-item campo" value="100-300" >100€-300€</option>
            </select>
-->
        </li>

        <li class="nav-item dropdown">
                {{Form::select('tipologia',array(null =>"Seleziona","A" => "Appartamento", "P" => "Posto letto"), null ,array( 'id'=>'mysel', 'class' => 'form-control mysel nav-link dropdown-toggle ', 'role' => 'button', 'data-toggle' => 'dropdown', 'aria-haspopup' => 'true', 'aria-expanded' => 'false')  )}}
<!--
            <select class="nav-link dropdown-toggle" id="navbarDropdown" onchange="sendFilter()" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <option class="dropdown-item campo" value="A" selected >Appartamento</option>
                    <option class="dropdown-item campo" value="P" >Posto letto</option>
            </select>
-->
        </li>

        <li>
            <div class="my-2 mylg-0">
                <div>
                Presenza locale ricreativo
                </div>
            {{ Form::checkbox('locale_ricreativo' , 1,false, array('class' =>'appartamento-field'))}}
            </div>
        </li>
        <li>
            <div class="my-2 mylg-0">
                <div>Terrazzo/balcone:</div>
                {{Form::checkbox('terrazzo','1',false,array('class'=>'appartamento-field', 'id'=>'terrazzo-field'))}}
            </div>
        </li>
        <li>
            <div class="my-2 mylg-0">
                <div>Numero minimo di camere richieste:</div>
                {{Form::number('ncamere',null,array( 'class' => 'form-control mr-sm-2 campo appartamento-field' , 'id' => 'ncamere-field' ))}}
            </div>
        </li>
        <li>
            <div class="my-2 mylg-0">
                <div>Numero minimo di bagni richiesti:</div>
                {{Form::number('nbagni',null,array( 'class' => 'form-control mr-sm-2 campo appartamento-field' , 'id' => 'nbagni-field' ))}}
            </div>
        </li>
        <li>
            <div class="my-2 mylg-0">
                <div>Numero minimo di posti letto richiesti:</div>
                {{Form::number('nposti_letto',null,array( 'class' => 'form-control mr-sm-2 campo appartamento-field' , 'id' => 'nposti_letto-field' ))}}
            </div>
        </li>
       <li>
           <div class="my-2 mylg-0">Tipo di camera
                    <div>Singola</div>
                {{Form::radio('doppia','0',true,array('class'=>'posto_letto-field'))}}
                    <div>Doppia</div>
                {{Form::radio('doppia','1',false,array('class'=>'posto_letto-field'))}}
            </div>
       </li>
        <li>
            <div class="my-2 mylg-0">
                <div>luogo studio:</div>
                {{Form::checkbox('luogo_studio','1',false,array('class'=>'posto_letto-field', 'id'=>'luogo_studio-field'))}}
            </div>
        </li>
        <li>
            <div class="my-2 mylg-0">
                <div>Presenza finestra:</div>
                {{Form::checkbox('finestra','1',false,array('class'=>'posto_letto-field', 'id'=>'finestra-field'))}}
            </div>
        </li>
        <li>
            <div class="my-2 mylg-0">
                {{Form::submit()}}
            </div>
        </li>
    </ul>
    {{ Form::close()}}
  </div>
</nav>


<!--sopra stà la navbar-->

@isset($ricerca)
    <div>
    Abbiamo cercato le città che contengono le lettere:
        <ul>
@foreach($ricerca as $lettera)
            <li>{{$lettera}}</li>
        </ul>
@endforeach
    </div>
@endisset

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
                    <a href ="javascript:void(0)" onclick="createOpzionamento({{$offerta->offerta_id}})">Opziona offerta</a>
                </div>
                
            </div>
        </div>
        

    </div>
</div>
@endforeach 
</div>
@include('pagination.paginator', ['paginator' => $risultati])
@endsection
