@extends('layouts.public')

@section('title', 'Catalogo Prodotti')

@section('scripts')

@parent
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->

<script type="text/javascript" src="{{ asset('js/formfaq.js') }}"></script>
<script>
    $(function () {
        var addUrl = "{{ route('faqmanager.result') }}";
        var formAdd = 'newfaq-form';
        var updateUrl = "{{ route('faqmanager.update') }}";
        var formUpdate = 'updatefaq-form';
        var id_faq = '';
        /*$(":input").on('blur', function (event) {
            var formElementId = $(this).attr('id');
            doElemValidation(formElementId, actionUrl, formId);
        });*/
        $(".delete-faq-btn").on('click', function(){
        id_faq = $(this).attr('id');  
        console.log(popupDel);
        openPopup(popupDel);
        });

        // clic per aggiungere nuova faq
        $("#newfaq-form").on('submit', function (event) {
            event.preventDefault();
            doFormValidation(addUrl, formAdd);
        });

        // clic per popolare popup richiesta modifica
        $(".update-faq-btn").on('click', function(){
            id_faq = $(this).attr('id');  
            console.log("id modifica" + id_faq);
            requestPopup(id_faq);
        });

        // clic per modificare
        $("#updatefaq-form").on('submit', function (event) {
            event.preventDefault();
            UpdateFaq(updateUrl, formUpdate, id_faq);
        });
          

        $("#delfaq-submit").on('click', function (event) {
            event.preventDefault();
            console.log(id_faq);
            deleteFaq(id_faq);
        });


        
    });
    </script>

@endsection

<!-- inizio sezione prodotti -->
@section('content')
<div id="content">
    @include('admin.popupadd')
    @include('admin.popupdelete')
    @include('admin.popupupdate')
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-10">
                <h3> Gestione FaQ </h3>
            </div>
            <div class="col-lg-2 d-flex justify-content-end align-items-center addfaq">
               <div id="addfaq"> <span> Aggiungi <i class="fa-solid fa-plus"></i> </span> </div>
            </div>
        </div>
        
        <div class="accordion" id="accordionExample">
            @foreach($elfaq as $singlefaq)
            
                    <div class="card">
                        <div class="card-header" id="heading{{ $singlefaq->id}}">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <h2 class="mb-0">
                                            <button class="btn link-website text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $singlefaq->id}}" aria-expanded="true" aria-controls="collapse{{ $singlefaq->id }}">
                            {{ $singlefaq->domanda}}
                                            </button>
                                        </h2>
                                    </div>  
                                    <div class="row col-lg-4 d-flex align-items-center">
                                        <div class="col-lg d-flex justify-content-end linkfaq">
                                            <a id="{{$singlefaq->id}}" class="update-faq-btn"> Modifica </a>    
                                            <a id="{{$singlefaq->id}}" class="delete-faq-btn"> Elimina </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            
                        <div id="collapse{{ $singlefaq->id }}" class="collapse @if( $loop->iteration == 1) show @endif" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
            {{ $singlefaq->risposta }}
                            </div>
                        </div>
                    </div>
            @endforeach
            </div>
    </div>
</div>
<!-- fine sezione laterale -->
@endsection

