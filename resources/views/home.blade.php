@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            <div class="product">
            <a href="{{ url('/products') }}" class="text-sm text-gray-700 underline">Product</a>
            <a href="{{ url('/categories') }}" class="text-sm text-gray-700 underline">Categories</a>
            </div>
        </div>
    </div>
</div>
@endsection
