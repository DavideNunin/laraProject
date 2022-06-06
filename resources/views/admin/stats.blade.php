@extends('layouts.public',['home_type' => '0'])

@section('title', 'Statistiche')

<!-- inizio sezione prodotti -->
@section('content')
<div class="container d-flex justify-content-center">
<h2> Statistiche </h2>
</div>
<div class="container">
    {{ Form::open(array('route' => 'stats.find', 'class' => 'registration-form')) }}
    <!-- \Carbon\Carbon::now() -->
    <div class="row justify-content-center">
    <div class="row col-lg-6 stats p-3">
        <div class="col-lg-12">
            <div class="row mb-2 col-lg-12">
                <div class="col-lg-6">
                    {{ Form::label('start_stats', 'Dal', ['class' => 'form-label']) }}
                    {{ Form::date('start_stats',old('start_stats'), ['class' => 'form-date-stats'])}}
                    @if ($errors->first('start_stats'))
                        <ul class="errors">
                            @foreach ($errors->get('start_stats') as $message)
                            {{ $message }}</br>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="col-lg-6">
                    {{ Form::label('end_stats', 'Al', ['class' => 'form-label']) }}
                    {{ Form::date('end_stats', old('end_stats'), ['class' => 'form-date-stats']) }}
                    @if ($errors->first('end_stats'))
                        <ul class="errors">
                            @foreach ($errors->get('end_stats') as $message)
                            {{ $message }}</br>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
        <div class="row mb-2 col-lg-12">
            <div class="col-lg-4">
                {{ Form::label('appartamento', 'appartamento', ['class' => 'form-label']) }}
                {{ Form::radio('tipo', 'a', old('a'), ['class' => 'form-radio-stats']) }}
            </div>
            <div class="col-lg-4">
                {{ Form::label('posto_letto', 'Posto letto', ['class' => 'form-label']) }}
                {{ Form::radio('tipo', 'p', old('p'), ['class' => 'form-radio-stats']) }}
            </div>
            <div class="col-lg-4">
                {{ Form::label('all', 'Tutti i tipi', ['class' => 'form-label']) }}
                {{ Form::radio('tipo', 'all', old('all'), ['class' => 'form-radio-stats']) }}
            </div>
            @if ($errors->first('tipo'))
                    <ul class="errors">
                        @foreach ($errors->get('tipo') as $message)
                        {{ $message }}</br>
                        @endforeach
                    </ul>
            @endif
        </div>
    </div> 
        <div class="col-lg-1 d-flex align-items-center stats p-1">
            {{ Form::submit('Trova', ['class' => 'login-button mb-4']) }}
            {{ Form::close() }}
        </div>
    </div>
      

</div>

<!-- Risposta stats -->
<div class="container mt-4 mb-4">  
    <div class="row justify-content-center">
        <h3 class="col-lg-12 d-flex justify-content-center"> La tua ricerca </h3>
        <div class="col-lg-2">
            Dal <span class="title-stats">{{ $start ?? ''}}</span>
        </div>
        <div class="col-lg-2">
            Al <span class="title-stats">{{ $end ?? ''}}</span>
        </div>
        <div class="col-lg-3">
            Le offerte di tipo: <span class="title-stats">{{$tipo ?? ''}}</span>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="row col-lg-3">
            <div class="stats-card p-3">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="row">
                        <i class="fa-solid fa-list-ul icon-stats col-lg-3"></i>
                        <span class="title-card-stats col-lg-9 d-flex align-items-center">Offerte nel sito</span>
                    </div>
                </div>
                <div class="col-lg-12 d-flex justify-content-center result-stats">
                    <span>{{ $offerte_nel_sito ?? ''}}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="stats-card p-3">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="row">
                        <i class="fa-solid fa-list-check icon-stats col-lg-3"></i>
                        <span class="title-card-stats col-lg-9 d-flex align-items-center">Offerte opzionate</span>
                    </div>
                </div>
                <div class="col-lg-12 d-flex justify-content-center result-stats">
                    {{ $offerte_opzionate ?? ''}}
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="stats-card p-3">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="row">
                        <i class="fa-solid fa-handshake-simple icon-stats col-lg-3"></i>
                        <span class="title-card-stats col-lg-9 d-flex align-items-center">Contratti locati</span>
                    </div>
                </div>
                <div class="col-lg-12 d-flex justify-content-center result-stats">
                    {{ $contratti_locati ?? ''}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

