@extends('layouts.public')

@section('title', 'Catalogo Prodotti')

@section('scripts')

@parent
<script type="text/javascript" src="{{ asset('js/formfaq.js') }}"></script>

@endsection

@section('content')
<div class="container-fluid">
        <div class="row min-vh-100 flex-column flex-md-row">
            <aside class="col-12 col-md-2 p-0 bg-dark flex-shrink-1">
                <span id="#title-chat"> Chat </span>
                <nav class="navbar navbar-expand navbar-dark bg-dark flex-md-column flex-row align-items-start py-2">
                    <div class="collapse navbar-collapse ">
                        <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
                            @foreach($id as $studente)
                            <li class="nav-item">
                                <a class="nav-link pl-0 text-nowrap display-chat" id=" {{$studente->mittente}} ">{{$studente->username}}</a>
                            </li>   
                            @endforeach
                            <!-- qui ci va l'include che popola per ogni utente -->
                        </ul>
                    </div>
                </nav>
            </aside>
            <main class="col bg-faded py-3 flex-grow-1">
                <h2>Example {{Auth::user()->id}}</h2>
               
                <!-- Qui ci va l'include che popola al click dei messaggi -->
            </main>
        </div>
    </div>
@endsection
