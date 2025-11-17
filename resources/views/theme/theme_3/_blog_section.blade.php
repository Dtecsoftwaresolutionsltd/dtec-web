        <section class="bg-white w-full pt-10 md:pt-[70px] pb-16 md:pb-[130px]">
            <div class="theme-container w-full mx-auto">
                <div class="max-w-[777px] w-full flex flex-col items-center mx-auto mb-10 md:mb-[70px]">
                    <h1 class="border text-purple border-purple/10 py-0.5 px-5 rounded-[30px] w-fit bg-main-gray mb-1">
                        {{ __('News & Blog') }}
                    </h1>
                    <h2 class="text-24 sm:text-48 font-semibold text-black pt-4 text-center">
                        {{ __('Read and explore Our latest news') }}
                    </h2>
                </div>
                <div class="grid grid-cols-4 md:grid-cols-8 lg:grid-cols-12 gap-[30px] ">
                    @foreach ($blogs as $blog)
                    <!-- card start  -->
                    <div data-aos="fade-up" class="col-span-4 bg-white">
                        <div class="w-full aspect-[410/280] overflow-hidden rounded-[15px]">
                            <img src="{{ asset($blog?->image) }}" alt="blog image"
                            class="w-full h-full object-cover" />
                        </div>
                        <div class="flex w-full items-center py-4 gap-5">
                            <p class="text-purple font-semibold">{{ $blog->category->name }}</p>
                            <span class="w-[5px] h-[5px] rounded-full bg-[#D2A98E]"></span>
                            <p class="text-paragraph">{{ $blog->created_at->format('F d, Y') }}</p>
                        </div>
                        <hr class="border-purple/10" />
                        <h3 class="case_card_title text-black text-20 sm:text-24 font-semibold pt-4">
                            <a href="{{ route('blog',$blog->slug) }}">
                                {{ $blog?->title }}</a>
                        </h3>
                        <a href="{{ route('blog',$blog?->slug) }}">
                            <div class="flex items-center gap-2 group mt-4">
                                <span
                                    class="font-medium group-hover:text-purple transition-all duration-300 text-paragraph leading-5 font-inter border-b border-transparent before:inline-block before:border-purple before:border-b before:absolute before:bottom-0 before:transition-all before:duration-300 before:w-0 hover:before:w-full before:overflow-hidden before:h-5 relative">
                                    {{ __('Read More') }}
                                </span>
                                <span class="text-paragraph group-hover:text-purple">{{ get_svg('read-more') }}</span>
                            </div>
                        </a>
                    </div>
                    <!-- card end  -->
                    @endforeach
                </div>
            </div>
        </section>
