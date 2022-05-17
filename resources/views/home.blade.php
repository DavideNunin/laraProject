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
<section id="faq-section" class="faq pt-5 pb-5"> 
<div class="container">
    <span class="title-home"> Hai qualche domanda? </span>
    
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Domanda 1
        </button>
        </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
            </div>
        </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
            Domanda 2
          </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
            Domanda 3
          </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
        </div>
      </div>
    </div>
    
    
</div>
</section>

@endsection

