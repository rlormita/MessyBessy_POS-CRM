@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Profile</div><br>
                    <div class="col-md-12 text-right">
                        <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-primary">Edit</a>
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


                                      <form action="{{ route('profile.upload') }}" class="uploader" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <center>
                                            @if (File::exists(public_path("img/uploads/profile_image/{{ Auth::user()->profile_image }}" )))
                                                <img src='img/user/default.jpg'><br>
                                            @else
                                                <img src='img/uploads/profile_image/{{ Auth::user()->profile_image }}' style="width:150px; height:150px; float:left border-radius:50%; margin:25px"/><br>
                                            @endif
                                            <h2 class="title">{{ Auth::user()->firstName}} {{ Auth::user()->lastName}}</h2>
                                            {{-- <label for="updateProfile">Update Profile Image</label><br>
                                            <input type="file"   name="profile_image">
                                            <input type="hidden"  name="_token" value="{{ csrf_token()}}">
                                            <input type="submit"  value="Upload"/> --}}
                                        </center>
                                     </form>
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
                                                    <input id="lastName" type="text" class="form-control" name="lastName" value="{{ old('lastName', auth()->user()->lastName) }}"  disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email', auth()->user()->email) }}" disabled>
                                            </div>

                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection