@extends('layouts.public')

@section('title', 'Offerte')

<!-- inizio sezione prodotti -->
@section('content')
@foreach ($catalogo as $offerta)
<div class="container">
</div>
@include('carousel')
<li>{{ $offerta->titolo }}</li>
@endforeach

<div id="content">
    <p>Utente di tipo: {{ $type_user }}</p>

    
    
    

</div>

<!-- fine sezione laterale -->
@endsection

