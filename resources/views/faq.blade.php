   
<div class="accordion" id="accordionExample">
@foreach($elfaq as $singlefaq)

        <div class="card">
            <div class="card-header" id="heading{{ $singlefaq->id}}">
                <h2 class="mb-0">
                    <button class="btn link-website text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $singlefaq->id}}" aria-expanded="true" aria-controls="collapse{{ $singlefaq->id }}">
    {{ $singlefaq->domanda}}
                    </button>
                </h2>
            </div>

            <div id="collapse{{ $singlefaq->id }}" class="collapse @if( $loop->iteration == 1) show @endif" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
{{ $singlefaq->risposta }}
                </div>
            </div>
        </div>
@endforeach
</div>
