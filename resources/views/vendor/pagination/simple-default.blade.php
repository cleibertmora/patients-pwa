@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li><a class="btn" disabled><< Anterior</a></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" class="btn blue-grey darken-1" rel="prev"><< Anterior</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" class="btn blue-grey darken-1" rel="next">Siguiente >></a></li>
        @else
            <li><a class="btn" disabled>Siguiente >></a></li>
        @endif
    </ul>
@endif
