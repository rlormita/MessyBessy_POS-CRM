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
                        <span id="account-role">Admin</span>
                    </div>
                </div>
                <a id="navbarDropdown" class="nav-link dropdown-toggle d-inline-block account-icon" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if (File::exists(public_path("img/uploads/profile_image/{{ Auth::user()->profile_image }}")))
                    <img src="{{ url('img/uploads/profile_image/') }}/{{ Auth::user()->profile_image }}" />
                @else
                    <img src="{{ asset('img/user/default.jpg') }}">
                @endif
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('profile') }}">
                        {{ __('Profile') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
<div class="messy-fp-content">
    <div class="container">
        <div class="messy-branch">
            <div class="messy-branch-title">
                <h3>Messy Bessy</h3>
                <span id="branch-name">Mall of Asia</span>
            </div>
        </div>
        <div class="messy-navigation">
            <div class="row">
                <a href="{{ url('/transactions') }}" class="col messy-nav-item">
                    <img src="{{ asset('sprites/cart.svg') }}" />
                    <h3>Transaction</h3>
                </a>
                <a href="{{ url('/products') }}" class="col messy-nav-item">
                    <img src="{{ asset('sprites/inventory.svg') }}" />
                    <h3>Inventory</h3>
                </a>
            </div>
            <div class="row">
                <a href="{{ url('/dashboard') }}" class="col messy-nav-item">
                    <img src="{{ asset('sprites/dashboard.svg') }}" />
                    <h3>Dashboard</h3>
                </a>
                <a href="{{ url('/settings') }}" class="col messy-nav-item">
                    <img src="{{ asset('sprites/settings.svg') }}" />
                    <h3>Settings</h3>
                </a>
            </div>
        </div>
        <a class="dropdown-item" href="{{ route('profile') }}">
            {{ __('Profile') }}
        </a>
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
    </div>
</div>
@endsection