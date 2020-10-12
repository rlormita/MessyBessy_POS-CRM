<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Messy Bessy POS</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>

    <script src="{{ mix('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <main class="py-4 main-content">
            <div class="container">
                <section class="welcome-header">
                    <div class="header-logo">
                        <img src="{{ asset('img/mb_logo.png') }}"/>
                        <h3 class="header-title">Welcome</h3>
                        <p class="header-subtitle">To start, press below</p>
                    </div>
                </section>
                <section class="welcome-login">
                    <div class="login-btn">
                        <a href="{{ route('login') }}" class="btn btn-primary card-shadow-hover">
                            Login
                            <i class="far fa-chevron-right"></i>
                        </a>
                    </div>
                    <div class="login-btn">
                        <a href="{{ route('register') }}" class="btn btn-primary card-shadow-hover">
                            Register
                            <i class="far fa-chevron-right"></i>
                        </a>
                    </div>
                </section>
            </div>
        </main>
    </div>

</body>
</html>