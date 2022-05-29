@if ($paginator->lastPage() != 1)
<div id="pagination" class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">

        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group mr-2" role="group" aria-label="group">
                @if (!$paginator->onFirstPage())
                <a href="{{ $paginator->previousPageUrl() }}" type="button" class="btn btn-secondary" >
                    Precedente
                </a>
                @endif

                @if ($paginator->currentPage() != 1)
                <a href="{{ $paginator->url(1) }}" type="button" class="btn btn-secondary" >
                        1
                </a>
                @endif

                @if ($paginator->lastPage()!=1)
                @for ( $i = $paginator->currentPage() - 2 ; $i <= $paginator->currentPage() +2 ; $i++)
                    @if ($i>1 && $i< $paginator->lastPage() )
                <a href="{{ $paginator->url($i)}}" type="button" class="btn btn-secondary" >
                        {{$i}}
                    </a>
                    @endif
                @endfor
                @if ($paginator->currentPage()!= $paginator->lastPage())
                <a href="{{ $paginator->url($paginator->lastPage()) }}" type="button" class="btn btn-secondary" >
                    {{$paginator->lastPage()}}
                </a>
                <a href="{{ $paginator->nextPageUrl() }}" type="button" class="btn btn-secondary" >
                    Successivo
                </a>
                @endif
                @endif
            </div>

    </div>
    </div>
    <div class="col-lg-4"></div>

</div>
@endif
