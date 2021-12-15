<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>{{ config('app.name') }} | {{ $page->title ?? '' }}</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Donald - Bootstrap eCommerce Template">
    <meta name="author" content="D-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ \Illuminate\Support\Facades\Storage::url(config('site_configurations.details.logo'))}}">

    <script>
        WebFontConfig = {
            google: { families: ['Open+Sans:400,600,700', 'Poppins:400,600,700'] }
        };
        (function (d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = 'front/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>



    <link rel="stylesheet" type="text/css" href="{{ asset('front/vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/vendor/animate/animate.min.css') }}">

    <!-- Plugins CSS File -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/vendor/magnific-popup/magnific-popup.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/vendor/owl-carousel/owl.carousel.min.css') }}">


    @livewireStyles

    @yield('page-css')

</head>
