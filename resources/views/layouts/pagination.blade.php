<!-- resources/views/layouts/pagination.blade.php -->
@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="flex space-x-4">
            {{-- Hiển thị trang trước --}}
            @if ($paginator->onFirstPage())
                {{-- Trang đầu tiên --}}
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                    &lt; Trước
                </span>
            @else
                {{-- Trang không phải là trang đầu tiên --}}
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring ring-blue focus:ring-opacity-50 active:bg-gray-100 active:text-gray-800 transition ease-in-out duration-150">
                    &lt; Trước
                </a>
            @endif

            {{-- Hiển thị số trang --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span aria-disabled="true" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                        {{ $element }}
                    </span>
                @endif

                {{-- Số trang --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            {{-- Trang hiện tại --}}
                            <span aria-current="page" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-gray-300 cursor-default leading-5 rounded-md">
                                {{ $page }}
                            </span>
                        @else
                            {{-- Trang không phải là trang hiện tại --}}
                            <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring ring-blue focus:ring-opacity-50 active:bg-gray-100 active:text-gray-800 transition ease-in-out duration-150">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Hiển thị trang kế tiếp --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring ring-blue focus:ring-opacity-50 active:bg-gray-100 active:text-gray-800 transition ease-in-out duration-150">
                    Sau &gt;
                </a>
            @else
                {{-- Trang cuối cùng --}}
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                    Sau &gt;
                </span>
            @endif
        </div>
    </nav>
@endif
