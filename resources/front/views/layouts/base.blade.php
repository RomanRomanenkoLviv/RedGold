<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('front::partials.head')
    <body class="@yield('body-class', '')">
        @include('front::partials.header')

        <main class="@yield('main-class', '')"">
            @yield('main')
        </main>

        @include('front::partials.footer')

        @yield('modals')

        <script src="{{ asset(mix('js/app.js', 'front')) }}"></script>

        @yield('aditional-scripts')
    </body>
</html>
