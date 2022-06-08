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
    <div class="pt-5 container-fluid">
    <div class="d-flex justify-content-center"> <h1 class="text-how-title">Come funziona?</h1> </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-4 row">
                <div class="d-flex justify-content-center col-lg-4">
                    <span class="how-icon"> <i class="fa-solid fa-person-running fa-4x"></i> </span>
                </div>
                <div class="col-lg-8">
                    <p class="mt-2 text-how">Registrati al sito e cerca la città in cui studierai</p>
                </div>
            </div>
            <div class="col-sm-4 row">
                <div class="d-flex justify-content-center col-lg-4">
                    <span class="how-icon"> <i class="fa-solid fa-people-roof fa-4x"></i> </span>
                </div>
                <div class="col-lg-8">
                    <p class="mt-2 text-how">Offri o scegli tra le proposte dei locatori</p>
                </div>
            </div>
            <div class="col-sm-4 row">
                <div class="d-flex justify-content-center col-lg-4">
                    <span class="how-icon"> <i <i class="fa-solid fa-person-rays fa-4x"></i> </span>
                </div>
                <div class="col-lg-8">
                    <p class="mt-2 text-how">Opzioni l’offerta e concludi il contratto</p>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<!-- La nostra mission section -->
<div id="mission-section" class="mission  mt-5">
    <div>
        <div class="container mb-5 mt-5">
            
            <div class="col-sm-12 mt-4">
                <h1 class="title-home"> La nostra mission  </h1>
            </div>
            <div class="col-sm-12">
                <p class="text-home"> Aiutarti a trovare la casa perfetta per i tuoi studi. <br> Al giusto prezzo. </p>
            </div>

        </div>

        <div id="chisiamo-section">
            <div class="container mb-5 p-3">
                <div class="col-lg-12">
                    <h4 class="title-chisiamo">Who</h4>
                    <span>Siamo studenti dell'Università Politecnica delle Marche. <br>Strani ma non troppo</span>
                    <div class="col-lg-12 row">
                        <div class="col-lg-3">
                            <div class="col-lg-12 justify-content-center d-flex align-items-center">
                            <img src="{{asset('/images/about-d.png')}}" class="img-fluid img-about" a lt="Responsive image">
                            </div>
                            <div class="col-lg-12 justify-content-center d-flex">
                                Dennis Pierantozzi
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="col-lg-12 justify-content-center d-flex align-items-center">
                            <img src="{{asset('/images/about-c.png')}}" class="img-fluid img-about" alt="Responsive image">
                            </div>
                            <div class="col-lg-12 justify-content-center d-flex">
                                Francesco Maria Mosca
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="col-lg-12 justify-content-center d-flex align-items-center">
                            <img src="{{asset('/images/about-n.png')}}" class="img-fluid img-about" alt="Responsive image">
                            </div>
                            <div class="col-lg-12 justify-content-center d-flex">
                                Nicola Mochi
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="col-lg-12 justify-content-center d-flex align-items-center">
                            <img src="{{asset('/images/about-da.png')}}" class="img-fluid img-about" alt="Responsive image">
                            </div>
                            <div class="col-lg-12 justify-content-center d-flex">
                                Davide Nunin
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chi siamo -->

    
<!-- Faq Section -->
<div class="faq p-5">
    <div class="container">
        <h2 class="title-faq"> Faq </h2>
        <p> Hai qualche domanda? </p>
        @include('faq')
    </div>
</div>

@endsection
