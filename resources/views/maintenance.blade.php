  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>{{ env('APP_NAME') }} || {{ __('Maintenance') }}</title>

      <link rel="shortcut icon" href="{{ asset($general_setting->favicon) }}" type="image/x-icon">
      <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap" rel="stylesheet">

      <link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper-bundle.min.css') }}" />
      <link rel="stylesheet" href="{{ asset('frontend/assets/css/aos.css') }}" />
      <!--Todo: compiled from input.css -->
      @vite(['resources/css/app.css', 'resources/js/app.js'])

      <!--Todo: overwrite custom css -->
      <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
      <link rel="stylesheet" href="{{ asset('frontend/assets/custom.css') }}">

      <style>
          body {
              font-family: 'Sora', sans-serif;
          }
      </style>
  </head>

  <body class="bg-[#F8F8F8] min-h-screen flex items-center justify-center">

      @php
          $maintenance_text = Modules\GlobalSetting\App\Models\GlobalSetting::where('key', 'maintenance_text')->first();
          $maintenance_image = Modules\GlobalSetting\App\Models\GlobalSetting::where(
              'key',
              'maintenance_image',
          )->first();
      @endphp

      <main class="w-full max-w-3xl px-4">
          <section class="bg-offWhite py-20">
              <div class="bg-white p-6 rounded-lg shadow text-center">
                  <div class="flex flex-col items-center">
                      <img src="{{ asset($maintenance_image?->value) }}" class="max-w-full h-auto rounded-lg"
                          alt="Maintenance Image" />
                  </div>
                  <div class="mt-6 text-gray-700 text-lg leading-relaxed">
                      <p>{!! clean(nl2br($maintenance_text?->value)) !!}</p>
                  </div>
              </div>
          </section>
      </main>

  </body>

  </html>
