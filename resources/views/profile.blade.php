@extends('layouts.app')

@section('content')
<div class="messy-profile">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ url('/home') }}" class="back-btn">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <div class="card">
                    <div class="card-header">
                        <h2>Profile</h2>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>
                                                        {{ $error }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="messy-account-photo">
                                        <center>
                                            <div class="account-photo">
                                            @if (File::exists(public_path("img/uploads/profile_image/{{ Auth::user()->profile_image }}" )))
                                                <img src="{{ asset('img/user/default.jpg') }}">
                                            @else
                                                <img src="{{ url('img/uploads/profile_image/') }}/{{ Auth::user()->profile_image }}"/>
                                            @endif
                                            </div>
                                            <h2 class="title"><b>{{ Auth::user()->firstName}} {{ Auth::user()->lastName}}</b></h2>
                                        </center>
                                    </div>
                                        
                                    <div class="messy-account-details">
                                        <div class="title">
                                            <h4>Personal Information</h4>
                                        </div>
                                        <div class="form-group">
                                            <label for="firstName">First Name</label>
                                            <span>{{ Auth::user()->firstName}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="firstName">Last Name</label>
                                            <span>{{ Auth::user()->lastName}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <span>{{ Auth::user()->email}}</span>
                                        </div>

                                    </div>

                                    <div class="edit-profile-btn card-shadow">
                                        <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-primary">Update Information</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
