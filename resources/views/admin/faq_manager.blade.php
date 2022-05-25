@extends('layouts.public')

@section('title', 'Catalogo Prodotti')

@section('scripts')

@parent
<script type="text/javascript" src="{{ asset('js/formfaq.js') }}"></script>
<script src = "https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
$(function () {
    var actionUrl = "{{ route('faqmanager.newfaq') }}";
    var formId = 'newfaq-form';
    $(":input").on('blur', function (event) {
        var formElementId = $(this).attr('id');
        doElemValidation(formElementId, actionUrl, formId);
    });
    $("#newfaq-form").on('submit', function (event) {
        event.preventDefault();
        doFormValidation(actionUrl, formId);
    });

});
</script>

@endsection

<!-- inizio sezione prodotti -->
@section('content')
<div id="content">
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-10">
                <h3> Gestione FaQ </h3>
            </div>
            <div class="col-lg-2 d-flex justify-content-end addfaq">
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
                                            <a href="#"> Modifica </a>    
                                            <a href="#"> Elimina </a>
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
    <div class="container">

        {{ Form::open(array('route' => 'faqmanager.newfaq', 'id' => 'newfaq-form', 'class' => 'addnewfaq-form')) }}
        <div class="col-lg-12">
            {{ Form::label('domanda', 'Domanda', ['class' => 'form-label']) }}
            {{ Form::text('domanda', '', ['class' => 'input form-control', 'id' => 'domanda']) }}
        </div>
        <div class="col-lg-12">
            {{ Form::label('risposta', 'Risposta', ['class' => 'form-label']) }}
            {{ Form::textarea('risposta', '', ['class' => 'input form-control form-textarea', 'id' => 'risposta', 'rows' => 1, 'maxlength' => '2000']) }}
        </div>
        <div class="col-lg-12">
            {{ Form::submit('Aggiungi', ['class' => 'newfaq-button mb-4', 'id' => 'newfaq-submit']) }}
        </div>
        {{ Form::close() }}
    </div>
</div>

<!-- fine sezione laterale -->
@endsection

