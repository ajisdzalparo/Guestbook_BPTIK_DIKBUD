<style>
    .pagination {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 1rem;
    }

    .pagination-item {
        margin: 0.25rem 0;
        list-style: none;
    }

    .pagination-link {
        padding: 0.5rem 1rem;
        text-decoration: none;
        color: #333;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 0.25rem;
        transition: background-color 0.3s, color 0.3s;
    }

    .pagination-item.active .pagination-link {
        background-color: #333;
        color: #fff;
        border-color: #333;
    }

    .pagination-link:hover {
        background-color: #333;
        color: #fff;
        border-color: #333;
    }

    @media (min-width: 768px) {
        .pagination {
            flex-direction: row;
        }

        .pagination-item {
            margin: 0 0.25rem;
        }
    }
</style>


@if ($paginator->hasPages())
    <nav class="flex flex-col items-center md:flex-row justify-center mt-6" aria-label="Pagination">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="pagination-item disabled" aria-disabled="true" aria-label="Previous">
                    <span class="pagination-link" aria-hidden="true">&laquo;</span>
                </li>
            @else
                <li class="pagination-item">
                    <a class="pagination-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="pagination-item disabled" aria-disabled="true"><span class="pagination-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pagination-item active" aria-current="page">
                                <span class="pagination-link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="pagination-item">
                                <a class="pagination-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="pagination-item">
                    <a class="pagination-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next">&raquo;</a>
                </li>
            @else
                <li class="pagination-item disabled" aria-disabled="true" aria-label="Next">
                    <span class="pagination-link" aria-hidden="true">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
