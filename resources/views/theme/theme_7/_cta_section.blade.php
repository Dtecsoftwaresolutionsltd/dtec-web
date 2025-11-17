  <section id="consultation" class="relative bg-white">
      <div class="absolute -bottom-2 w-full bg-it-black h-[152px]"></div>
      <div class="consultation-section-wrapper w-full relative overflow-hidden">
          <div class="theme-container mx-auto relative z-10">
              <div class="w-full py-[80px] bg-it-blue rounded-[20px] md:flex relative overflow-hidden">
                  <!-- bg shapes  -->

                  @include('theme.theme_7.svg.cta_shape_1')
                  @include('theme.theme_7.svg.cta_shape_2')
                  @include('theme.theme_7.svg.cta_shape_3')

                  <div class="w-full flex flex-col items-center">
                      <h1
                          class="py-0.5 px-5 bg-white/10 border-white/20 border rounded-[30px] font-medium text-white w-fit mx-auto">
                          {{ getTranslatedValue($get_consultations_content, 'section_title') }}
                      </h1>
                      <h2 class="md:text-48 text-24 font-semibold text-white mb-[32px] mt-2.5 w-full text-center">
                          {{ getTranslatedValue($get_consultations_content, 'title') }}
                      </h2>
                      <p class="text-white mb-[45px] w-full text-center">
                          {{ getTranslatedValue($get_consultations_content, 'short_description') }}
                      </p>

                      <a href="{{ getTranslatedValue($get_consultations_content, 'button_url') }}">
                          <div
                              class="home-two-btn-white-rev group before:bg-white after:bg-white hover:border-it-blue transition-all duration-500 w-fit">
                              <span
                                  class="text-base group-hover:text-it-blue text-white transition-all duration-300 font-semibold font-inter relative z-10 py-0.5">
                                  {{ getTranslatedValue($get_consultations_content, 'button_text') }}
                              </span>
                              @include('theme.svg.arrow-white-7')
                          </div>
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </section>
