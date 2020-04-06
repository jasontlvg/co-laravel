@if ($paginator->hasPages())
    <div class="ui pagination menu">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        {{--      No ponemos boton de pagina anterior porque estamos en la primera pagina      --}}
        @else
            <a class="item" href="{{ $paginator->previousPageUrl() }}" aria-label="@lang('pagination.previous')">&lsaquo;</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <div class="disabled item">...</div>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
{{--                        <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>--}}
                        <a class="active item">{{ $page }}</a>
                    @else
{{--                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>--}}
                        <a class="item" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="item" href="{{ $paginator->nextPageUrl() }}" aria-label="@lang('pagination.next')">&rsaquo;</a>
        @else
            <a class="item disabled" href="{{ $paginator->nextPageUrl() }}" aria-label="@lang('pagination.next')">&rsaquo;</a>
        @endif
    </div>
@endif
