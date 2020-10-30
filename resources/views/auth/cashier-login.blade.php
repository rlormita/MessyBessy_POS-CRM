@extends('welcome')

@section('content')
<div class="container">
    <section class="welcome-header">
        <div class="header-logo">
            <img src="img/mb_logo.png"/>
            <h3 class="header-title">Welcome</h3>
            <p class="header-subtitle">To start, press below</p>
        </div>
    </section>
    <section class="welcome-login">
        <div class="login-btn">
            <a @click="currentForm = 'LoginForm', routeLink ='routeLink'" class="btn btn-primary card-shadow-hover">
                Login as Cashier
                <i class="far fa-chevron-right"></i>
            </a>
        </div>
        <!-- div class="login-btn">
            <a @click="currentForm = 'RegisterForm'" class="btn btn-primary card-shadow-hover">
                Register
                <i class="far fa-chevron-right"></i>
            </a>
        </div -->
    </section>
    <section class="welcome-form">
        <div class="form @error('email')with-error @enderror @error('password')with-error @enderror">
            <div class="card card-shadow">
                <div class="card-header">
                    <!-- i class="far fa-chevron-left card-nav-back"></i -->
                    <h1 class="header-title">
                        Cashier Login
                    </h1>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('cashier.login.submit') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="form-input @error('email')error @enderror">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="MessyID" autofocus autofill="disable">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-input @error('password')error @enderror">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} hidden>
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>
                        <div class="form-group row">
                            <button type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
