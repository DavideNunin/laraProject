@extends('layouts.public')

@section('title', 'Home')

<!-- inizio sezione prodotti -->
@section('content')

    <div class="container">
        <div class="col-lg-12 d-flex justify-content-center text-not-found"> Pagina non trovata </div>
        <div class="col-lg-12 d-flex justify-content-center">
            <object data="{{asset('/images/404.svg')}}" width="700" height="400"> </object>
        </div>
    </div>

@endsection
