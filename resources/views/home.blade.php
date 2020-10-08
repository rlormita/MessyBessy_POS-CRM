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


<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar" class="active">
        <h1><a href="{{url('/profile')}}" class="logo">
                @if (File::exists(public_path("img/uploads/profile_image/{{ Auth::user()->profile_image }}")))
                <img style="width: 50%; border-radius:50%" src='img/user/default.jpg'>
                @else
                <img style="width: 50%; border-radius:50%" src='img/uploads/profile_image/{{ Auth::user()->profile_image }}' />
                @endif
            </a></h1>
        <h4>{{ Auth::user()->firstName }}</h4>
        <ul class="list-unstyled components mb-5">
            <li class="active">
                <a href="{{ url('/products') }}">Products</a>
            </li>
            <li>
                <a href="{{ url('/categories') }}">Categories</a>
            </li>
        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{url('/home')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <a class="nav-link" href="{{ url('/profile') }}">
                            {{ __('Profile') }}
                        </a>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>
        <h2 class="mb-4">Content</h2>
    </div>

    @endsection