@extends('layouts.public',['home_type' => '0'])

@section('title', 'Modifica_offerta')


@section('content')
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
<div class="container">
    <h3>Modifica "{{ $offerta->titolo}}"  </h3>
    {{ Form::open(array( 'id' => 'modifyOfferta', 'files' => true, 'class' => 'contact-form')) }}
    @csrf
    <div class="row col-lg-8 p-1">
            <div class="col-lg-12"> Stai modificando un </div>
            <div class="col-lg-3">
           {{ Form::label('tipologia', 'Posto Letto', ['class' => 'form-label']) }}
            @if ($offerta -> tipologia == 'P') {{ Form::radio('tipologia', 'P', true, ['class' => 'radio-form']) }}
            @else {{ Form::radio('tipologia', 'P', false, array('disabled'), ['class' => 'radio-form']) }}
            @endif
            </div>
            <div class="col-lg-3">
            {{ Form::label('tipologia', 'Appartamento', ['class' => 'form-label']) }}
            @if ($offerta -> tipologia == 'A') {{ Form::radio('tipologia', 'A', true, ['class' => 'radio-form']) }}
            @else {{ Form::radio('tipologia', 'A', false, array('disabled'), ['class' => 'radio-form']) }}
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
    <div class="row">
        <div class="col-lg-6 p-3">
        {{ Form::label('titolo', 'Titolo Annuncio', ['class' => 'label-input col-lg-12']) }}
        {{ Form::text('titolo', isset($offerta->titolo) ? $offerta->titolo : '' , ['class' => 'input form-control', 'id' => 'titolo']) }}
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
        <div class="col-lg-3 p-3">
            {{ Form::label('citta', 'Citta', ['class' => 'label-input']) }}
            {{ Form::text('citta', isset($offerta->citta) ? $offerta->citta : '', ['class' => 'input form-control', 'id' => 'citta']) }}
                @if ($errors->first('citta'))
                    <ul class="errors">
                        @foreach ($errors->get('citta') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
        </div>
        <div class="col-lg-3 p-3">
                {{ Form::label('via', 'via', ['class' => 'label-input']) }}
                {{ Form::text('via', isset($offerta->via) ? $offerta->via : '', ['class' => 'input form-control', 'id' => 'via']) }}
                @if ($errors->first('via'))
                    <ul class="errors">
                        @foreach ($errors->get('via') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
        </div>
        <div class="col-lg-2 p-3">
                {{ Form::label('ncivico', 'Numero Civico', ['class' => 'label-input']) }}
                {{ Form::text('ncivico', isset($offerta->ncivico) ? $offerta->ncivico : '', ['class' => 'input form-control', 'id' => 'ncivico']) }}
                @if ($errors->first('ncivico'))
                    <ul class="errors">
                        @foreach ($errors->get('ncivico') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 p-3">
            <div class="col-lg-12"> Genere richiesto:</div>
            {{ Form::label('genereRichiesto', 'M', ['class' => 'form-label']) }}
                    @if($offerta->genereRichiesto == 'M') {{ Form::radio('genereRichiesto', 'M', true, ['class' => 'radio-form']) }}
                    @else {{ Form::radio('genereRichiesto', 'M', false, ['class' => 'radio-form']) }}
                    @endif
    
                    {{ Form::label('genereRichiesto', 'F', ['class' => 'form-label']) }}
                    @if($offerta->genereRichiesto == 'F') {{ Form::radio('genereRichiesto', 'F', true, ['class' => 'radio-form']) }}
                    @else {{ Form::radio('genereRichiesto', 'F', false, ['class' => 'radio-form']) }}
                    @endif

                    {{ Form::label('genereRichiesto', 'A', ['class' => 'form-label']) }}
                    @if($offerta->genereRichiesto == 'A') {{ Form::radio('genereRichiesto', 'A', true, ['class' => 'radio-form']) }}
                    @else {{ Form::radio('genereRichiesto', 'A', false, ['class' => 'radio-form']) }}
                    @endif
                @if ($errors->first('genereRichiesto'))
                    <ul class="errors">
                        @foreach ($errors->get('genereRichiesto') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
        </div>
        
        <div class="col-lg-4 p-3">
            {{ Form::label('etaRichiesta', 'Età minima richiesta ', ['class' => 'label-input']) }}
            {{ Form::text('etaRichiesta', isset($offerta->etaRichiesta) ? $offerta->etaRichiesta : '', ['class' => 'input form-control', 'id' => 'etaRichiesta']) }}
            @if ($errors->first('etaRichiesta'))
                <ul class="errors">
                    @foreach ($errors->get('etaRichiesta') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 p-3">
                {{ Form::label('periodo', 'Inizio periodo di locazione', ['class' => 'label-input col-lg-12']) }}
                {{ Form::date('periodo', isset($offerta->periodo) ? $offerta->periodo : '', ['class' => 'input form-control', 'id' => 'name']) }}
                @if ($errors->first('periodo'))
                    <ul class="errors">
                        @foreach ($errors->get('periodo') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
        </div>
        <div class="col-lg-4 p-3">
                {{ Form::label('prezzo', 'Prezzo della Proposta di locazione', ['class' => 'label-input']) }}
                {{ Form::text('prezzo', isset($offerta->prezzo) ? $offerta->prezzo : '', ['class' => 'input form-control', 'id' => 'prezzo']) }}
                @if ($errors->first('prezzo'))
                    <ul class="errors">
                        @foreach ($errors->get('prezzo') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 p-3">
            {{ Form::label('descrizione', 'Piccola Descrizione', ['class' => 'label-input']) }}
            {{ Form::textarea('descrizione', isset($offerta->descrizione) ? $offerta->descrizione : '', ['class' => 'input col-lg-12 form-control', 'id' => 'descrizione', 'rows' => 2,]) }}
            @if ($errors->first('descrizione'))
                <ul class="errors">
                    @foreach ($errors->get('descrizione') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
            </div>
        
        <!-- Perché devo tenerlo?? -->
        
    </div>
        @if( $offerta ->tipologia == 'A')
        @foreach($appartamento as $app)
        <div class="row">
        <div class="row col-lg-5 details-offerta">
            <div class="col-lg-8 mb-3">
                {{ Form::label('superficie', 'superficie dell appartamento ', ['class' => 'label-input']) }}
                {{ Form::text('superficie',  isset($app->superficie) ? $app->superficie : '', ['class' => 'input form-control', 'id' => 'superficie']) }}
                @if ($errors->first('superficie'))
                    <ul class="errors">
                        @foreach ($errors->get('superficie') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif  
            </div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12 mb-1">
                            {{ Form::label('npostiletto', 'Posti letto dell appartamento', ['class' => 'form-label']) }}
                            {{ Form::select('npostiletto', [1 =>  1, 2 => 2, 3 => 3, 4 => 4, 5 => 5 , 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10], isset($app->npostiletto) ? $app->npostiletto : '', ['class' => 'input select-form' ,'id' => 'npostiletto']) }}
                </div>  
                <div class="col-lg-12 mb-1">
                            {{ Form::label('ncamere', 'Numero camere dell appartamento', ['class' => 'form-label']) }}
                            {{ Form::select('ncamere', [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5,  6 => 6, 7 => 7, 8 => 8], isset($app->ncamere) ? $app->ncamere : '', ['class' => 'input select-form','id' => 'ncamere']) }}
                </div>
                <div class="col-lg-12 mb-1">
                            {{ Form::label('nbagni', 'Numero bagni dell appartamento', ['class' => 'form-label']) }}
                            {{ Form::select('nbagni', [1 => 1, '2' => 2, '3' => '3', '4' => '4', '5'=>'5'], isset($app->nbagni) ? $app->nbagni : '', ['class' => 'input select-form','id' => 'ncamere']) }}
                </div>
            </div>
        </div>
    </div>
        <div class="row col-lg-3 details-offerta">

            <div class="col-lg-12">
                <div class="col-lg-12">Presenza di un locale ricreativo:</div>
                    {{ Form::label('loc_ricr', 'Si', ['class' => 'form-label']) }}
                    @if ($app -> loc_ricr == '1') {{ Form::radio('loc_ricr', 1, true , ['class' => 'radio-form']) }}
                    @else {{ Form::radio('loc_ricr', 1, false, ['class' => 'radio-form']) }}
                    @endif
                    {{ Form::label('loc_ricr', 'No', ['class' => 'form-label']) }}
                    @if ($app -> loc_ricr == '0') {{ Form::radio('loc_ricr', 0, true, ['class' => 'radio-form']) }}
                    @else {{ Form::radio('loc_ricr', 0, false, ['class' => 'radio-form']) }}
                    @endif
                @if ($errors->first('loc_ricr'))
                    <ul class="errors">
                        @foreach ($errors->get('loc_ricr') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            
            <div class="col-lg-12">
                <div class="col-lg-12">Presenza della cucina:</div>
                    {{ Form::label('cucina', 'Si', ['class' => 'form-label']) }}
                    @if ($app -> cucina == '1') {{ Form::radio('cucina', 1, true, ['class' => 'radio-form']) }}
                    @else {{ Form::radio('cucina', 1, false, ['class' => 'radio-form']) }}
                    @endif

                    {{ Form::label('cucina', 'No', ['class' => 'form-label']) }}
                    
                    @if ($app -> cucina == '0') {{ Form::radio('cucina', 0, true, ['class' => 'radio-form']) }}
                    @else {{ Form::radio('cucina', 0, false, ['class' => 'radio-form']) }}
                    @endif
                @if ($errors->first('cucina'))
                    <ul class="errors">
                        @foreach ($errors->get('cucina') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="col-lg-12">
                <div class="col-lg-12">Presenza del terrazzo:</div>
                    {{ Form::label('terrazzo', 'Si', ['class' => 'form-label']) }}
                    @if ($app -> terrazzo == '1') {{ Form::radio('terrazzo', 1, true, ['class' => 'radio-form']) }}
                    @else {{ Form::radio('terrazzo', 1, false, ['class' => 'radio-form']) }}
                    @endif                    
                    {{ Form::label('terrazzo', 'No', ['class' => 'form-label']) }}
                    @if ($app -> terrazzo == '0') {{ Form::radio('terrazzo', 0, true, ['class' => 'radio-form']) }}
                    @else {{ Form::radio('terrazzo', 0, false, ['class' => 'radio-form']) }}
                    @endif                    
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
            
                
        @endforeach
        
        @elseif( $offerta ->tipologia == 'P')
        
        @foreach($postoletto as $pl)
    <div class="row details-offerta col-lg-8">
        <div class="row col-lg-12">
            <div class="col-lg-6 p-3">
                <div class="col-lg-12">Tipo di stanza</div>
                        {{ Form::label('doppia', 'Singola', ['class' => 'form-label']) }}
                        @if ($pl->doppia) {{ Form::radio('doppia', 1, true, ['class' => 'radio-form']) }}
                        @else {{ Form::radio('doppia', 1, false, ['class' => 'radio-form']) }}
                        @endif 

                        {{ Form::label('doppia', 'Doppia', ['class' => 'form-label']) }}
                        @if (!$pl->doppia) {{ Form::radio('doppia', 0, true, ['class' => 'radio-form']) }}
                        @else {{ Form::radio('doppia', 0, false,['class' => 'radio-form']) }}
                        @endif                     

                        @if ($errors->first('doppia'))
                        <ul class="errors">
                            @foreach ($errors->get('doppia') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
            </div>
            <div class="col-lg-6 p-3">
                <div class="col-lg-12"> Luogo per studiare:</div>
                        {{ Form::label('luogoStudio', 'Si', ['class' => 'form-label']) }}
                        @if ($pl->luogoStudio) {{ Form::radio('luogoStudio', 1, true, ['class' => 'radio-form']) }}
                        @else {{ Form::radio('luogoStudio', 1, false, ['class' => 'radio-form']) }}
                        @endif   

                        {{ Form::label('luogoStudio', 'No', ['class' => 'form-label']) }}
                        @if (!$pl->luogoStudio) {{ Form::radio('luogoStudio', 0, true, ['class' => 'radio-form']) }}
                        @else {{ Form::radio('luogoStudio', 0, false, ['class' => 'radio-form']) }}
                        @endif                       

                        @if ($errors->first('luogoStudio'))
                        <ul class="errors">
                            @foreach ($errors->get('luogoStudio') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
            </div>
        </div>
        <div class="row col-lg-12">
            <div class="col-lg-6 p-3">
                <div class="col-lg-12"> Presenza di una finestra:</div>
                        {{ Form::label('finestra', 'Si', ['class' => 'form-label']) }}
                        @if ($pl->finestra) {{ Form::radio('finestra', 1, true, ['class' => 'radio-form']) }}
                        @else {{ Form::radio('finestra', 1, false, ['class' => 'radio-form']) }}
                        @endif                             

                        {{ Form::label('finestra', 'No', ['class' => 'form-label']) }}
                        @if (!$pl->finestra) {{ Form::radio('finestra', 0, true, ['class' => 'radio-form']) }}
                        @else {{ Form::radio('finestra', 0, false, ['class' => 'radio-form']) }}
                        @endif                             

                        @if ($errors->first('finestra'))
                        <ul class="errors">
                            @foreach ($errors->get('finestra') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
            </div>
            <div class="col-lg-4 p-3">
                    {{ Form::label('superficie_postoletto', 'superficie della stanza ', ['class' => 'label-input']) }}
                    {{ Form::text('superficie_postoletto', isset($pl->superficie_postoletto) ? $pl->superficie_postoletto : '' , ['class' => 'input form-control', 'id' => 'superficie_postoletto']) }}
                    @if ($errors->first('superficie_postoletto'))
                        <ul class="errors">
                            @foreach ($errors->get('superficie_postoletto') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
        </div>
    </div>
            
        @endforeach
        @endif
            

    <div class="row">
        <div class="col-lg-5 p-3">
                {{ Form::label('nome_file', 'Immagine', ['class' => 'label-input col-lg-12']) }}
                {{ Form::file('nome_file', ['class' => 'input', 'id' => 'image']) }}
        </div>
    </div>
    <div class="row col-lg-3 p-3">                
                    {{ Form::submit('Modifica offerta', ['class' => 'button-form', 'onclick'=> 'return confirm("Sei sicuro?")']) }}
    </div>
    {{ Form::close()}}
</div>        
@endsection