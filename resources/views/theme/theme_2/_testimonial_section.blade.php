  <section class="w-full py-16 md:py-[130px]">
      <div class="w-full theme-container mx-auto flex items-center flex-col">
          <div
              class="px-5 py-1.5 md:py-2 md:px-7 rounded-[30px] border-[1.2px] border-blue-seo/30 w-fit bg-blue-seo/10">
              <h1 class="text-base tracking-tight font-medium text-purple leading-5">
                  {{ getTranslatedValue($our_testimonials, 'section_title') }}
              </h1>
          </div>
          <h1
              class="max-w-[813px] font-semibold text-24 sm:text-48 tracking-tight text-app-dark text-center mt-2.5 md:mt-[18px]">
              {{ getTranslatedValue($our_testimonials, 'title') }}
          </h1>
          <div class="grid grid-cols-4 xl:grid-cols-8 gap-[90px] mt-0 xl:mt-[70px] md:mt-10 md:px-28">
              <div class="col-span-2 hidden xl:grid grid-cols-2 gap-2.5">
                  <!-- first slider start -->
                  <div class="col-span-1 relative my-auto">
                      <div class="overlay-vSlider"></div>
                      <div class="swiper vsliderSm max-h-[312px] overflow-hidden">
                          <div class="swiper-wrapper">

                              @foreach ($testimonials as $index => $testimonial)
                              <div class="swiper-slide">
                                  <img src="{{ asset($testimonial?->image) }}" alt="" />
                              </div>
                              @endforeach

                          </div>
                      </div>
                  </div>
                  <!-- first slider end  -->
                  <!-- second slider start -->
                  <div class="col-span-1 relative hidden md:block">
                      <div class="overlay-vSlider"></div>
                      <div class="swiper vslider max-h-[472px] overflow-hidden">
                          <div class="swiper-wrapper">

                              @foreach ($testimonials as $index => $testimonial)
                              <div class="swiper-slide">
                                  <img src="{{ asset($testimonial->image) }}" alt="" />
                              </div>
                              @endforeach

                          </div>
                      </div>
                  </div>
                  <!-- second slider end  -->
              </div>
              <div class="col-span-4 mt-10 ">
                  <div class="swiper h2-testimonial-slider overflow-hidden">
                      <div class="swiper-wrapper">

                          @foreach ($testimonials as $index => $testimonial)
                          <div class="swiper-slide">
                              <div
                                  class="col-span-1 p-5 md:p-[54px] rounded-3xl flex flex-col items-center relative overflow-hidden group border border-white/5 bg-blue-seo">
                                  <!-- animation circle  -->
                                  <div class="absolute -bottom-1 -right-1 flex justify-center items-center w-2 h-2 z-0">
                                      <div class="animated_circle_sm bg-white/10"></div>
                                      <div class="animated_circle_sm2 bg-white/10"></div>
                                      <div class="animated_circle_sm3 bg-white/10"></div>
                                      <div class="animated_circle_sm4 bg-white/10"></div>
                                  </div>
                                  <div class="relative z-10">
                                      @include('theme.svg.testmonial_top')
                                  </div>
                                  <div class="relative z-10">
                                      <h1 class="text-white text-18 md:text-20 font-semibold mt-4 w-full text-center">
                                          {{ $testimonial?->comment }}
                                      </h1>
                                      <div class="flex items-center gap-5 mt-5 md:mt-10 mx-auto w-fit">
                                          <div class="w-14 h-14 rounded-full overflow-hidden">
                                              <img src="{{ asset($testimonial->image) }}" alt=""
                                                  class="w-full object-cover" />
                                          </div>
                                          <div>
                                              <h1 class="text-white text-18 font-semibold">
                                                  {{ $testimonial?->name }}
                                              </h1>
                                              <p class="text-sm leading-7 font-medium text-white">
                                                  {{ $testimonial?->designation }}
                                              </p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          @endforeach
                      </div>
                  </div>
                  <div class="relative w-fit mx-auto pt-10 md:pt-[70px] flex items-center">
                      <div class="flex justify-between absolute w-full">
                          <button
                              class="h2-testimonials-prev w-[30px] h-[30px] rounded-full flex items-center justify-center bg-black-seo overflow-hidden before:inline-block before:w-11 before:h-11 before:border-[1.5px] before:border-blue-seo before:bg-blue-seo relative before:absolute before:z-0 before:-right-12 hover:before:right-0 before:transition-all before:duration-300">
                              @include('theme.svg.testmonial_left_arrow')
                          </button>
                          <button
                              class="rotate-180 h2-testimonials-next w-[30px] h-[30px] rounded-full flex items-center justify-center bg-black-seo overflow-hidden before:inline-block before:w-11 before:h-11 before:border-[1.5px] before:border-blue-seo before:bg-blue-seo relative before:absolute before:z-0 before:-right-12 hover:before:right-0 before:transition-all before:duration-300">
                              @include('theme.svg.testmonial_right_arrow')
                          </button>
                      </div>
                      <div class="h2-testimonial-pagination px-10"></div>
                  </div>
              </div>
              <div class="col-span-2 grid-cols-2 gap-2.5 hidden xl:grid">
                  <!-- second slider start -->
                  <div class="col-span-1 relative">
                      <div class="overlay-vSlider"></div>
                      <div class="swiper vslider max-h-[472px] overflow-hidden">
                          <div class="swiper-wrapper">
                              @foreach ($testimonials as $index => $testimonial)
                              <div class="swiper-slide">
                                  <img src="{{ asset($testimonial->image) }}" alt="" />
                              </div>
                              @endforeach
                          </div>
                      </div>
                  </div>
                  <!-- second slider end  -->
                  <!-- first slider start -->
                  <div class="col-span-1 relative my-auto">
                      <div class="overlay-vSlider"></div>
                      <div class="swiper vsliderSm max-h-[312px] overflow-hidden">
                          <div class="swiper-wrapper">
                              @foreach ($testimonials as $index => $testimonial)
                              <div class="swiper-slide">
                                  <img src="{{ asset($testimonial->image) }}" alt="" />
                              </div>
                              @endforeach
                          </div>
                      </div>
                  </div>
                  <!-- first slider end  -->
              </div>
          </div>
      </div>
  </section>
