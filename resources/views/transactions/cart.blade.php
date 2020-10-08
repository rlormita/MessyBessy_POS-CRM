@extends('transactions\main')

@section('cart')
<div class="messy-cart">
	<div class="container">
		{{ Auth::user()->firstName }}
	</div>
</div>

@endsection