@extends('layouts.public',['home_type' => '0'])

@section('title', 'Inserisci_offerta')

@section('scripts')

@parent
<script src="{{ asset('js/insertInputFields.js') }}" ></script>
@endsection

@section('content')
<div class="container">
    <h3>Aggiungi una nuova offerta campione</h3>
        <div class = "row col-lg-4 p-3">
                {{ Form::open(array( 'id' => 'addOfferta', 'files' => true, 'class' => 'contact-form')) }}
                @csrf
                {{ Form::label('titolo', 'Titolo Annuncio', ['class' => 'label-input']) }}
                {{ Form::text('titolo', '', ['class' => 'input form-control', 'id' => 'titolo']) }}
                @if ($errors->first('titolo'))
                <ul class="errors">
                    @foreach ($errors->get('titolo') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
        </div>
        <div class="row p-3 col-lg-8">
            <div class="col-lg-4">
                <div  class="wrap-input  rs1-wrap-input border-radius text-left">
                {{ Form::label('citta', 'Citta', ['class' => 'label-input']) }}
                {{ Form::text('citta', '', ['class' => 'input form-control', 'id' => 'citta']) }}
                @if ($errors->first('citta'))
                    <ul class="errors">
                        @foreach ($errors->get('citta') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
                </div>
            </div>
            <div class="col-lg-4">
                {{ Form::label('via', 'via', ['class' => 'label-input']) }}
                {{ Form::text('via', '', ['class' => 'input form-control', 'id' => 'via']) }}
                @if ($errors->first('via'))
                    <ul class="errors">
                        @foreach ($errors->get('via') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="col-lg-4">
                {{ Form::label('ncivico', 'Numero Civico', ['class' => 'label-input']) }}
                {{ Form::text('ncivico', '', ['class' => 'input form-control', 'id' => 'ncivico']) }}
                @if ($errors->first('ncivico'))
                    <ul class="errors">
                        @foreach ($errors->get('ncivico') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <div class="row col-lg-8 p-3">
            <div class="col-lg-5">
                {{ Form::label('descrizione', 'Descrizione', ['class' => 'label-input']) }}
                {{ Form::textarea('descrizione', '', ['class' => 'input form-control form-textarea', 'id' => 'descrizione', 'rows' => 2, 'maxlength' => '2000']) }}
                @if ($errors->first('descrizione'))
                    <ul class="errors">
                        @foreach ($errors->get('descrizione') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="col-lg-3">
                <div class="row justify-content-center">Genere richiesto:</div>
                <div class="row justify-content-center">
                <div class="col-lg-4">
                    {{ Form::label('genereRichiesto', 'M', ['class' => 'form-label']) }}
                    {{ Form::radio('genereRichiesto', 'M', false, ['class' => 'radio-form']) }}
                </div>
                <div class="col-lg-3">
                    {{ Form::label('genereRichiesto', 'F', ['class' => 'form-label']) }}
                    {{ Form::radio('genereRichiesto', 'F', false, ['class' => 'radio-form']) }}
                </div>
                <div class="col-lg-3">
                    {{ Form::label('genereRichiesto', 'E', ['class' => 'form-label']) }}
                    {{ Form::radio('genereRichiesto', 'A', false, ['class' => 'radio-form']) }}
                </div>
                @if ($errors->first('genereRichiesto'))
                    <ul class="errors">
                        @foreach ($errors->get('genereRichiesto') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
                </div>
            </div>

            <div class="col-lg-4">
                {{ Form::label('etaRichiesta', 'Età minima richiesta ', ['class' => 'label-input']) }}
                {{ Form::text('etaRichiesta', '', ['class' => 'input form-control', 'id' => 'etaRichiesta']) }}
                @if ($errors->first('etaRichiesta'))
                    <ul class="errors">
                        @foreach ($errors->get('etaRichiesta') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>

        </div>

        <div class="row p-3">
            <div class="col-lg-4">
                {{ Form::label('dataInizioLocazione', 'Inizio dataInizioLocazione di locazione', ['class' => 'label-input']) }}
                {{ Form::date('dataInizioLocazione', '', ['class' => 'input form-control', 'id' => 'name']) }}
                @if ($errors->first('dataInizioLocazione'))
                    <ul class="errors">
                        @foreach ($errors->get('dataInizioLocazione') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="col-lg-4">
                {{ Form::label('prezzo', 'Prezzo della Proposta di locazione', ['class' => 'label-input']) }}
                {{ Form::text('prezzo', '', ['class' => 'input form-control', 'id' => 'prezzo']) }}
                @if ($errors->first('prezzo'))
                    <ul class="errors">
                        @foreach ($errors->get('prezzo') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
            
        <div class="row p-3">
            <div class="col-lg-12">Inserire la tipologia dell'offerta:</div>

            <div class="col-lg-4">
                    {{ Form::label('tipologia', 'Posto Letto', ['class' => 'form-label']) }}
                    {{ Form::radio('tipologia', 'P', false, ['onclick'=>'showPostoLettoFields()',   'class' => 'radio-form']) }}
            </div>
            <div class="col-lg-4">
                    {{ Form::label('tipologia', 'Appartamento', ['class' => 'form-label']) }}
                    {{ Form::radio('tipologia', 'A', false, ['onclick'=>'showAppartamentoFields()', 'class' => 'radio-form']) }}
            </div>
                @if ($errors->first('tipologia'))
                    <ul class="errors">
                        @foreach ($errors->get('tipologia') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
        </div>
            
        <!-- Campi appartamento -->
        <div id="appartamentoFields" style="display:none" name = "var_fields" value= "app">
            <div class="row p-3 col-lg-9">

                <div class="row col-lg-6 p-3 details-offerta">
                    <div  class="col-lg-12 row">
                        <div class="col-lg-9">
                            {{ Form::label('superficie', 'superficie dell appartamento ', ['class' => 'label-input']) }}
                        </div>
                        <div class="col-lg-3 appartamento" >
                        {{ Form::text('superficie', '', ['class' => 'input form-control', 'id' => 'superficie']) }}
                        </div>
                        @if ($errors->first('superficie'))
                            <ul class="errors">
                                @foreach ($errors->get('superficie') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif  
                    </div>


                    <div class="col-lg-12 appartamento">
                            {{ Form::label('npostiletto', 'Posti letto dell appartamento', ['class' => 'form-label']) }}
                            {{ Form::select('npostiletto', [1 =>  1, 2 => 2, 3 => 3, 4 => 4, 5 => 5 , 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10], 1, ['class' => 'input select-form','id' => 'npostiletto']) }}
                    </div>
                    <div class="col-lg-12 appartamento">
                            {{ Form::label('ncamere', 'Numero camere dell appartamento', ['class' => 'form-label']) }}
                            {{ Form::select('ncamere', [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5,  6 => 6, 7 => 7, 8 => 8], 1, ['class' => 'input select-form','id' => 'ncamere']) }}
                    </div>
                    <div class="col-lg-12 appartamento">
                            {{ Form::label('nbagni', 'Numero bagni dell appartamento', ['class' => 'form-label']) }}
                            {{ Form::select('nbagni', [1 => 1, '2' => 2, '3' => '3', '4' => '4', '5'=>'5'], 1, ['class' => 'input select-form','id' => 'nbagni']) }}
                    </div>

                </div>
            
                
                <div class="row col-lg-6 p-3 details-offerta">

                    <div class="col-lg-12 appartamento">
                        <div class="col-lg-12">Presenza di un locale ricreativo:</div>
                            {{ Form::label('loc_ricr', 'Si', ['class' => 'form-label']) }}
                            {{ Form::radio('loc_ricr', 1 , false, ['class' => 'radio-form', 'id' => 'loc_ricr']) }}

                            {{ Form::label('loc_ricr', 'No', ['class' => 'form-label']) }}
                            {{ Form::radio('loc_ricr', 0 , false, ['class' => 'radio-form', 'id' => 'loc_ricr1']) }}
                        @if ($errors->first('loc_ricr'))
                            <ul class="errors">
                                @foreach ($errors->get('loc_ricr') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
    
                    
                    <div class="col-lg-12 appartamento">
                        <div class="col-lg-12">Presenza della cucina:</div>

                            {{ Form::label('cucina', 'Si', ['class' => 'form-label']) }}
                            {{ Form::radio('cucina', 1 , false, ['class' => 'radio-form', 'id' => 'cucina']) }}
                        
                            {{ Form::label('cucina', 'No', ['class' => 'form-label']) }}
                            {{ Form::radio('cucina', 0 , false, ['class' => 'radio-form','id' => 'cucina1']) }}
                        
                        @if ($errors->first('cucina'))
                            <ul class="errors">
                                @foreach ($errors->get('cucina') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <div class="col-lg-12 appartamento">
                        <div class="col-lg-12">Presenza del terrazzo:</div>
                        
                            {{ Form::label('terrazzo', 'Si', ['class' => 'form-label']) }}
                            {{ Form::radio('terrazzo', 1 , false, ['class' => 'radio-form', 'id' => 'terrazzo']) }}
                        
                            {{ Form::label('terrazzo', 'No', ['class' => 'form-label']) }}
                            {{ Form::radio('terrazzo', 0 , false, ['class' => 'radio-form', 'id' => 'terrazzo1']) }}
                        
                        @if ($errors->first('terrazzo'))
                            <ul class="errors">
                                @foreach ($errors->get('terrazzo') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                </div>
            
            </div>
        </div>

        <div id="postoLettoFields" style="display:none" name = "var_fields" value= "pl">
        <div class="row p-3 col-lg-8 details-offerta">
            <div class="row">

                <div class="col-lg-6 appartamento">
                    <div class="col-lg-12">Tipo di stanza:</div>
                        {{ Form::label('doppia', 'Singola', ['class' => 'form-label']) }}
                        {{ Form::radio('doppia', 1 , false, ['class' => 'radio-form','id' => 'doppia']) }}
                        
                        {{ Form::label('doppia', 'Doppia', ['class' => 'form-label']) }}
                        {{ Form::radio('doppia', 0 , false, ['class' => 'radio-form', 'id' => 'doppia1']) }}
                    @if ($errors->first('doppia'))
                        <ul class="errors">
                            @foreach ($errors->get('doppia') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

<!-- Campi per il posto letto -->
                <div  class="col-lg-4">
                    {{ Form::label('superficie_postoletto', 'superficie della stanza ', ['class' => 'label-input']) }}
                    {{ Form::text('superficie_postoletto', '', ['class' => 'input form-control', 'id' => 'superficie_postoletto']) }}
                    @if ($errors->first('superficie_postoletto'))
                        <ul class="errors">
                            @foreach ($errors->get('superficie_postoletto') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

            </div> 
            
            <div class="row">
                <div class="col-lg-6">
                    <div class="col-lg-12">Presenza di un luogo per studiare:</div>
                        {{ Form::label('luogoStudio', 'Si', ['class' => 'form-label']) }}
                        {{ Form::radio('luogoStudio', 1 , false, ['class' => 'radio-form', 'id' => 'luogoStudio']) }}

                        {{ Form::label('luogoStudio', 'No', ['class' => 'form-label']) }}
                        {{ Form::radio('luogoStudio', 0 , false, ['class' => 'radio-form', 'id' => 'luogoStudio1']) }}

                    @if ($errors->first('luogoStudio'))
                        <ul class="errors">
                            @foreach ($errors->get('luogoStudio') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="col-lg-4">
                    <div class="col-lg-12">Presenza di una finestra:</div>
                        {{ Form::label('finestra', 'Si', ['class' => 'form-label']) }}
                        {{ Form::radio('finestra', 1 , false, ['class' => 'radio-form', 'id' => 'finestra']) }}

                        {{ Form::label('finestra', 'No', ['class' => 'form-label']) }}
                        {{ Form::radio('finestra', 0 , false, ['class' => 'radio-form', 'id' => 'finestra1']) }}

                    @if ($errors->first('finestra'))
                        <ul class="errors">
                            @foreach ($errors->get('finestra') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
                
        </div>

            <div  class="row p-3 col-lg-5">
                {{ Form::label('nome_file', 'Immagine', ['class' => 'label-input']) }}
                {{ Form::file('nome_file', ['class' => 'input', 'id' => 'image']) }}
            </div>
            <div class ="row">
                <div class="p-3 col-lg-3">                
                        {{ Form::submit('Aggiungi offerta', ['class' => 'button-form']) }}
                </div>
                <div class="p-3 col-lg-3">                
                        {{ Form::reset('Resetta campi', ['class' => 'button-form', 'onclick'=>'return confirm("Sicuro di voler svuotare tutti i campi?")']) }}
                </div>
            {{ Form::close()}}
            </div>
        </div>

    </div>
</div>
@endsection





