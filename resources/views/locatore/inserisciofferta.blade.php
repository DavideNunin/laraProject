@extends('layouts.public',['home_type' => '0'])

@section('title', 'Inserisci_offerta')

@section('content')
<div class="static">
    <h3 class="text-center">Aggiungi una nuova offerta campione</h3>
    <div class="container-contact">
        <div class="wrap-contact ">
            <div class = "row">
                {{ Form::open(array( 'id' => 'addOfferta', 'files' => true, 'class' => 'contact-form')) }}
                <div  class="wrap-input  rs1-wrap-input border-radius text-left">
                {{ Form::label('titolo', 'Titolo Annuncio', ['class' => 'label-input']) }}
                {{ Form::text('titolo', '', ['class' => 'input', 'id' => 'titolo']) }}
                @if ($errors->first('titolo'))
                <ul class="errors">
                    @foreach ($errors->get('titolo') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="wrap-contact col-lg-4">
                <div  class="wrap-input  rs1-wrap-input border-radius text-left">
                {{ Form::label('citta', 'Citta', ['class' => 'label-input']) }}
                {{ Form::text('citta', '', ['class' => 'input', 'id' => 'citta']) }}
                @if ($errors->first('citta'))
                    <ul class="errors">
                        @foreach ($errors->get('citta') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
                </div>
            </div>
            <div class="wrap-contact col-lg-5">
                <div  class="wrap-input  rs1-wrap-input border-radius text-left">
                {{ Form::label('via', 'via', ['class' => 'label-input']) }}
                {{ Form::text('via', '', ['class' => 'input', 'id' => 'via']) }}
                @if ($errors->first('via'))
                    <ul class="errors">
                        @foreach ($errors->get('via') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
                </div>
            </div>
            <div class="wrap-contact col-lg-5">
                <div  class="wrap-input  rs1-wrap-input border-radius text-left">
                {{ Form::label('ncivico', 'Numero Civico', ['class' => 'label-input']) }}
                {{ Form::text('ncivico', '', ['class' => 'input', 'id' => 'ncivico']) }}
                @if ($errors->first('ncivico'))
                    <ul class="errors">
                        @foreach ($errors->get('ncivico') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
                </div>
            </div>
            <div class="wrap-contact col-lg-5">
                <div class="custom-control custom-radio custom-control-inline">
                    {{ Form::label('genereRichiesto', 'M', ['class' => 'form-label']) }}
                    {{ Form::radio('genereRichiesto', 'M', false) }}
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    {{ Form::label('genereRichiesto', 'F', ['class' => 'form-label']) }}
                    {{ Form::radio('genereRichiesto', 'F', false) }}
                </div>
                @if ($errors->first('genereRichiesto'))
                    <ul class="errors">
                        @foreach ($errors->get('genereRichiesto') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="wrap-contact col-lg-5">
                <div  class="wrap-input  rs1-wrap-input border-radius text-left">
                {{ Form::label('descrizione', 'Piccola Descrizione', ['class' => 'label-input']) }}
                {{ Form::text('descrizione', '', ['class' => 'input', 'id' => 'descrizione']) }}
                @if ($errors->first('descrizione'))
                    <ul class="errors">
                        @foreach ($errors->get('descrizione') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
                </div>
            </div>
            <div class="wrap-contact col-lg-5">
                <div  class="wrap-input  rs1-wrap-input border-radius text-left">
                {{ Form::label('periodo', 'Inizio periodo di locazione', ['class' => 'label-input']) }}
                {{ Form::date('periodo', '', ['class' => 'input', 'id' => 'name']) }}
                @if ($errors->first('periodo'))
                    <ul class="errors">
                        @foreach ($errors->get('periodo') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
                </div>
            </div>
            <div class="wrap-contact col-lg-5">
            <div class="custom-control custom-radio custom-control-inline">
                    {{ Form::label('tipologia', 'P', ['class' => 'form-label']) }}
                    {{ Form::radio('tipologia', 'P', false) }}
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    {{ Form::label('tipologia', 'A', ['class' => 'form-label']) }}
                    {{ Form::radio('tipologia', 'A', false) }}
                </div>
                @if ($errors->first('tipologia'))
                    <ul class="errors">
                        @foreach ($errors->get('tipologia') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="wrap-contact col-lg-5">
                <div  class="wrap-input  rs1-wrap-input border-radius text-left">
                {{ Form::label('prezzo', 'Prezzo della Proposta di locazione', ['class' => 'label-input']) }}
                {{ Form::text('prezzo', '', ['class' => 'input', 'id' => 'prezzo']) }}
                @if ($errors->first('prezzo'))
                    <ul class="errors">
                        @foreach ($errors->get('prezzo') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
                </div>
            </div>
            <div class="wrap-contact col-lg-5">
                <div  class="wrap-input  rs1-wrap-input border-radius text-left">
                {{ Form::label('etaRichiesta', 'Età minima richiesta ', ['class' => 'label-input']) }}
                {{ Form::text('etaRichiesta', '', ['class' => 'input', 'id' => 'etaRichiesta']) }}
                @if ($errors->first('etaRichiesta'))
                    <ul class="errors">
                        @foreach ($errors->get('etaRichiesta') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
                </div>
            </div>
            <div class="container-form-btn">                
                {{ Form::submit('Aggiungi offerta', ['class' => 'form-btn1']) }}
            </div>
            {{ Form::close()}}
        </div>
    </div>
</div>
@endsection





