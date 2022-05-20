@extends('layouts.single_offerta',['utente' => $type_user])

@section('title', 'Offerte')

<!-- inizio sezione opzionamenti -->
@section('content')
<!-- devono comparire gli utenti che hanno opzionato quell'offerta -->
    <p> offerta identificativo: {{ $offerta->id }} </p>

    <p> utenti opzione: {{ $utenti }} </p>
@endsection

