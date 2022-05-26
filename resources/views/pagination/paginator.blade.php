<div class="row">
    @if ($paginator->lastPage() != 1)
            <div class="col-lg-2">
                {{ $paginator->firstItem() }} - {{ $paginator->lastItem() }} di {{ $paginator->total() }} ---
            </div>
        @if (!$paginator->onFirstPage())
            <div class="col-lg-2">
                <a href="{{ $paginator->url(1) }}">Inizio</a> | Inizio |
            </div>
        @else
            
        @endif

        @if ($paginator->currentPage() != 1)
            <div class="col-lg-2">
                <a href="{{ $paginator->previousPageUrl() }}">&lt; Precedente</a> |&lt; Precedente |
            </div>
        @else
            
        @endif

        @if ($paginator->hasMorePages())
            <div class="col-lg-2">
                <a href="{{ $paginator->nextPageUrl() }}">Successivo &gt;</a> |Successivo &gt; |
            </div>
        @else
        @endif

        @if ($paginator->hasMorePages())
            <div class="col-lg-2">
                <a href="{{ $paginator->url($paginator->lastPage()) }}">Fine</a>
            </div>
        @else
            <div class="col-lg-2">Fine
            </div>
        @endif
    @endif
</div>
