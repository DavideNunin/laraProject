@extends('layouts.public',['home_type' => '0'])

@section('title', 'Offerte')

<!-- inizio sezione prodotti -->
@section('content')
<div class="container">
<h2> Statistiche e Offerte </h2>
</div>
<div class="container">
    <div>
        <h6>start stats {{ $start }}</h6>
        <h6>end stats {{ $end }}</h6>
        <h6>type stats {{ $tipo }}</h6>
        <h6>offerte_opzionate {{ $offerte_opzionate }}</h6>
        <h6>offerte_nel_sito {{ $offerte_nel_sito }}</h6>
        <h6>contratti_locati {{ $contratti_locati }}</h6>
    </div>

</div>

<!-- fine sezione laterale -->
@endsection

