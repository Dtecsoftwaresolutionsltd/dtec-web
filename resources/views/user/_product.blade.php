

<div class="dashboard-main w-full flex-1">
    <div class="p-6 rounded-[10px] bg-white " data-aos="fade-up">

        <div class="order-table border border-[#E0E1E1] rounded-lg overflow-hidden w-full overflow-x-auto">
            <table class="min-w-full divide-y divide-[#E0E1E1]">
                <thead>
                    <tr>
                        <th scope="col" class="p-4 px-30 bg-gray-50 text-start ">
                            <div>
                                <h6 class="text-18 font-medium text-nowrap"> {{ __('Products') }}</h6>
                            </div>
                        </th>
                        <th scope="col" class="p-4 px-30 bg-gray-50 text-start ">
                            <div>
                                <h6 class="text-18 font-medium text-nowrap"> {{ __('Price') }}</h6>
                            </div>
                        </th>
                        <th scope="col" class="p-4 px-30 bg-gray-50 text-start">
                            <div>
                                <h6 class="text-18 font-medium text-nowrap"> {{ __('Action') }}</h6>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#E0E1E1]" id="wishlist-container">
                    @foreach ($wishlists as $product)
                        <tr class="bg-white transition-all">
                            <td class="px-30 py-3.5 text-start">
                                <div class="flex items-center gap-30">
                                    <form action="{{ route('user.wishlist.store') }}" method="POST"
                                        class="wishlist-form" id="wishlist-form-{{ $product->id }}">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit"
                                            class="wishlist_icon {{ auth()->check() && in_array($product->id, auth()->user()->wishlists->pluck('product_id')->toArray()) ? 'active' : '' }}">
                                            <span class="text-black hover:text-red-500">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9 0.53125C13.8164 0.53125 17.7188 4.43359 17.7188 9.25C17.7188 14.0664 13.8164 17.9688 9 17.9688C4.18359 17.9688 0.28125 14.0664 0.28125 9.25C0.28125 4.43359 4.18359 0.53125 9 0.53125ZM9 16.2812C12.8672 16.2812 16.0312 13.1523 16.0312 9.25C16.0312 5.38281 12.8672 2.21875 9 2.21875C5.09766 2.21875 1.96875 5.38281 1.96875 9.25C1.96875 13.1523 5.09766 16.2812 9 16.2812ZM12.5508 7.07031L10.3711 9.25L12.5508 11.4648C12.7266 11.6055 12.7266 11.8867 12.5508 12.0625L11.7773 12.8359C11.6016 13.0117 11.3203 13.0117 11.1797 12.8359L9 10.6562L6.78516 12.8359C6.64453 13.0117 6.36328 13.0117 6.1875 12.8359L5.41406 12.0625C5.23828 11.8867 5.23828 11.6055 5.41406 11.4648L7.59375 9.25L5.41406 7.07031C5.23828 6.92969 5.23828 6.64844 5.41406 6.47266L6.1875 5.69922C6.36328 5.52344 6.64453 5.52344 6.78516 5.69922L9 7.87891L11.1797 5.69922C11.3203 5.52344 11.6016 5.52344 11.7773 5.69922L12.5508 6.47266C12.7266 6.64844 12.7266 6.92969 12.5508 7.07031Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                        </button>
                                    </form>

                                    <div class="flex gap-30 items-center">
                                        <div
                                            class="size-[120px] rounded-[10px] bg-buisness-gray justify-center items-center overflow-hidden">
                                            <img src="{{ asset($product->thumbnail_image) }}" alt="img" class="w-full h-full object-cover">
                                        </div>
                                        <a href="{{ route('product.view', $product->slug) }}">
                                            <p class="hover:text-main-black">{{ $product->translate->name }}</p>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="px-30 py-3.5 text-start">
                                <div>
                                    <p class="text-16 text-nowrap font-semibold">{{ currency($product->price) }}</p>
                                </div>
                            </td>
                            <td class="px-30 py-3.5 text-start">
                                <div class="flex items-center gap-4">
                                    <a data-url="{{ route('user.wishlist.store') }}" class="wishlist-form"
                                        href="javascript:void(0)" data-product-id="{{ $product->id }}">
                                        <button type="submit"
                                            class="wishlist_icon {{ auth()->check() && in_array($product->id, auth()->user()->wishlists->pluck('product_id')->toArray()) ? 'active' : '' }}">
                                            <span
                                                class="size-[46px] rounded-full flex justify-center items-center border border-[#794AFF1A]">
                                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M14 6.5513L14.8798 5.60607C17.3093 2.99589 21.2483 2.99589 23.6779 5.60607C26.1074 8.21624 26.1074 12.4482 23.6779 15.0583L15.7596 23.5654C14.7878 24.6095 13.2122 24.6095 12.2404 23.5654L4.32214 15.0583C1.89262 12.4482 1.89262 8.21624 4.32214 5.60607C6.75165 2.99589 10.6907 2.99589 13.1202 5.60607L14 6.5513Z"
                                                        fill="#FF002A" />
                                                </svg>
                                            </span>
                                        </button>
                                    </a>


                                    <button class="Quland-shop-btn cart-add-btn" data-product-id="{{ $product->id }}"
                                        data-text="{{ __('Add to Cart') }}">
                                        <span class="btn-wraper">
                                            <span
                                                class="size-[46px] rounded-full flex justify-center items-center border border-[#794AFF1A] hover:bg-main-black hover:text-white text-black">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.58683 10H21.4132M18.0351 6L5.96486 6C3.45403 6 1.57594 8.32624 2.08312 10.808L3.71804 18.808C4.09787 20.6666 5.71942 22 7.59978 22H16.4002C18.2806 22 19.9021 20.6666 20.282 18.808L21.9169 10.808C22.4241 8.32624 20.546 6 18.0351 6Z"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M9 2L6 6" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M15 2L18 6" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M9 14L9 18" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M15 14L15 18" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </span>
                                    </button>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if ($wishlists->hasPages())
            <div class="pagination flex justify-center items-center gap-30 mt-30">
                <a href="{{ $wishlists->appends(['per_page' => request('per_page'), 'search' => request('search')])->previousPageUrl() }}"
                    class="flex justify-center items-center size-9 rounded-full bg-white border border-[#E6E6E6] group hover:border-black transition-all duration-300">
                    <span class="text-[#7C7C7C] group-hover:text-black">
                        <svg width="7" height="11" viewBox="0 0 7 11" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.04557 5.72656L5.60807 10.3516C5.76432 10.5078 6.01432 10.5078 6.13932 10.3516L6.76432 9.72656C6.92057 9.57031 6.92057 9.35156 6.76432 9.19531L3.07682 5.44531L6.76432 1.72656C6.92057 1.57031 6.92057 1.32031 6.76432 1.19531L6.13932 0.570312C6.01432 0.414062 5.76432 0.414062 5.60807 0.570312L1.04557 5.19531C0.889323 5.35156 0.889323 5.57031 1.04557 5.72656Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                </a>

                <ul class="flex items-center gap-5">
                    @for ($i = 1; $i <= $wishlists->lastPage(); $i++)
                        <li>
                            <a href="{{ $wishlists->appends(['per_page' => request('per_page'), 'search' => request('search')])->url($i) }}"
                                class="text-paragraph hover:text-purple font-semibold {{ $i == $wishlists->currentPage() ? 'text-purple' : '' }}">
                                {{ $i }}
                            </a>
                        </li>
                    @endfor
                </ul>

                <a href="{{ $wishlists->appends(['per_page' => request('per_page'), 'search' => request('search')])->nextPageUrl() }}"
                    class="flex justify-center items-center size-9 rounded-full bg-white border border-[#E6E6E6] group hover:border-black transition-all duration-300">
                    <span class="text-[#7C7C7C] group-hover:text-black">
                        <svg width="7" height="11" viewBox="0 0 7 11" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.73275 5.72656L2.17025 10.3516C2.014 10.5078 1.764 10.5078 1.639 10.3516L1.014 9.72656C0.857747 9.57031 0.857747 9.35156 1.014 9.19531L4.7015 5.44531L1.014 1.72656C0.857747 1.57031 0.857747 1.32031 1.014 1.19531L1.639 0.570312C1.764 0.414062 2.014 0.414062 2.17025 0.570312L6.73275 5.19531C6.889 5.35156 6.889 5.57031 6.73275 5.72656Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                </a>
            </div>
        @endif

    </div>
</div>
@push('script_section')
    <script>
        $(document).on('click', '.wishlist-form', function(e) {
            e.preventDefault();

            let productId = $(this).data('product-id');
            let form = $(`#wishlist-form-${productId}`);


            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize(),
                success: function(response) {
                    toastr.success(`{{ __('Item removed from wishlist') }}`);
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                },
                error: function() {
                    toastr.error('Server error, please try again.');
                }
            });
        });
    </script>
@endpush
