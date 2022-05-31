@extends('layouts.single_offerta',['utente' => $type_user])

@section('title', 'Offerte')

<!-- inizio sezione prodotti -->
@section('content')
    <p> offerta identificativo: {{ $offerta->id }} </p>
    <p>{{$utenti}} </p>

<div class="container">
    <div class="accordion" id="accordionExample">
        @foreach ($utenti as $utente)
        <div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <div class="row">
                    <div class="col-lg-10">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Richiesta effettuata da {{$utente->username}} il {{$utente->data}}
                    </div>
                    <div class="col-lg-2">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="#"> <span style="font-size: 13px"> Annulla </span> </a>
                            </div>
                            <div class="col-lg-6">
                                <a href="#"> <span style="font-size: 13px"> Assegna </span> </a>
                            </div>
                        </div>
                    </div>
                </div>
              </button>
            </h2>
          </div>
      
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10">
                            <p> Informazioni dello studente che ha opzionato la tua offerta </p>
                            {{$utente->nome}}  {{  $utente ->cognome }}<br>
                            {{$utente->data_nascita}}
                        </div>
                        <div class="col-lg-2">
                            <a href="#"> Apri chat </a>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>  
</div> 
@endsection

