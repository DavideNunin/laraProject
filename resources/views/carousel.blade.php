 <div class="row">
        <div class="col-sm-3">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">

                @foreach($offerta->get_foto_offerta() as $nomefile) 
                    <div class="carousel-item @if( $loop->iteration == 1) active @endif">
                        <img class="d-block w-100" src="{{ asset('images/' . $nomefile->nome_file) }}" alt="Foto offerta">
                    </div>
                @endforeach

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
 </div>
