  @if ($general_setting->preloader_status == 'enable')
    <div id="preloader">
      <div id="container-preloader" class="container-preloader">
        <div class="animation-preloader">
          <div class="spinner"></div>
          <div class="txt-loading">
            <span preloader-text="Q" class="characters">{{ __("Q") }}</span>

            <span preloader-text="U" class="characters">{{ __('U') }}</span>

            <span preloader-text="L" class="characters">{{ __('L') }}</span>

            <span preloader-text="A" class="characters">{{ __('A') }}</span>

            <span preloader-text="N" class="characters">{{ __('N') }}</span>

            <span preloader-text="D" class="characters">{{ __('D') }}</span>
          </div>
        </div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
      </div>
    </div>
    @endif
