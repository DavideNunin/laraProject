@extends('layouts.public',['home_type' => '0'])

@section('title', 'Modifica_offerta')


@section('content')
<div class="static">
    <h3 class="text-center">Aggiungi una nuova offerta campione</h3>
    <div class="container-contact">
        <div class="wrap-contact ">
            <div class = "row">
                {{ Form::open(array( 'id' => 'addOfferta', 'files' => true, 'class' => 'contact-form')) }}
                @csrf
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
                <label for="coajf" class="form-label">Genere richiesto:</label>
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
            <div class="wrap-contact col-lg-5" id="tipodiLocazione">
            <label for="coajf" class="form-label">Inserire la tipologia dell'offerta:</label>
                <div class="custom-control custom-radio custom-control-inline">
                    {{ Form::label('tipologia', 'Posto Letto', ['class' => 'form-label']) }}
                    {{ Form::radio('tipologia', 'P', false, ['onclick'=>'showPostoLettoFields()']) }}
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    {{ Form::label('tipologia', 'Appartamento', ['class' => 'form-label']) }}
                    {{ Form::radio('tipologia', 'A', false, ['onclick'=>'showAppartamentoFields()']) }}
                </div>
                @if ($errors->first('tipologia'))
                    <ul class="errors">
                        @foreach ($errors->get('tipologia') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            
            <div id="appartamentoFields" style="display:none" name = "var_fields" value= "app">
                <div  class="wrap-input  rs1-wrap-input border-radius text-left">
                    {{ Form::label('superficie', 'superficie dell appartamento ', ['class' => 'label-input']) }}
                    {{ Form::text('superficie', '', ['class' => 'input', 'id' => 'superficie']) }}
                    @if ($errors->first('superficie'))
                        <ul class="errors">
                            @foreach ($errors->get('superficie') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif  
                </div>
                <div class="wrap-contact col-lg-5">
                    <label for="coajf" class="form-label">Presenza di un locale ricreativo:</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        {{ Form::label('loc_ricr', 'Si', ['class' => 'form-label']) }}
                        {{ Form::radio('loc_ricr', 1 , false) }}
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        {{ Form::label('loc_ricr', 'No', ['class' => 'form-label']) }}
                        {{ Form::radio('loc_ricr', 0 , false) }}
                    </div>
                    @if ($errors->first('loc_ricr'))
                        <ul class="errors">
                            @foreach ($errors->get('loc_ricr') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="wrap-contact col-lg-5">
                    <div  class="wrap-input  rs1-wrap-input border-radius text-left">
                        {{ Form::label('npostiletto', 'Posti letto dell appartamento', ['class' => 'form-label']) }}
                        {{ Form::select('npostiletto', [1 =>  1, 2 => 2, 3 => 3, 4 => 4, 5 => 5 , 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10], 1, ['class' => 'input','id' => 'npostiletto']) }}
                    </div>
                </div>
                <div class="wrap-contact col-lg-5">
                    <div  class="wrap-input  rs1-wrap-input border-radius text-left">
                        {{ Form::label('ncamere', 'Numero camere dell appartamento', ['class' => 'form-label']) }}
                        {{ Form::select('ncamere', [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5,  6 => 6, 7 => 7, 8 => 8], 1, ['class' => 'input','id' => 'ncamere']) }}
                    </div>
                </div>
                <div class="wrap-contact col-lg-5">
                    <div  class="wrap-input  rs1-wrap-input border-radius text-left">
                        {{ Form::label('nbagni', 'Numero bagni dell appartamento', ['class' => 'form-label']) }}
                        {{ Form::select('nbagni', [1 => 1, '2' => 2, '3' => '3', '4' => '4', '5'=>'5'], 1, ['class' => 'input','id' => 'ncamere']) }}
                    </div>
                </div>
                <div class="wrap-contact col-lg-5">
                    <label for="coajf" class="form-label">Presenza della cucina:</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        {{ Form::label('cucina', 'Si', ['class' => 'form-label']) }}
                        {{ Form::radio('cucina', 1 , false) }}
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        {{ Form::label('cucina', 'No', ['class' => 'form-label']) }}
                        {{ Form::radio('cucina', 0 , false) }}
                    </div>
                    @if ($errors->first('cucina'))
                        <ul class="errors">
                            @foreach ($errors->get('cucina') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="wrap-contact col-lg-5">
                    <label for="coajf" class="form-label">Presenza del terrazzo:</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        {{ Form::label('terrazzo', 'Si', ['class' => 'form-label']) }}
                        {{ Form::radio('terrazzo', 1 , false) }}
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        {{ Form::label('terrazzo', 'No', ['class' => 'form-label']) }}
                        {{ Form::radio('terrazzo', 0 , false) }}
                    </div>
                    @if ($errors->first('terrazzo'))
                        <ul class="errors">
                            @foreach ($errors->get('terrazzo') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div id="postoLettoFields" style="display:none" name = "var_fields" value= "pl">
                <div  class="wrap-input  rs1-wrap-input border-radius text-left">
                    {{ Form::label('superficie_postoletto', 'superficie della stanza ', ['class' => 'label-input']) }}
                    {{ Form::text('superficie_postoletto', '', ['class' => 'input', 'id' => 'superficie_postoletto']) }}
                    @if ($errors->first('superficie_postoletto'))
                        <ul class="errors">
                            @foreach ($errors->get('superficie_postoletto') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="wrap-contact col-lg-5">
                    <label for="coajf" class="form-label">Tipo di stanza:</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        {{ Form::label('doppia', 'Singola', ['class' => 'form-label']) }}
                        {{ Form::radio('doppia', 1 , false) }}
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        {{ Form::label('doppia', 'Doppia', ['class' => 'form-label']) }}
                        {{ Form::radio('doppia', 0 , false) }}
                    </div>
                    @if ($errors->first('doppia'))
                        <ul class="errors">
                            @foreach ($errors->get('doppia') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="wrap-contact col-lg-5">
                    <label for="coajf" class="form-label">Presenza di un luogo per studiare:</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        {{ Form::label('luogoStudio', 'Si', ['class' => 'form-label']) }}
                        {{ Form::radio('luogoStudio', 1 , false) }}
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        {{ Form::label('luogoStudio', 'No', ['class' => 'form-label']) }}
                        {{ Form::radio('luogoStudio', 0 , false) }}
                    </div>
                    @if ($errors->first('luogoStudio'))
                        <ul class="errors">
                            @foreach ($errors->get('luogoStudio') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="wrap-contact col-lg-5">
                    <label for="coajf" class="form-label">Presenza di una finestra:</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        {{ Form::label('finestra', 'Si', ['class' => 'form-label']) }}
                        {{ Form::radio('finestra', 1 , false) }}
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        {{ Form::label('finestra', 'No', ['class' => 'form-label']) }}
                        {{ Form::radio('finestra', 0 , false) }}
                    </div>
                    @if ($errors->first('finestra'))
                        <ul class="errors">
                            @foreach ($errors->get('finestra') as $message)
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