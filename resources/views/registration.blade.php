@extends('layouts.signin')

@section('title', 'registration')


<!-- Inizio sezione form di registrazione-->
@section('content')
<div class="container">
    <div class= "text-center">
    <h3> REGISTRATI </h3>
</div>
<form action="">
<div class ="row">
        <div class="col-lg-6">
        <label for="nome" class="form-label"> Nome:</label>
        <input type="nome" id="nome" placeholder="Inserisci il tuo nome" class="form-control">
        </div>
        
        <div class="col-lg-6">
        <label for="cognome" class="form-label"> Cognome:</label>
        <input type="cognome" id="cognome" placeholder="Inserisci il tuo cognome" class="form-control">
        </div>
        
       
        </div>
</form>

@endsection