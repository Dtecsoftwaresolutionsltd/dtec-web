<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @yield('title')
    <link rel="shortcut icon" href="{{ asset($general_setting->favicon) }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/aos.css') }}" />
    <!--Todo: compiled from input.css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/output.css') }}" />
    <!--Todo: overwrite custom css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />

    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap" rel="stylesheet">
    <!-- End google font  -->


    @stack('style_section')

    @if ($general_setting->google_analytic_status == 1)
        <script async
                src="https://www.googletagmanager.com/gtag/js?id={{ $general_setting->google_analytic_id }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }

            gtag('js', new Date());
            gtag('config', '{{ $general_setting->google_analytic_id }}');
        </script>
    @endif


    @if ($general_setting->pixel_status == 1)
        <script>
            !function (f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function () {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '{{ $general_setting->pixel_app_id }}');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
                       src="https://www.facebook.com/tr?id={{ $general_setting->pixel_app_id }}&ev=PageView&noscript=1"
            /></noscript>
    @endif

</head>
