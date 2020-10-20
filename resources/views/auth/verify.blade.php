@extends('layouts.app')

@section('content')
<div class="messy-fp">
    <div class="container">
        <div class="messy-header row justify-content-center">
            <div class="col logo-pane d-inline-block">
                <img src="{{ asset('img/icon.png') }}" />
            </div>
            <div class="col account-pane d-inline-block">
                <div class="account-details d-inline-block align-top">
                    <div class="account-name">
                        <h4>{{ Auth::user()->firstName }}</h4>
                    </div>
                    <div class="account-role">
                        <span id="account-role">{{ Auth::user()->user_type }}</span>
                    </div>
                </div>
                <a id="navbarDropdown" class="nav-link dropdown-toggle d-inline-block account-icon" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if (is_null(Auth::user()->profile_image))
                     <img src="{{ asset('img/user/default.jpg') }}">
                    @else
                     <img src="{{ asset('./img/uploads/profile_image/'.Auth::user()->profile_image) }}" />
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                </div>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class='messy-fp-content'>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card messy-verify-card @if (session('resent')) verify-sent @endif">
                    <div class="card-header">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
                        <div class="email-icon">
                            <img src="{{ asset('img/email.svg') }}">
                        </div>
                        <h1>{{ __('Account Successfully Created!') }}</h1>
                        <h4>{{ __('Please verify the email address') }}</h4>
                    </div>

                    <div class="card-body">
                        {{ __('Before proceeding, please check the email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>
                        </form>.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
