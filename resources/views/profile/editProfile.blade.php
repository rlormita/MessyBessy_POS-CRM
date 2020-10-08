@extends('layouts.app')

@section('content')
<div class="messy-profile">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ url('/profile') }}" class="back-btn">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Profile</h2>
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
                                                @if (File::exists(public_path("img/uploads/profile_image/{{ Auth::user()->profile_image }}" )))
                                                    <img src="{{ asset('img/user/default.jpg') }}">
                                                @else
                                                    <img src="{{ url('img/uploads/profile_image/') }}/{{ Auth::user()->profile_image }}"/>
                                                @endif
                                                <label class="editPhoto" for="profile_image" >
                                                    <i class="fas fa-pencil"></i>
                                                </label>
                                            </div>
                                            <input type="file" name="profile_image" id="profile_image"  onchange="form.submit()" hidden>
                                            <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                            <input type="submit"  value="Upload" hidden/>
                                        </center>
                                     </form>
                                    </div>
                                        <form action="{{ route('profile.update') }}" method="POST" role="form" enctype="multipart/form-data">
                                            @csrf
                                        <div class="card-body">
                                            <div class="card-header">
                                                <h5 class="title">{{Auth::user()->firstName}}'s Profile</h5>
                                            </div>
                                            <div class="form-group">
                                                <label for="firstName">First Name</label>
                                                    <input id="firstName" type="text" class="form-control" name="firstName" value="{{ old('firstName', auth()->user()->firstName) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="firstName">Last Name</label>
                                                    <input id="lastName" type="text" class="form-control" name="lastName" value="{{ old('lastName', auth()->user()->lastName) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email', auth()->user()->email) }}">
                                            </div>

                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password">Password</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control"  value="{{ old('password', auth()->user()->password )}}" disabled>

                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="edit-profile-btn">
                                                    <a class="btn btn-sm btn-primary confirmBtn" data-toggle="modal" data-target="#confirmation">
                                                        {{ __('Update Profile') }}
                                                    </a>
                                                </div>
                                            </div>

<div class="modal fade" id="confirmation" tabindex="-1" role="dialog" aria-labelledby="confirmationLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmationLabel">Confirm changes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="password-confirm">Confirm Password</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <div class="edit-profile-btn card-shadow">
            <button type="submit" class="btn btn-primary">
                {{ __('Save Changes') }}
            </button>
        </div>

      </div>
    </div>
  </div>
</div>
                                        </div>
                                    </form>


                                    <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                                        <div class="card-body">
                                            @csrf
                                            @method('put')

                                            @include('alerts.success', ['key' => 'password_status'])

                                            <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                                <label>Current password</label>
                                                <input type="password" name="old_password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="Current password" value="" required>
                                                @include('alerts.feedback', ['field' => 'old_password'])
                                            </div>

                                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                                <label>New Password</label>
                                                <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="New password" value="" required>
                                                @include('alerts.feedback', ['field' => 'password'])
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm new password</label>
                                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm new password" value="" required>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-fill btn-primary">Change Password</button>
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
    </div>
</div>
@endsection
