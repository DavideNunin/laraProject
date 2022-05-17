@extends('layouts.public',['utente' => $type_user , 'home_type' => '$type_user'])

@section('title', 'Offerte')

<!-- inizio sezione prodotti -->
@section('content')
    <p> offerta identificativo: <?php print($id) ?> </p>
@endsection

