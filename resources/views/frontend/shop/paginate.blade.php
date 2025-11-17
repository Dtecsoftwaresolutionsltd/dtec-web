@if($products->haspages())
<nav class="flex items-center gap-3 sm:gap-8 mt-10">
    <!-- Previous Button -->
    @if ($products->onFirstPage())
    <button
        class="size-6 sm:size-9 flex items-center justify-center rounded-full text-paragraph hover:text-black border border-gray-100 hover:border-black" disabled>
        <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M1.04508 5.72656L5.60758 10.3516C5.76383 10.5078 6.01383 10.5078 6.13883 10.3516L6.76383 9.72656C6.92008 9.57031 6.92008 9.35156 6.76383 9.19531L3.07633 5.44531L6.76383 1.72656C6.92008 1.57031 6.92008 1.32031 6.76383 1.19531L6.13883 0.570312C6.01383 0.414062 5.76383 0.414062 5.60758 0.570312L1.04508 5.19531C0.888835 5.35156 0.888835 5.57031 1.04508 5.72656Z"
                fill="currentColor" />
        </svg>
    </button>
    @else
    <a href="{{ $products->previousPageUrl() }}"
        class="size-6 sm:size-9 flex items-center justify-center rounded-full text-paragraph hover:text-black border border-gray-100 hover:border-black">
        <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M1.04508 5.72656L5.60758 10.3516C5.76383 10.5078 6.01383 10.5078 6.13883 10.3516L6.76383 9.72656C6.92008 9.57031 6.92008 9.35156 6.76383 9.19531L3.07633 5.44531L6.76383 1.72656C6.92008 1.57031 6.92008 1.32031 6.76383 1.19531L6.13883 0.570312C6.01383 0.414062 5.76383 0.414062 5.60758 0.570312L1.04508 5.19531C0.888835 5.35156 0.888835 5.57031 1.04508 5.72656Z"
                fill="currentColor" />
        </svg>
    </a>
    @endif

    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
    <div class="flex gap-2 sm:gap-5">
        <!-- Page 1 -->
        @if ($page == $products->currentPage())
        <button class="text-14 sm:text-base  {{ $page == $products->currentPage() ? 'text-black' : 'text-paragraph' }} font-semibold  hover:text-black ">
          {{ $page }}
        </button>
        @else
        <a href="{{ $url }}"
            class="text-14 sm:text-base text-paragraph font-semibold hover:text-black">
            {{ $page }}
        </a>
        @endif

    </div>
    @endforeach
    <!-- Next Button -->
     @if ($products->hasMorePages())
    <a href="{{ $products->nextPageUrl() }}"
        class="size-6 sm:size-9 flex items-center justify-center rounded-full text-paragraph hover:text-black border border-gray-100 hover:border-black ">
        <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M6.73275 5.72656L2.17025 10.3516C2.014 10.5078 1.764 10.5078 1.639 10.3516L1.014 9.72656C0.857747 9.57031 0.857747 9.35156 1.014 9.19531L4.7015 5.44531L1.014 1.72656C0.857747 1.57031 0.857747 1.32031 1.014 1.19531L1.639 0.570312C1.764 0.414062 2.014 0.414062 2.17025 0.570312L6.73275 5.19531C6.889 5.35156 6.889 5.57031 6.73275 5.72656Z"
                fill="black" />
        </svg>
    </a>
    @else
        <button
        class="size-6 sm:size-9 flex items-center justify-center rounded-full text-paragraph hover:text-black border border-gray-100 hover:border-black " disabled>
        <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M6.73275 5.72656L2.17025 10.3516C2.014 10.5078 1.764 10.5078 1.639 10.3516L1.014 9.72656C0.857747 9.57031 0.857747 9.35156 1.014 9.19531L4.7015 5.44531L1.014 1.72656C0.857747 1.57031 0.857747 1.32031 1.014 1.19531L1.639 0.570312C1.764 0.414062 2.014 0.414062 2.17025 0.570312L6.73275 5.19531C6.889 5.35156 6.889 5.57031 6.73275 5.72656Z"
                fill="black" />
        </svg>
    </button>
    @endif
</nav>
@endif
