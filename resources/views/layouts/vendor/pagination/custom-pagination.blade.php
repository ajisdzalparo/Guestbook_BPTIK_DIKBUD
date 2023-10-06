@if ($paginator->hasPages())
    <nav class="flex justify-between items-center mt-6">
        <div class="flex-1 flex justify-between items-center">
            <a
                href="{{ $paginator->previousPageUrl() }}"
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:z-10"
                aria-label="Previous"
            >
                Previous
            </a>
            <div>
                <p class="text-sm text-gray-700">
                    Page <span class="font-medium">{{ $paginator->currentPage() }}</span> of <span class="font-medium">{{ $paginator->lastPage() }}</span>
                </p>
            </div>
            <a
                href="{{ $paginator->nextPageUrl() }}"
                class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:z-10"
                aria-label="Next"
            >
                Next
            </a>
        </div>
    </nav>
@endif
