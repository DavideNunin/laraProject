@if ($paginator->lastPage() != 1)
<div id="pagination" class="row col-lg-12 justify-content-center mb-3">
    <div class="col-lg-4 justify-content-center d-flex">

        <div class="btn-toolbar" role="toolbar" aria-label= "Toolbar with button groups">
            <div class="btn-group mr-2 paginate" role="group" aria-label="group">
                @if (!$paginator->onFirstPage())
                <a href="{{ $paginator->previousPageUrl() }}" type="button" class="btn link-paginate" >
                    Precedente
                </a>
                @endif

                @if ($paginator->currentPage() != 1)
                <a href="{{ $paginator->url(1) }}" type="button" class="btn link-paginate" >
                        1
                </a>
                @endif

                @if ($paginator->lastPage()!=1)
                @for ( $i = $paginator->currentPage() - 2 ; $i <= $paginator->currentPage() +2 ; $i++)
                    @if ($i>1 && $i< $paginator->lastPage() )
                <a href="{{ $paginator->url($i)}}" type="button" class="btn link-paginate" >
                        {{$i}}
                    </a>
                    @endif
                @endfor
                @if ($paginator->currentPage()!= $paginator->lastPage())
                <a href="{{ $paginator->url($paginator->lastPage()) }}" type="button" class="btn link-paginate" >
                    {{$paginator->lastPage()}}
                </a>
                <a href="{{ $paginator->nextPageUrl() }}" type="button" class="btn link-paginate" >
                    Successivo
                </a>
                @endif
                @endif
            </div>

        </div>
    </div>

</div>
@endif
