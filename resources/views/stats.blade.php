@extends('layouts.public',['home_type' => '0'])

@section('title', 'Offerte')

<!-- inizio sezione prodotti -->
@section('content')
<div class="container">
<h2> Statistiche e Offerte </h2>
</div>
<div class="container">
    {{ Form::open(array('route' => 'stats.find', 'class' => 'registration-form')) }}
    
    <div class="row mb-2">
        <div class="col-lg-3">
            {{ Form::label('start_stats', 'Dal', ['class' => 'form-label']) }}
            {{ Form::date('start_stats', \Carbon\Carbon::now(), ['class' => 'form-date-stats'])}}
        </div>
        <div class="col-lg-3">
            {{ Form::label('end_stats', 'Al', ['class' => 'form-label']) }}
            {{ Form::date('end_stats', \Carbon\Carbon::now(), ['class' => 'form-date-stats']) }}
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-lg-2">
            {{ Form::label('appartamento', 'appartamento', ['class' => 'form-label']) }}
            {{ Form::radio('tipo', 'a', false, ['class' => 'form-radio-stats']) }}
        </div>
        <div class="col-lg-2">
            {{ Form::label('posto_letto', 'posto Letto', ['class' => 'form-label']) }}
            {{ Form::radio('tipo', 'p', false, ['class' => 'form-radio-stats']) }}
        </div>
        <div class="col-lg-2">
            {{ Form::label('all', 'Tutti i tipi', ['class' => 'form-label']) }}
            {{ Form::radio('tipo', 'all', true, ['class' => 'form-radio-stats']) }}
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
<!-- fine sezione laterale -->
@endsection

