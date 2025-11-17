        <section class="bg-main-black py-16 md:py-[130px] relative">
            <img src="{{ asset(team_bg_image()) }}" alt="" class="absolute top-0 left-0 top-bottom-moving" />
            <div class="theme-container w-full mx-auto">
                <div class="flex flex-col lg:flex-row justify-between w-full mb-10 md:mb-[70px]">
                    <div class="">
                        <h1
                            class="font-medium text-white border border-white/10 bg-white/5 px-5 rounded-[30px] py-1 w-fit">
                            {{ __(' Team Member') }}
                        </h1>
                        <h2 class="text-white font-semibold text-24 sm:text-48 pt-5">
                            {{ __('Experience Team Member') }}
                        </h2>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-10 items-center">
                        <h1
                            class="text-48 sm:text-65 text-white font-semibold justify-between w-full sm:w-fit flex items-center gap-4">
                            <span data-scroll-qs="scroll" data-count-qs="{{ $team_count ?? '28' }}" data-type-qs="+"
                                data-speed-qs="1000">
                                {{ __('28+') }}
                            </span>
                            <span class="text-20 sm:text-22 font-normal text-white/55">
                                {{ __('Team Member') }}
                            </span>
                        </h1>
                        <a href="{{ route('teams') }}">
                            <div class="home-two-btn-bg group bg-purple border-purple py-[15px]">
                                <span
                                    class="text-base group-hover:text-purple text-nowrap text-white transition-all duration-300 font-semibold font-inter relative z-10">
                                    {{ __('Join Our Team') }}
                                </span>
                                <span class="text-white group-hover:text-purple">{{ get_svg('arrow3') }}</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="grid gap-[30px] grid-cols-3 md:grid-cols-6 lg:grid-cols-12 ">

                    <!-- single card start  -->
                    @foreach ($teams as $team)
                        <div class="col-span-3">
                            <div class="flex justify-center items-center relative group/main overflow-hidden">
                                <img src="{{ $team?->image }}" alt=""
                                    class="w-full object-cover rounded-lg overflow-hidden" />
                                <!-- social links  -->
                                <div
                                    class="flex bg-blue-seo absolute bottom-5 translate-y-16 group-hover/main:translate-y-0 transition-all duration-300">
                                    <a href="{{ $team?->facebook }}" target="blank" aria-label="facebook"
                                        class="group w-10 h-10 flex justify-center items-center overflow-hidden relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-white before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                                        {{ get_svg('facebook') }}
                                    </a>
                                    <a href="{{ $team?->twitter }}" target="blank" aria-label="twitter"
                                        class="group w-10 h-10 flex justify-center items-center overflow-hidden relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-white before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                                        {{ get_svg('twitter') }}
                                    </a>
                                    <a href="{{ $team?->instagram }}" target="blank" aria-label="instagram"
                                        class="group w-10 h-10 flex justify-center items-center overflow-hidden relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-white before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                                        {{ get_svg('instagram') }}
                                    </a>
                                    <a href="{{ $team?->linkedin }}" aria-label="Dribble" target="blank"
                                        class="group w-10 h-10 flex justify-center items-center overflow-hidden relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-white before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                                        {{ get_svg('linkedin') }}
                                    </a>
                                </div>
                            </div>

                            <h1 class="text-22 font-semibold text-white mt-6 white_card_title">
                                <p> {{ $team?->name }}</p>
                            </h1>

                            <p class="text-white mt-1">{{ $team?->designation }}</p>
                        </div>
                    @endforeach
                    <!-- single card end  -->
                </div>
            </div>
        </section>
