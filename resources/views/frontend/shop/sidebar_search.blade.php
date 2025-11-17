<div
    class="fixed z-[99999] lg:z-0 lg:static -left-full top-0 active:left-0 w-screen h-screen lg:w-fit lg:h-fit p-5 lg:p-0 active:bg-black/40 active:lg:bg-transparent active:overflow-y-auto active:lg:overflow-visible transition-all duration-300">
    <!-- Filter Sidebar -->
    <aside
        class="bg-white lg:h-full lg:overflow-auto  rounded-xl px-6 py-5 w-full max-w-xs mx-auto border border-grayscale-200 flex flex-col gap-10 relative">
        <button
            class="lg:hidden filterBtn text-headline hover:text-error-dark transition-all duration-300 absolute right-5 top-2">
            X
        </button>
        <form id="filterForm" action="{{ route('product.search') }}" method="GET">
            <div id="category-accordion" class="">
                <div class="accordion-item ">
                    <div class="mb-2">
                        <h6 class="text-18 font-medium">{{ __('Search') }}</h6>
                    </div>
                    <div class="relative">

                        <input type="text" name="query" placeholder="Search" value="{{ request('query') }}"
                            class="placeholder:text-paragraph w-full h-[50px] bg-buiness-gray border border-buisness-red/10 focus:border-main-black focus:outline-none focus:right-0 rounded-full px-[25px]" />
                        <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2 text-primary">
                            <span class="flex items-center justify-center h-full">
                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.031 14.6168L20.3137 18.8995L18.8995 20.3137L14.6168 16.031C13.0769 17.263 11.124 18 9 18C4.032 18 0 13.968 0 9C0 4.032 4.032 0 9 0C13.968 0 18 4.032 18 9C18 11.124 17.263 13.0769 16.031 14.6168ZM14.0247 13.8748C15.2475 12.6146 16 10.8956 16 9C16 5.1325 12.8675 2 9 2C5.1325 2 2 5.1325 2 9C2 12.8675 5.1325 16 9 16C10.8956 16 12.6146 15.2475 13.8748 14.0247L14.0247 13.8748Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                        </button>

                    </div>
                </div>
            </div>
            <!-- Category -->
            <input type="hidden" name="item_quantity" id="item_quantity" value="{{ request('item_quantity', 12) }}">
            <input type="hidden" name="sort_by" id="sort_by" value="{{ request('sort_by', '') }}">

            <div id="category-accordion" class="">
                <div class="accordion-item active">
                    <button type="button"
                        class="accordion-toggle flex items-center justify-between w-full py-3 text-left group">
                        <h6 class="text-18 font-medium">{{ __('Product Category') }}</h6>
                    </button>
                    <div class="accordion-content overflow-hidden transition-all duration-300 max_height_none">
                        <div class="space-y-2">
                            @foreach ($categories as $category)
                                <label for="{{ $category?->name }}-{{ $category?->id }}"
                                    class="text-16p text-paragraph flex justify-between">
                                    <div class="flex items-center gap-3 cursor-pointer">
                                        <input type="radio"
                                            {{ request()->input('categories') == $category?->id ? 'checked' : '' }}
                                            name="categories" value="{{ $category?->id }}"
                                            id="{{ $category?->name }}-{{ $category?->id }}" class="category-radio">
                                        <span>{{ $category?->name }}</span>
                                    </div>
                                    <span>({{ $category->products->count() }})</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bought (Price Range) -->
            <div class="mt-30">
                <h6 class="text-18 font-medium">{{ __('Filter by Price') }}</h6>
                <div class="flex gap-2 flex-col mt-30">
                    <!-- range input  -->
                    <div class="range-input-container w-full">
                        <input type="text" id="modal-average_price" class="popover-input" />
                        <div class="slider-container">
                            <div class="range-slider"></div>
                        </div>
                        <div class="range-input">
                            <input type="range" class="min-range" min="1" name="min_price"
                                max="{{ $productMaxPrice ?? 999 }}" value="{{ request()->input('min_price', 1) }}"
                                step="1" />
                            <input type="range" class="max-range" min="1" name="max_price"
                                max="{{ $productMaxPrice ?? 999 }}"
                                value="{{ request()->input('max_price', $productMaxPrice) }}" step="1" />

                        </div>
                        <div class="range-top-wrapper mt-5">
                            <div class="range-output-wrapper flex gap-5 w-full">
                                <div class="value-input">
                                    <input type="number"
                                        class="min-input w-full bg-grey-50 border border-grey-200 px-4 py-3 rounded-lg"
                                        value="{{ request()->input('min_price', 1) }}" />
                                </div>
                                <div class="value-input">
                                    <input type="number"
                                        class="max-input w-full bg-grey-50 border border-grey-200 px-4 py-3 rounded-lg"
                                        value="{{ request()->input('max_price', $products->max('price')) }}" />
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>



            <!-- Brand -->
            <div class="mt-30">
                <h6 class="text-18 font-medium">{{ __('Brand') }}</h6>
                <div class="flex flex-col gap-4 mt-30">
                    @foreach ($brands as $brand)
                        <label for="{{ $brand?->name }}-{{ $brand?->id }}"
                            class="text-16p text-paragraph flex justify-between">
                            <div class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" {{ request()->input('brand') == $brand?->id ? 'checked' : '' }}
                                    name="brand" value="{{ $brand?->id }}"
                                    id="{{ $brand?->name }}-{{ $brand?->id }}" class="category-radio">
                                <span>{{ $brand?->name }}</span>
                            </div>
                            <span>({{ $brand?->total_products }})</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <!-- Buttons -->
            <div class="grid grid-cols-2 mt-30">
                 <a href="{{ route('product.shop') }}" class="btn-dark !bg-transparent !text-buisness-red w-full">{{ __('Reset') }}</a>
                <button type="submit" class="btn-dark w-full">{{ __('Apply') }}</button>
            </div>
        </form>
    </aside>
</div>
