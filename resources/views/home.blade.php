@extends('layouts.app')
@section('content')
<!-- 
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                
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
                    @if (File::exists(public_path("img/uploads/profile_image/{{ Auth::user()->profile_image }}")))
                    <img src='img/user/default.jpg'>
                @else
                    <img src='img/uploads/profile_image/{{ Auth::user()->profile_image }}'/>
                @endif

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


            <div class="product">
                <a href="{{ url('/products') }}" class="text-sm text-gray-700 underline">Product</a>
                <a href="{{ url('/categories') }}" class="text-sm text-gray-700 underline">Categories</a>
                <a href="{{ url('/transactions') }}" class="text-sm text-gray-700 underline">Transactions</a>


        </div>
    </div>
</div> -->
<!--
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
</div> -->

<!-- @include('layouts.sidebar') -->
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->

        <!-- Notifications Dropdown Menu
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        -->
        <li class="nav-item">
            <a class="dropdown-item" href="{{ url('/profile') }}">
                {{ __('Profile') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
</div>
</div>
</div>
</div>

@endsection