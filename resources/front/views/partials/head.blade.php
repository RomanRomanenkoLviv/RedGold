<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=no, maximum-scale=1.0, viewport-fit=cover"/>
    <meta name="HandheldFriendly" content="True"/>
    <meta http-equiv="cleartype" content="on"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="format-detection" content="address=no"/>

    <title>
        @yield('page-title', 'Template') | RedGold
    </title>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="author" content=""/>
    <meta name="copyright" content="(c)">
    <meta http-equiv="Reply-to" content="mail@gmail.com">

    <meta name="theme-color" content="#000000">


    <!-- Twitter card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@twitter" />
    <meta name="twitter:creator" content="@twitter" />
    <meta name="twitter:image" content="https://example.com/example.png" />
    <meta name="twitter:description" content="Description text" />
    <meta name="twitter:title" content="Title text" />


    <!-- Open Graph -->
    <meta property="og:title" content="Title text" />
    <meta property="og:description" content="Description text" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://example.com/" />
    <meta property="og:image" content="https://example.com/example1200x630.png" />
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="Site Name" />


    <!-- Apple -->
    <link rel="apple-touch-startup-image" href="images/startup.png">
    <link rel="apple-touch-icon" href="images/touch-icon-iphone.png"/>
    <link rel="apple-touch-icon" sizes="72x72" href="images/touch-icon-ipad.png"/>
    <link rel="apple-touch-icon" sizes="114x114" href="images/touch-icon-iphone-retina.png"/>
    <link rel="apple-touch-icon" sizes="144x144" href="images/touch-icon-ipad-retina.png"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>


    <!-- Styles -->
    @section('head-styles')
        <link href="{{ asset(mix('css/app.css', 'front')) }}" rel="stylesheet" type="text/css">
    @show


    <!-- Modernizr -->
    <!-- Initial build: http://modernizr.com/download/#-cssclasses-teststyles-testprop-testallprops-prefixes-domprefixes -->
    {{-- <script src="{{ asset('front/js/vendor/modernizr.min.js') }}"></script> --}}

    <script>
        window.staticRoot = '{{ rtrim(config('app.static_url'), '/') . '/front/' }}';

        window.locale = '{{ App::getLocale() }}';

        window.staticAsset = function (path) {
            return '{{ asset('front/:path:') }}'.replace(':path:', path);
        };
    </script>
</head>
