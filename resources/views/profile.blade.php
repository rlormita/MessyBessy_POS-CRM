@extends('layouts.app')

@section('content')
<div class="messy-profile">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <button onclick="history.back()" class="back-btn">
                    <i class="fas fa-arrow-left"></i>
                </button>
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
                                        <form action="{{ route('profile.upload') }}" class="uploader" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <center>
                                                <div class="account-photo">
                                                    @if (File::exists(public_path("img/uploads/profile_image/
                                                    {{ Auth::user()->profile_image }}" )))
                                                    <img src="{{ asset('img/user/default.jpg') }}">

                                                    @else
                                                    <img  style="margin:0 auto; border-radius: 50%;" src='img/uploads/profile_image/{{ Auth::user()->profile_image }}' />

                                                    @endif
                                                    <label class="editPhoto" for="profile_image">
                                                        <!-- <i class="fas fa-pencil"></i> -->
                                                    </label>


                                                    <h2 class="title"><b>{{ Auth::user()->firstName}} {{ Auth::user()->lastName}}</b></h2>
                                                </div>

                                                <input type="file" name="profile_image" id="profile_image" onchange="form.submit()" hidden />
                                                <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                                <input type="submit" value="Upload" hidden/>
                                            </center>
                                        </form>
                                    </div>
                                    <form action="{{ route('profile.update') }}" method="POST" role="form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="card-header">
                                                <h5 class="title">Profile</h5>
                                            </div>
                                            <div class="form-group">
                                                <label for="firstName">First Name</label>
                                                <input id="firstName" type="text" class="form-control" name="firstName" value="{{ old('firstName', auth()->user()->firstName) }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="firstName">Last Name</label>
                                                <input id="lastName" type="text" class="form-control" name="lastName" value="{{ old('lastName', auth()->user()->lastName) }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email', auth()->user()->email) }}" disabled>
                                            </div>

                                        </div>
                                    </form>

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