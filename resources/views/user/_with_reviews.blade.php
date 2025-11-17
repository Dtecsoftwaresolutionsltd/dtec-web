 <div class="dashboard-main w-full flex-1">
     <div class="p-6 rounded-[10px] bg-white " data-aos="fade-up">

         <h4 class="text-18 font-semibols bg-buisness-gray rounded-lg py-5 px-30">{{ __('Reviews') }}</h4>
        <!-- review-commets-starts -->
            @foreach ($reviews as $review)
                <div class="py-30 border-b border-b-gray-100 flex gap-3.5">
                    <!-- img -->
                    <div
                        class="flex items-center justify-center size-[64px] overflow-hidden bg-gray-100 rounded-full">
                        <img src="{{ asset($review->product->thumbnail_image) }}" alt="img"
                            class="w-full h-full object-cover">
                    </div>
                    <!-- content -->
                    <div class="flex-1">
                        <div class="flex flex-col sm:flex-row gap-5 justify-between sm:items-center mb-3">
                            <a href="{{ route('product.view', $review->product->slug) }}">
                                <h4 class="hover:text-black text-22 font-semibold">
                                    {{ $review->product->translate->name }}</h4>
                            </a>

                            <ul class="flex gap-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $review->rating)
                                        <li>
                                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10.9452 0C10.5177 0 10.0902 0.2305 9.86895 0.695408L7.42023 5.86799L1.94157 6.69623C0.95908 6.84469 0.565335 8.10658 1.27782 8.82933L5.24152 12.8533L4.30403 18.5377C4.13528 19.5574 5.16652 20.3348 6.044 19.8543L10.9452 17.1742V0Z"
                                                    fill="#FFC403" />
                                                <path
                                                    d="M10.8829 0C11.3104 0 11.7379 0.2305 11.9592 0.695408L14.4079 5.86799L19.8866 6.69623C20.869 6.84469 21.2628 8.10658 20.5503 8.82933L16.5866 12.8533L17.5241 18.5377C17.6928 19.5574 16.6616 20.3348 15.7841 19.8543L10.8829 17.1742V0Z"
                                                    fill="#FFC403" />
                                            </svg>
                                        </li>
                                    @else
                                        <li>
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.64102 19.5754C4.35854 19.5754 4.08852 19.4874 3.85989 19.321C3.39336 18.9816 3.19952 18.3852 3.37741 17.8366L5.12678 12.4532L0.547785 9.1268C0.0807822 8.78698 -0.112544 8.19012 0.0653417 7.64204C0.243738 7.09269 0.751447 6.72399 1.32836 6.72399H6.98795L8.73681 1.3415C8.91559 0.792529 9.42317 0.423828 9.99996 0.423828C10.5772 0.423828 11.0848 0.792785 11.2628 1.3415L13.0124 6.72399H18.6717C19.2487 6.72399 19.7563 7.09295 19.9345 7.64153C20.1128 8.19012 19.9187 8.78677 19.4528 9.12629L14.8737 12.4532L16.6226 17.8361C16.8008 18.3852 16.607 18.9813 16.1406 19.321C15.6841 19.6531 15.0352 19.6531 14.5788 19.321L10.0002 15.9947L5.42135 19.3215C5.19306 19.4874 4.92316 19.5754 4.64102 19.5754ZM1.32836 7.86242C1.24601 7.86242 1.17311 7.91525 1.14797 7.99377C1.12245 8.07195 1.15022 8.15745 1.21688 8.20586L6.46488 12.0185L4.46033 18.1884C4.43506 18.2665 4.46271 18.352 4.52958 18.4005C4.61193 18.4606 4.67012 18.4606 4.75234 18.4005L10.0002 14.5873L15.2478 18.4003C15.3301 18.4602 15.3891 18.4602 15.4711 18.4006C15.5377 18.352 15.5659 18.2666 15.54 18.1879L13.5352 12.0185L18.7836 8.20564C18.8502 8.15724 18.8776 8.07178 18.8525 7.99356C18.8268 7.91525 18.7541 7.86242 18.6719 7.86242H12.185L10.1807 1.69331C10.1297 1.53631 9.87074 1.53631 9.81944 1.69331L7.81523 7.86242H1.32836Z"
                                                    fill="#FFC403" />
                                            </svg>
                                        </li>
                                    @endif
                                @endfor
                            </ul>

                        </div>
                        <p class="text-16 text-paragraph mb-3 line-clamp-3">{{ __($review->reviews) }}</p>
                        <p class="text-16 text-paragraph">{{ $review->created_at->format('d M Y') }}</p>
                    </div>
                </div>
            @endforeach
        <!-- review-commets-end -->
        
            @if ($reviews->hasPages())
            <div class="pagination flex justify-center items-center gap-30 mt-30">
                <a href="{{ $reviews->appends(['per_page' => request('per_page'), 'search' => request('search')])->previousPageUrl() }}"
                class="flex justify-center items-center size-9 rounded-full bg-white border border-[#E6E6E6] group hover:border-black transition-all duration-300">
                <span class="text-[#7C7C7C] group-hover:text-black">
                    <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1.04557 5.72656L5.60807 10.3516C5.76432 10.5078 6.01432 10.5078 6.13932 10.3516L6.76432 9.72656C6.92057 9.57031 6.92057 9.35156 6.76432 9.19531L3.07682 5.44531L6.76432 1.72656C6.92057 1.57031 6.92057 1.32031 6.76432 1.19531L6.13932 0.570312C6.01432 0.414062 5.76432 0.414062 5.60807 0.570312L1.04557 5.19531C0.889323 5.35156 0.889323 5.57031 1.04557 5.72656Z"
                        fill="currentColor" />
                    </svg>
                </span>
                </a>

                <ul class="flex items-center gap-5">
                @for ($i = 1; $i <= $reviews->lastPage(); $i++)
                    <li>
                    <a href="{{ $reviews->appends(['per_page' => request('per_page'), 'search' => request('search')])->url($i) }}"
                        class="text-paragraph hover:text-purple font-semibold {{ $i == $reviews->currentPage() ? 'text-purple' : '' }}">
                        {{ $i }}
                    </a>
                    </li>
                @endfor
                </ul>

                <a href="{{ $reviews->appends(['per_page' => request('per_page'), 'search' => request('search')])->nextPageUrl() }}"
                class="flex justify-center items-center size-9 rounded-full bg-white border border-[#E6E6E6] group hover:border-black transition-all duration-300">
                <span class="text-[#7C7C7C] group-hover:text-black">
                    <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
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
