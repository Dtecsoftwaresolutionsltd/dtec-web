<section class="bg-buisness-light-black py-16 md:py-[130px] relative">
            <div class="theme-container w-full mx-auto">
                <div class="flex flex-col xl:flex-row justify-between w-full mb-10 md:mb-[70px]">
                    <div class="">
                        <h1
                            class="font-medium text-white border border-white/10 bg-white/5 px-5 rounded-[30px] py-1 w-fit">
                            {{ __('Team Member') }}
                        </h1>
                        <h2 class="text-white font-semibold text-24 sm:text-48 pt-5">
                            {{ __('Experience Team Member') }}
                        </h2>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-10 items-center">
                        <h1
                            class="text-48 sm:text-65 text-white font-semibold justify-between w-full sm:w-fit flex items-center gap-4">
                            <span data-scroll-qs="scroll" data-count-qs="{{ $team_count }}" data-type-qs="+"
                                data-speed-qs="1000">{{ $team_count }}+</span>
                            <span class="text-20 sm:text-22 font-normal text-white/55">
                                {{ __('Team Member') }}
                            </span>
                        </h1>
                        <a href="{{ route('teams') }}">
                            <div class="home-two-btn-bg group bg-buisness-light-black border-white/10 py-[15px]">
                                <span
                                    class="text-base group-hover:text-buisness-light-black text-white transition-all duration-300 font-semibold font-inter relative z-10">
                                    {{ __('View All Member') }}
                                </span>
                                {{ get_svg('white-black') }}
                            </div>
                        </a>
                    </div>
                </div>
                <div class="grid gap-[30px] grid-cols-3 md:grid-cols-6 lg:grid-cols-12 mb-10 md:mb-[70px]">
                    @foreach ($teams as $team)
                    <!-- single card start  -->
                    <div class="col-span-3">
                        <div class="flex justify-center items-center relative group/main overflow-hidden">
                            <img src="{{ asset($team?->image) }}" alt=""
                                class="w-full object-cover rounded-lg overflow-hidden" />
                            <!-- social links  -->
                            <div
                                class="flex bg-buisness-red absolute bottom-5 translate-y-16 group-hover/main:translate-y-0 transition-all duration-300 rounded-md overflow-hidden">
                                <a href="{{ $team?->facebook }}" target="blank" aria-label="facebook"
                                    class="group w-10 h-10 flex justify-center items-center overflow-hidden relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-white before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">

                                    {{ get_svg('facebook-red') }}
                                </a>
                                <a href="{{ $team?->twitter }}" target="blank" aria-label="twitter"
                                    class="group w-10 h-10 flex justify-center items-center overflow-hidden relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-white before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                                    {{ get_svg('twitter-red') }}
                                </a>
                                <a href="{{ $team?->instagram }}" target="blank" aria-label="instagram"
                                    class="group w-10 h-10 flex justify-center items-center overflow-hidden relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-white before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                                    {{ get_svg('instagram-red') }}
                                </a>
                                <a href="{{ $team?->linkedin }}" target="blank" aria-label="dribble"
                                    class="group w-10 h-10 flex justify-center items-center overflow-hidden relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-white before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                                    {{ get_svg('linkedin-red') }}
                                </a>
                            </div>
                        </div>

                        <h1 class="text-22 font-semibold text-white mt-6 white_card_title">
                            <p>{{ $team?->name }}</p>
                        </h1>

                        <p class="text-white mt-1">{{ $team?->designation }}</p>
                    </div>
                    <!-- single card start  -->
                    @endforeach
                </div>
            </div>
        </section>
