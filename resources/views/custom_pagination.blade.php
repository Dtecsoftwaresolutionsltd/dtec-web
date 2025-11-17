<nav aria-label="Page navigation example">
    <ul class="custom-pagination pagination">

        @if ($paginator->onFirstPage())
            <li class="custom-page-item page-item">
                <a href="javascription:;" class="custom-page-link page-link" disabled>{{ __('Prev') }}</a>
            </li>
        @else
            <li class="custom-page-item page-item">
                <a href="{{ $paginator->previousPageUrl() }}" class="custom-page-link page-link">{{ __('Prev') }}</a>
            </li>
        @endif


        @foreach ($elements as $element)
            @if (!is_array($element))
                <li class="custom-page-item page-item"><a class="custom-page-link page-link" href="javascript:;">...</a>
                </li>
            @else
                @if (count($element) < 2)
                @else
                    @foreach ($element as $key => $el)
                        @if ($key == $paginator->currentPage())
                            <li class="custom-page-item page-item active"><a class="custom-page-link page-link"
                                    href="javascript::void()">{{ $key }}</a></li>
                        @else
                            <li class="custom-page-item page-item"><a class="custom-page-link page-link"
                                    href="{{ $el }}">{{ $key }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="custom-page-item page-item">
                <a class="custom-page-link custom-page-item page-link"
                    href="{{ $paginator->nextPageUrl() }}">{{ __('Next') }}</a>
            </li>
        @else
            <li class="custom-page-item page-item">
                <a class="custom-page-link custom-page-item page-link" href="javascript:;"
                    disabled>{{ __('Next') }}</a>
            </li>
        @endif

    </ul>
</nav>
