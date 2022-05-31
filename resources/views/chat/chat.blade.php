@extends('layouts.noFooterLayout')

@section('title', 'Catalogo Prodotti')

@section('scripts')

@parent
<script type="text/javascript" src="{{ asset('js/chat.js') }}"></script>

<script>
$(function () {
    let id_talking;

    $(".display-chat").click(function () {
        $(".display-chat").removeClass("active-chat");
        $(".display-chat").find("a:last").css('color', '#000');
        $(this).toggleClass("active-chat");
        $(this).find("a:last").css('color', '#f9f9f9');
        id_talking = $(this).attr("id");
        startChat(id_talking);
    });

    /*$("#sendMessage-form").on('submit', function (event) {
        event.preventDefault();
        sendMessage(id_talking);
    });*/
    var addUrl = "{{ route('chat.send') }}";
    $("#sendMessage-form").on('submit', function (event) {
        event.preventDefault();
        //if(id_talking == ''){ $("#errMessaggio").text("Seleziona una chat");}
        //else if($("#messaggio").val() == '') {
            //$("#errMessaggio").text("Devi scrivere un messaggio");}
            if(false){}
        else{sendMessage(addUrl, id_talking);}
    });
});
</script>

@endsection

@section('content')
<div class="container-fluid">
    <div class="container">
        <h2>Benvenuto in chat {{Auth::user()->username}}</h2>
        <div class="row min-vh-100 flex-column flex-md-row">
            
            <aside class="col-12 col-md-2 p-0 flex-shrink-1">
                <nav class="navbar navbar-expand flex-md-column flex-row align-items-center py-2 pl-3">
                    <div class="collapse navbar-collapse ">
                        <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
                            @foreach($id as $studente)
                                <li class="nav-item item-chat mt-3 display-chat" id="{{$studente->mittente}}">
                                    <a class="nav-link pl-0 text-nowrap single-chat-link">{{$studente->username}}</a>
                                </li>
                            @endforeach
                            <!-- qui ci va l'include che popola per ogni utente -->
                        </ul>
                    </div>
                </nav>
            </aside>
            <main class="col bg-faded py-3 flex-grow-1">
                
                <div class="container" id="container-message">
                    <!-- Messages with jQuery -->
                    
                </div>
                <div class="footer-message fixed-bottom">
                    <div class="container d-flex justify-content-center">
                        {{ Form::open(array('id' => 'sendMessage-form', 'class' => 'Messageform')) }}
                        <div class="col-lg-12">
                            <span id="errMessaggio"></span>
                        </div>
                        <div class="col-lg-12">
                            {{ Form::textarea('messaggio', '', ['class' => 'form-textarea', 'id' => 'messaggio', 'rows' => 3, 'maxlength' => '2000']) }}
                        </div>
                        <div class="col-lg-12">
                            {{ Form::button('Invia <i class="fa-solid fa-circle-arrow-right" aria-hidden="true"></i>', ['class' => 'button-form mb-4', 'id' => 'sendForm-submit', 'type' => 'submit']) }}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
                
            </main>
        </div>
    </div>
</div>
@endsection
