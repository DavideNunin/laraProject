@extends('layouts.public')

@section('title', 'Offerte')

<!-- inizio sezione prodotti -->
@section('content')
@foreach ($catalogo as $offerta)
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('images/image-home.jpg') }}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('images/back-login.jpg') }}" alt="Second slide">
                </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        </div class=""
    </div>
</div>
<li>{{ $offerta->titolo }}</li>
@endforeach

<div id="content">
    <p>Utente di tipo: {{ $type_user }}</p>

    
    
    

</div>

<!-- fine sezione laterale -->
@endsection

