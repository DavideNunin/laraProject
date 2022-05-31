@extends('layouts.public',['home_type' => '0'])

@section('title', 'Modifica_offerta')


@section('content')
<div class="static">
    <h3 class="text-center">Modifica {{ $offerta -> titolo}} {{ $offerta -> tipologia}}</h3>

    <div class = "row"></div>
    
    <div class = "row">
    {{ Form::open(array( 'id' => 'modifyOfferta', 'files' => true, 'class' => 'contact-form')) }}
                @csrf
            <div  class="wrap-input  rs1-wrap-input border-radius text-left">
                {{ Form::label('titolo', 'Titolo Annuncio', ['class' => 'label-input']) }}
                {{ Form::text('titolo', isset($offerta->titolo) ? $offerta->titolo : '' , ['class' => 'input', 'id' => 'titolo']) }}
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
                {{ Form::text('citta', isset($offerta->citta) ? $offerta->citta : '', ['class' => 'input', 'id' => 'citta']) }}
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
                {{ Form::text('via', isset($offerta->via) ? $offerta->via : '', ['class' => 'input', 'id' => 'via']) }}
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
                {{ Form::text('ncivico', isset($offerta->ncivico) ? $offerta->ncivico : '', ['class' => 'input', 'id' => 'ncivico']) }}
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
                    @if($offerta -> genereRichiesto == 'M') {{ Form::radio('genereRichiesto', 'M', true) }}
                    @else {{ Form::radio('genereRichiesto', 'M', false) }}
                    @endif
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    {{ Form::label('genereRichiesto', 'F', ['class' => 'form-label']) }}
                    @if($offerta -> genereRichiesto == 'F') {{ Form::radio('genereRichiesto', 'F', true) }}
                    @else {{ Form::radio('genereRichiesto', 'F', false) }}
                    @endif
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
                {{ Form::text('descrizione', isset($offerta->descrizione) ? $offerta->descrizione : '', ['class' => 'input', 'id' => 'descrizione']) }}
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
                {{ Form::date('periodo', isset($offerta->periodo) ? $offerta->periodo : '', ['class' => 'input', 'id' => 'name']) }}
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
                {{ Form::text('prezzo', isset($offerta->prezzo) ? $offerta->prezzo : '', ['class' => 'input', 'id' => 'prezzo']) }}
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
                {{ Form::text('etaRichiesta', isset($offerta->etaRichiesta) ? $offerta->etaRichiesta : '', ['class' => 'input', 'id' => 'etaRichiesta']) }}
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
                    @if ($offerta -> tipologia == 'P') {{ Form::radio('tipologia', 'P', true) }}
                    @else {{ Form::radio('tipologia', 'P', false, array('disabled')) }}
                    @endif
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    {{ Form::label('tipologia', 'Appartamento', ['class' => 'form-label']) }}
                    @if ($offerta -> tipologia == 'A') {{ Form::radio('tipologia', 'A', true) }}
                    @else {{ Form::radio('tipologia', 'A', false, array('disabled')) }}
                    @endif
                </div>
                @if ($errors->first('tipologia'))
                    <ul class="errors">
                        @foreach ($errors->get('tipologia') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif    
            </div>
        <div>
        @if( $offerta -> tipologia == 'A')
        @foreach($appartamento as $app)

            <div  class="wrap-input  rs1-wrap-input border-radius text-left">
                    {{ Form::label('superficie', 'superficie dell appartamento ', ['class' => 'label-input']) }}
                    {{ Form::text('superficie',  isset($app->superficie) ? $app->superficie : '', ['class' => 'input', 'id' => 'superficie']) }}
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
                        @if ($app -> loc_ricr == '1') {{ Form::radio('loc_ricr', 1, true) }}
                        @else {{ Form::radio('loc_ricr', 1, false) }}
                        @endif
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        {{ Form::label('loc_ricr', 'No', ['class' => 'form-label']) }}
                        @if ($app -> loc_ricr == '0') {{ Form::radio('loc_ricr', 0, true) }}
                        @else {{ Form::radio('loc_ricr', 0, false) }}
                        @endif
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
                        {{ Form::select('npostiletto', [1 =>  1, 2 => 2, 3 => 3, 4 => 4, 5 => 5 , 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10], isset($app->npostiletto) ? $app->npostiletto : '', ['class' => 'input','id' => 'npostiletto']) }}
                    </div>
                </div>
                <div class="wrap-contact col-lg-5">
                    <div  class="wrap-input  rs1-wrap-input border-radius text-left">
                        {{ Form::label('ncamere', 'Numero camere dell appartamento', ['class' => 'form-label']) }}
                        {{ Form::select('ncamere', [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5,  6 => 6, 7 => 7, 8 => 8], isset($app->ncamere) ? $app->ncamere : '', ['class' => 'input','id' => 'ncamere']) }}
                    </div>
                </div>
                <div class="wrap-contact col-lg-5">
                    <div  class="wrap-input  rs1-wrap-input border-radius text-left">
                        {{ Form::label('nbagni', 'Numero bagni dell appartamento', ['class' => 'form-label']) }}
                        {{ Form::select('nbagni', [1 => 1, '2' => 2, '3' => '3', '4' => '4', '5'=>'5'], isset($app->nbagni) ? $app->nbagni : '', ['class' => 'input','id' => 'ncamere']) }}
                    </div>
                </div>
                <div class="wrap-contact col-lg-5">
                <label for="coajf" class="form-label">Presenza della cucina:</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        {{ Form::label('cucina', 'Si', ['class' => 'form-label']) }}
                        @if ($app -> cucina == '1') {{ Form::radio('cucina', 1, true) }}
                        @else {{ Form::radio('cucina', 1, false) }}
                        @endif
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        {{ Form::label('cucina', 'No', ['class' => 'form-label']) }}
                        
                        @if ($app -> cucina == '0') {{ Form::radio('cucina', 0, true) }}
                        @else {{ Form::radio('cucina', 0, false) }}
                        @endif
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
                        @if ($app -> terrazzo == '1') {{ Form::radio('terrazzo', 1, true) }}
                        @else {{ Form::radio('terrazzo', 1, false) }}
                        @endif                    
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        {{ Form::label('terrazzo', 'No', ['class' => 'form-label']) }}
                        @if ($app -> terrazzo == '0') {{ Form::radio('terrazzo', 0, true) }}
                        @else {{ Form::radio('terrazzo', 0, false) }}
                        @endif                    </div>
                    @if ($errors->first('terrazzo'))
                        <ul class="errors">
                            @foreach ($errors->get('terrazzo') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>    
        @endforeach
        @endif
        </div>
        @if( $offerta -> tipologia == 'P')
        @foreach($postoletto as $pl)
        <div  class="wrap-input  rs1-wrap-input border-radius text-left">
                    {{ Form::label('superficie_postoletto', 'superficie della stanza ', ['class' => 'label-input']) }}
                    {{ Form::text('superficie_postoletto', isset($pl->superficie_postoletto) ? $pl->superficie_postoletto : '' , ['class' => 'input', 'id' => 'superficie_postoletto']) }}
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
                        @if ($pl -> doppia == '1') {{ Form::radio('doppia', 1, true) }}
                        @else {{ Form::radio('doppia', 1, false) }}
                        @endif 
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        {{ Form::label('doppia', 'Doppia', ['class' => 'form-label']) }}
                        @if ($pl -> doppia == '0') {{ Form::radio('doppia', 0, true) }}
                        @else {{ Form::radio('doppia', 0, false) }}
                        @endif                     
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
                        @if ($pl -> luogoStudio == '1') {{ Form::radio('luogoStudio', 1, true) }}
                        @else {{ Form::radio('luogoStudio', 1, false) }}
                        @endif   

                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        {{ Form::label('luogoStudio', 'No', ['class' => 'form-label']) }}
                        @if ($pl -> luogoStudio == '0') {{ Form::radio('luogoStudio', 0, true) }}
                        @else {{ Form::radio('luogoStudio', 0, false) }}
                        @endif                       
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
                        @if ($pl -> finestra == '1') {{ Form::radio('finestra', 1, true) }}
                        @else {{ Form::radio('finestra', 1, false) }}
                        @endif                             
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        {{ Form::label('finestra', 'No', ['class' => 'form-label']) }}
                        @if ($pl -> finestra == '0') {{ Form::radio('finestra', 0, true) }}
                        @else {{ Form::radio('finestra', 0, false) }}
                        @endif                             
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
        @endforeach
        @endif
    </div>
    <div  class="wrap-input  rs1-wrap-input">
                {{ Form::label('nome_file', 'Immagine', ['class' => 'label-input']) }}
                {{ Form::file('nome_file', ['class' => 'input', 'id' => 'image']) }}
    </div>
    <div class="container-form-btn">                
                    {{ Form::submit('Modifica offerta', ['class' => 'form-btn1', 'onclick'=> 'return confirm("Sei sicuro?")']) }}
    </div>
    {{ Form::close()}}
    
</div>        
@endsection