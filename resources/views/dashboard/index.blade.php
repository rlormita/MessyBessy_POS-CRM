@extends('layouts.app')
@section('content')

<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar" class="active">
        <h1 style="text-align:center"><a href="{{url('/profile')}}" class="logo">
                @if (File::exists(public_path("img/uploads/profile_image/{{ Auth::user()->profile_image }}")))
                <img style="width: 50%; border-radius:50%" src="{{ asset('img/user/default.jpg') }}">
                @else
                <img style="width: 50%; border-radius:50%;" src="{{ url('img/uploads/profile_image/') }}/{{ Auth::user()->profile_image }}" />
                @endif
            </a></h1>
        <h4 class="userName" style="text-align: center; ">{{ Auth::user()->firstName }}
        {{ Auth::user()->lastName }}</h4>
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
</div>

@endsection