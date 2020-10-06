@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card messy-login-card">
                <div class="card-header messy-login-header">
                   <img src="{{ asset('img/mb_logo.png') }}" class="messy-logo"/>                     
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row label">
                            <label for="lastName" class="col-form-label text-md-right">{{ __('First Name') }}</label>
                        </div>
                        <div class="form-group row">
                            <div class="form-input">
                                <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row label">
                            <label for="lastName" class="col-form-label text-md-right">{{ __('Last Name') }}</label>
                        </div>
                        <div class="form-group row">
                            <div class="form-input">
                                <input id="lastName" type="text" class="form-control @error('lasttName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>

                                @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row label">
                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                        </div>
                        <div class="form-group row">
                            <div class="form-input">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row label">
                            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                        </div>
                        <div class="form-group row">
                            <div class="form-input">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row label">
                            <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                        </div>
                        <div class="form-group row">
                            <div class="form-input">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row terms {{ $errors->has('terms') ? ' has-error' : '' }}">
                                <input type="checkbox" name="terms" value="true" id="terms-checkbox" {{ !old('terms') ?: 'checked' }}>
                                <label for="terms-checkbox">I understand and agree to the <a href='https://www.facebook.com/messybessycleaners'>Terms & Conditions </a> and <a href='https://www.facebook.com/messybessycleaners'> Privacy Policy </a>.</label>
                            </div>
                            <input type="checkbox" id="terms-checkbox" name="terms" value="true"><label for="terms-checkbox">I understand and agree to the <a href='https://www.facebook.com/messybessycleaners'>Terms & Conditions</a> and Privacy Policy</label>
                        </div>


                        <div class="col-md-4 offset-md-2">
                            @if ($errors->has('terms'))
                            <span class="help-block">
                                <strong>{{ $errors->first('terms') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="col-md-4 offset-md-2">
                            @if ($errors->has('terms'))
                            <span class="help-block">
                                <strong>{{ $errors->first('terms') }}</strong>
                            </span>
                            @endif
                        </div>

                            <div class="col-md-4 offset-md-2">
                                @if ($errors->has('terms'))
                                 <span class="help-block">
                                   <strong>{{ $errors->first('terms') }}</strong>
                                 </span>
                                @endif
                              </div>

                        </div>

                        <div class="form-group submit row mb-0">
                            <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
