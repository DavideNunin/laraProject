@extends('layouts.public', ['home_type' => '1'])

@section('title', 'Home')

<!-- inizio sezione prodotti -->
@section('content')

    <div class="d-flex justify-content-center align-items-center">
		<div>
			<p class="super-title-home"> Trova la <br> casa per i <br> tuoi studi </p>
			<div class="d-grid gap-2">
                    <a class="btn btn-home" href="{{ route('offerte') }}">Vedi Offerte <i class="fa-solid fa-arrow-right"></i></a>
            </div>
		</div>
	</div>
</section>

<section id="how">
    <div class="pt-4 container-fluid">
    <div class="d-flex justify-content-center"> <h2 class="text-how">Come funziona?</h2> </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-4">
                <div class="d-flex justify-content-center">
                    <span class="how-icon"> <i class="fa-solid fa-door-open fa-5x"></i> </span>
                </div>
                    <p class="d-flex justify-content-center mt-5">Registrati al sito e cerca la città in cui studierai</p>
            </div>
            <div class="col-sm-4">
                <div class="d-flex justify-content-center">
                    <span class="how-icon"> <i class="fa-brands fa-searchengin fa-5x"></i> </span>
                </div>
                    <p class="d-flex justify-content-center mt-5">Offri o scegli tra le proposte dei locatori</p>
            </div>
            <div class="col-sm-4">
                <div class="d-flex justify-content-center">
                    <span class="how-icon"> <i class="fa-solid fa-file-contract fa-5x"></i> </span>
                </div>
                    <p class="d-flex justify-content-center mt-5">Opzioni l’offerta e concludi il contratto</p>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- La nostra mission section -->
<section id="mission-section" class="mission">
    <div class="container-fluid mission-container">
        <div class="container">
            <div class="col-sm-12">
                <h1 class="title-home"> La nostra mission </h1>
            </div>
            <div class="col-sm-12">
                <p class="text-home"> Aiutarti a trovare la casa perfetta <br> per i tuoi studi. Al giusto prezzo. </p>
            </div>
        </div>
    </div>
</section> 

<!-- Faq Section -->
<div class="faq container mt-5 mb-5">
    <h2 class="title-faq"> Faq </h2>
    <p> Hai qualche domanda? </p>
    @include('faq')
</div>

@endsection
