<!doctype html>
<html lang="en">
    @include('front::partials.head')
    <body class="@yield('body-class', '')">
        @yield('main')
    </body>
</html>
