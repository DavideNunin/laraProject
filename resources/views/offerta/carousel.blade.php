<div class="row justify-content-center">
    <div class="col-sm-12">
        <div id="carouselExampleControls{{$offerta->offerta_id}}" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

            @foreach($offerta->get_foto_offerta() as $nomefile) 
                <div class="carousel-item @if( $loop->iteration == 1) active @endif">
                    <img class="d-block w-100 img-carousel" src="{{ asset('images/' . $nomefile->nome_file) }}" alt="Foto offerta">
                </div>
            @endforeach

            </div>


        <a class="carousel-control-prev" href="#carouselExampleControls{{$offerta->offerta_id}}" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
            <a class="carousel-control-next" href="#carouselExampleControls{{$offerta->offerta_id}}" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

        </div>
    </div>
</div>
