<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Messy Bessy') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/614c79ec05.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700;900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="messy-transaction">
        <main class="py-4">
            <section class="d-block messy-top-nav card-shadow">
                @yield('navigation')
            </section>
            <div class="messy-transaction-body">
                <section class="col-md-6 d-none messy-account">
                    @yield('accountHeader')
                </section>
                <section class="col-md-6 d-inline messy-store">
                    @yield('store')
                </section>
                <section class="col-md-6 d-inline messy-t">
                    @yield('sidebar')
                </section>
                <section class="col-md-6 d-inline">
                    @yield('cart')
                </section>
                <section class="bottom-nav card-shadow">
                    @yield('b-nav')
                </section>
            </div>
        </main>
    </div>
</body>
</html>
