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

<div id="how">
    <div class="pt-4 container-fluid">
    <div class="d-flex justify-content-center"> <h1 class="text-how-title">Come funziona?</h1> </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-4">
                <div class="d-flex justify-content-center">
                    <span class="how-icon"> <i class="fa-solid fa-door-open fa-5x"></i> </span>
                </div>
                    <p class="text-center mt-2 text-how">Registrati al sito e cerca la città in cui studierai</p>
            </div>
            <div class="col-sm-4">
                <div class="d-flex justify-content-center">
                    <span class="how-icon"> <i class="fa-brands fa-searchengin fa-5x"></i> </span>
                </div>
                    <p class="text-center mt-2 text-how">Offri o scegli tra le proposte dei locatori</p>
            </div>
            <div class="col-sm-4">
                <div class="d-flex justify-content-center">
                    <span class="how-icon"> <i class="fa-solid fa-file-contract fa-5x"></i> </span>
                </div>
                    <p class="text-center mt-2 text-how">Opzioni l’offerta e concludi il contratto</p>
            </div>
        </div>
    </div>
    </div>
</div>

<!-- La nostra mission section -->
<div id="mission-section" class="mission mt-5">
    <div class="container-fluid">
        <div class="container">
            <div class="col-sm-12">
                <h1 class="title-home"> La nostra mission </h1>
            </div>
            <div class="col-sm-12">
                <p class="text-home"> Aiutarti a trovare la casa perfetta per i tuoi studi. <br> Al giusto prezzo. </p>
            </div>
        </div>
    </div>
</div> 

<!-- Faq Section -->
<div class="faq container mt-5 mb-5">
    <h2 class="text-how-title"> Faq </h2>
    <p> Hai qualche domanda? </p>
    @include('faq')
</div>

@endsection
