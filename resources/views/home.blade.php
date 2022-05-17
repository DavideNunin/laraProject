@extends('layouts.public')

@section('title', 'Home')

<!-- inizio sezione prodotti -->
@section('content')
<section class="image-home">
    <div class="h-50 d-flex justify-content-center  flex-column align-items-center">
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
    <div class="container-fluid">
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

    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              Collapsible Group Item #1
                    </button>
                </h2>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                        Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Collapsible Group Item #2
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                        Some placeholder content for the second accordion panel. This panel is hidden by default.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Collapsible Group Item #3
                    </button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                        And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by default.
                      
                </div>
            </div>
        </div>
    </div>
@endsection

