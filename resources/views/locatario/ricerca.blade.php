@extends('layouts/public')
@section('title', 'Offerte')

<!-- inizio sezione prodotti -->
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
                sendMessage(addUrl, id_talking);
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
<div class="container">
    <div id="open-filter" class="filters-toopen">Filters <i class="fa-solid fa-filter"></i></div>
    {{Form::open(array( 'id' => 'form-filtri','route'=> 'locatario_ricerca', 'files' => 'true', 'method' => 'GET' , 'class' => 'form-filtri' ))}}
    <div id="filters" class="filters">
        <div class="row col-lg-12">  
            <div class="col-lg-3">
                        <div>Stai cercando in</div>
                        {{ Form::search('citta','', array( 'class' => 'form-control mr-sm-2 campo' , 'id' => 'citta-field', 'placeholder' => 'Cerca città', 'aria-label' => 'Search' )) }}
            </div>
            <div class="col-lg-2">
                <div>Età minima</div>
                <div id="rangeBox">
                            {{Form::number('eta_minima',null, array('id'=>'numberfield', 'type' => 'number', 'min' => '18', 'max'=> '100', 'class' => 'form-control campo')) }}
                            {{Form::range('ciaone', null ,array('step'=>'1', 'id' => 'slider','min' => '18', 'max' => '100'))}}
                </div>
            </div>
            <div class="col-lg-2">
                <div>Data inizio locazione</div>
                {{ Form::date('data_inizio_locazione', '', array( 'class' => 'form-control campo') ) }}
            </div>
            <div class="col-lg-2">
                <div>Fascia di prezzo</div>
                {{Form::select('fascia_prezzo',array(null => "Seleziona","0-100" => "0-100€", "100-300" => "100€-300€", "300-1000"=>"300€-1000€"), null ,array( 'id'=>'mysel', 'class' => 'form-control mysel nav-link dropdown-toggle', 'role' => 'button', 'data-toggle' => 'dropdown', 'aria-haspopup' => 'true', 'aria-expanded' => 'false')  )}}
            </div>
            <div class="col-lg-2">
                <div>Tipo</div>
                {{Form::select('tipologia',array(null =>"Seleziona","A" => "Appartamento", "P" => "Posto letto"), null ,array( 'id'=>'tipo-filter', 'class' => 'form-control dropdown-toggle', 'role' => 'button', 'data-toggle' => 'dropdown', 'aria-haspopup' => 'true', 'aria-expanded' => 'false'))}}
            </div>
            <div class="col-lg-1 d-flex align-items-center justify-content-center">
                {{Form::submit()}}
            </div>
        </div>

        <div class="col-lg-12 row filter-over" id="filters-appartamento">
            <div class="col-lg-1">
                <div>Presenza locale ricreativo</div>
                {{ Form::checkbox('locale_ricreativo' , 1, array('class' =>'appartamento-field'))}}
            </div>
            <div class="col-lg-1">
                <div>Terrazzo/<br>balcone:</div>
                    {{Form::checkbox('terrazzo','1',array('class'=>'appartamento-field', 'id'=>'terrazzo-field'))}}
            </div>
            <div class="col-lg-3">
                    <div>Numero minimo di camere richieste:</div>
                    {{Form::number('ncamere',null,array( 'class' => 'form-control mr-sm-2 campo appartamento-field' , 'id' => 'ncamere-field' ))}}
            </div>
            <div class="col-lg-3">
                <div>Numero minimo di bagni richiesti:</div>
                {{Form::number('nbagni',null,array( 'class' => 'form-control mr-sm-2 campo appartamento-field' , 'id' => 'nbagni-field' ))}}
            </div>
        </div>  

        <div class="col-lg-12 row filter-over" id="filters-postoletto">
            <div class="col-lg-3">
                <div>Tipo di camera</div>
                <div>Singola</div>
                {{Form::radio('doppia','0',true,array('class'=>'posto_letto-field'))}}
                    <div>Doppia</div>
                {{Form::radio('doppia','1',false,array('class'=>'posto_letto-field'))}}            </div>
            <div class="col-lg-3">
                <div>Luogo studio:</div>
                {{Form::checkbox('luogo_studio','1',array('class'=>'posto_letto-field', 'id'=>'luogo_studio-field'))}}
            </div>
        </div> 

    </div>
    {{ Form::close()}}
  </div>
</div>


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
