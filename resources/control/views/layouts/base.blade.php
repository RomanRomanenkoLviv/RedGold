<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8" />
        <title>Ring</title>
        <meta name="description" content="app" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#0071bb">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">

        <!-- <link rel="stylesheet" href="{{ asset(mix('/css/font-awesome.min.css', 'control')) }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset(mix('theme/theme.css', 'control')) }}" type="text/css" />

        <script src="https://cdn.ckeditor.com/4.6.1/full/ckeditor.js"></script>

        <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css"> -->

        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">

        <script>
            window.App = {
                @auth('control') user: { name: '{{ optional(Auth::guard('control')->user())->name }}', email: '{{ optional(Auth::guard('control')->user())->email }}'}, @endauth
            };

            window.staticAsset = function (path) {
                return '{{ asset('{path}') }}'.replace('{path}', path);
            };
        </script>
    </head>
    <body>
        @yield ('content')

        @routes

        @include ('control::layouts.scripts')
    </body>
</html>
