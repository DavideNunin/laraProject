@if ($paginator->lastPage() != 1)
<div id="pagination" class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-auto">
        <div class="row">
            @if (!$paginator->onFirstPage())
            <div class="col-lg-auto page-button-inactive">
                <a href="{{ $paginator->previousPageUrl() }}">Precedente</a>
            </div>
            @endif

            @if ($paginator->currentPage() != 1)
            <div class="col-lg-auto page-button-inactive">
                <a href="{{ $paginator->url(1) }}">1</a>
            </div>
            @endif

            @if ($paginator->lastPage()!=1)
            @for ( $i = $paginator->currentPage() - 2 ; $i <= $paginator->currentPage() +2 ; $i++)
                @if ($i>1 && $i< $paginator->lastPage() )
                <div class="col-lg-auto page-button-inactive">
                    <a href="{{ $paginator->url($i)}}">{{$i}}</a>
                </div>
                @endif
            @endfor
            @if ($paginator->currentPage()!= $paginator->lastPage())
            <div class="col-lg-auto page-button-inactive">
                <a href="{{ $paginator->url($paginator->lastPage()) }}">{{$paginator->lastPage()}}</a>
            </div>
            <div class="col-lg-auto page-button-inactive">
                <a href="{{ $paginator->nextPageUrl() }}">Successivo </a>
            </div>
            @endif
            @endif
        </div>
    </div>
    <div class="col-lg-4"></div>

</div>
@endif
