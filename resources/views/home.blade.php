@extends('layouts.app')
@section('content')


<div class="messy-fp">
    <div class="container">
        <div class="messy-header row justify-content-center">
            <div class="col logo-pane d-inline-block">
                <img src="{{ asset('img/icon.png') }}"/>
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
                <div id="navbarDropdown" class="nav-link dropdown-toggle d-inline-block account-icon" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <img src="{{ asset('img/user/default.jpg') }}"/>
                </div>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('/profile') }}">
                        {{ __('Profile') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

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
                    <img src="{{ asset('sprites/cart.svg') }}"/>
                    <h3>Transaction</h3>
                </a>
                <a href="{{ url('/products') }}" class="col messy-nav-item">
                    <img src="{{ asset('sprites/inventory.svg') }}"/>
                    <h3>Inventory</h3>
                </a>
            </div>
            <div class="row">
                <a href="{{ url('/dashboard') }}" class="col messy-nav-item">
                    <img src="{{ asset('sprites/dashboard.svg') }}"/>
                    <h3>Dashboard</h3>
                </a>
                <a href="{{ url('/settings') }}" class="col messy-nav-item">
                    <img src="{{ asset('sprites/settings.svg') }}"/>
                    <h3>Settings</h3>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Edit ni Janjan -->
<div class="row">
    <div class="col-3">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-products" role="tab" aria-controls="v-pills-home" aria-selected="true">Products</a>
            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
        </div>
    </div>
    <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-products" role="tabpanel" aria-labelledby="v-pills-home-tab">Products</div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">Profile</div>
            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">Messages</div>
            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">Settings</div>
        </div>
    </div>
</div>
@endsection