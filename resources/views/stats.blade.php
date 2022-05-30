@extends('layouts.public',['home_type' => '0'])

@section('title', 'Offerte')

<!-- inizio sezione prodotti -->
@section('content')
<div class="container">
<h2> Statistiche e Offerte </h2>
</div>
<div class="container">
    {{ Form::open(array('route' => 'stats.find', 'class' => 'registration-form')) }}
    <!-- \Carbon\Carbon::now() -->
    <div class="row mb-2">
        <div class="col-lg-3">
            {{ Form::label('start_stats', 'Dal', ['class' => 'form-label']) }}
            {{ Form::date('start_stats',\Carbon\Carbon::now(), ['class' => 'form-date-stats'])}}
            @if ($errors->first('start_stats'))
                <ul class="errors">
                    @foreach ($errors->get('start_stats') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="col-lg-3">
            {{ Form::label('end_stats', 'Al', ['class' => 'form-label']) }}
            {{ Form::date('end_stats',\Carbon\Carbon::now(), ['class' => 'form-date-stats']) }}
            @if ($errors->first('end_stats'))
                <ul class="errors">
                    @foreach ($errors->get('end_stats') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-lg-2">
            {{ Form::label('appartamento', 'appartamento', ['class' => 'form-label']) }}
            {{ Form::radio('tipo', 'a', old('a'), ['class' => 'form-radio-stats']) }}
        </div>
        <div class="col-lg-2">
            {{ Form::label('posto_letto', 'posto Letto', ['class' => 'form-label']) }}
            {{ Form::radio('tipo', 'p', old('p'), ['class' => 'form-radio-stats']) }}
        </div>
        <div class="col-lg-2">
            {{ Form::label('all', 'Tutti i tipi', ['class' => 'form-label']) }}
            {{ Form::radio('tipo', 'all', old('all'), ['class' => 'form-radio-stats']) }}
        </div>
        @if ($errors->first('tipo'))
                <ul class="errors">
                    @foreach ($errors->get('tipo') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
        @endif
    </div>
    
    {{ Form::submit('Trova', ['class' => 'login-button mb-4']) }}
    {{ Form::close() }}

</div>

<!-- Risposta stats -->
<div class="container">
    <h6>start stats {{ $start ?? ''}}</h6>
        <h6>end stats {{ $end ?? ''}}</h6>
        <h6>type stats {{ $tipo ?? ''}}</h6>
        <h6>offerte_opzionate {{ $offerte_opzionate ?? ''}}</h6>
        <h6>offerte_nel_sito {{ $offerte_nel_sito ?? ''}}</h6>
        <h6>contratti_locati {{ $contratti_locati ?? ''}}</h6>
</div>

@endsection

