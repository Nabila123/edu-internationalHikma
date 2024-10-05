@if ($paginator->hasPages())
<nav aria-label="Page navigation example">
    <ul class="pagination pagination-info justify-content-center">
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1"><i class="ki-duotone ki-left fs-2"></i></a>
            </li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"><i class="ki-duotone ki-left fs-2"></i></a></li>
        @endif
      
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled">{{ $element }}</li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                            <a class="page-link text-white">{{ $page }}</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="ki-duotone ki-right fs-2"></i></a>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link" href="#"><i class="ki-duotone ki-right fs-2"></i></a>
            </li>
        @endif
    </ul>
@endif