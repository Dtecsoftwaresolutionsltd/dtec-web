<section class="py-16 sm:py-[130px] bg-white max-w-full">
    <div class="theme-container mx-auto grid grid-cols-6 lg:grid-cols-12 sm:gap-[63px]">
        <div class="col-span-6">
            <h1 class="px-5 bg-main-gray border border-it-blue/20 text-it-blue font-medium rounded-[30px] w-fit">
                {{ getTranslatedValue($faqs_content, 'section_title') }}
            </h1>
            <h2 class="font-semibold text-24 sm:text-48 text-main-black mt-5">
                {{ getTranslatedValue($faqs_content, 'title') }}
            </h2>
            <p class="text-paragraph mt-[30px] max-w-[424px] mb-[18px]">
                {{ getTranslatedValue($faqs_content, 'short_description') }}
            </p>
            <a href="{{ getTranslatedValue($faqs_content, 'learn_more_button_url') }}">
                <div class="home-two-btn-bg py-3.5 group bg-it-black border-it-black w-fit mt-2.5">
                    <span
                        class="text-base text-white group-hover:text-it-black transition-all duration-300 font-semibold font-inter relative z-10">
                        {{ getTranslatedValue($faqs_content, 'learn_more_button_text') }}
                    </span>
                    @include('theme.theme_7.svg.faq_arrow')
                </div>
            </a>
        </div>
        <div class="col-span-6 mt-5 md:mt-0">


            <div data-aos="fade-up" class="flex flex-col gap-2.5 w-full">
                @foreach ($faqs as $key => $faq)
                    <div class="py-5 px-2 md:px-[30px] w-full rounded-[10px] h7-faq-toggler overflow-hidden transition-all duration-300 max-h-fit h-fit border border-it-blue/15 {{ $key == 0 ? 'bg-it-blue/10 active-h7-faq' : 'bg-it-blue/5' }} cursor-pointer"
                        name="faq-{{ $faq->id }}">
                        <div class="w-full flex justify-between items-center h-fit">
                            <h1 class="font-semibold sm:text-18 text-main-black flex-1">
                                {{ $faq->question }}
                            </h1>
                            <svg width="19" height="10" viewBox="0 0 19 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 2L9.5 8L17 2" stroke="#5F57FF" stroke-width="3" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </div>
                        <p id="faq-body-{{ $faq->id }}" class="md:mt-3.5 mt-6 text-paragraph h-fit">
                            {{ $faq->answer }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
