@extends('transactions\main', ['page' => 'List of Products', 'pageSlug' => 'products', 'section' => 'inventory'])

@section('navigation')
<div class="container">
	<div class="messy-t-nav">
		<div class="row">
			<div class="col col-6 left">
				<a onclick="history.back()" class="back-btn">
					<i class="fas fa-arrow-left"></i>
				</a>
				<h3 class="title">Products</h3>
			</div>
			<div class="col col-6 right d-none">
				<div class="cart-item-count">
					<span>1</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col mid">
			</div>
		</div>
		<div class="row">
			<div class="messy-nav-pills">
				<ul class="nav nav-pills nav-justified" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true" href="#babycare">Baby Care</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true" href="#bathandbody">Bath & Body</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true" href="#homecare">Home Care</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true" href="#menscare">Men's Care</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection

@section('accountHeader')
<div class="container">
	<div class="messy-account-header">
		<i class="fas fa-arrow-left"></i>
		@guest
		@else
		<div class="messy-account-details card-shadow">
			<div class="account-photo d-inline-block align-top">
				<a id="navbarDropdown" data-toggle="profileDropdown" aria-haspopup="true" aria-expanded="false">
	                @if (File::exists(public_path("img/uploads/profile_image/{{ Auth::user()->profile_image }}")))
		                <img src='img/user/default.jpg'>
		            @else
		                <img src="{{ url('img/uploads/profile_image') }}/{{ Auth::user()->profile_image }}'"/>
		            @endif
		        </a>

			</div>
			<div class="account-details d-inline-block align-top">
				<h5>Welcome</h5>
				<div class="account-name logged-in">
					<h4>{{ Auth::user()->firstName }}</h4>
				</div>
			</div>

			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
			    <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
			    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                     <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                	</a>
                </form>
		  	</div>
        @endguest
	</div>
</div>

@endsection

@section('store')
<div class="container">
	<div class="messy-products-list">
		<div class="tab-content">
			<div class="tab-pane fade show active" id="babycare" role="tabpanel" aria-labelledby="babycare-tab">
				<div class="row">
				@foreach ($products as $product)
					<div class="col-md-6">
						<div class="messy-product-item">
							<div class="messy-product-image">
								<img src="{{ url('img/products') }}/{{ ($product->image) }}"/>
							</div>
							<div class="messy-product-name">
								<h4>{{ $product->name }}</h4>
							</div>
							<div class="messy-product-price">
								<h4>₱{{ $product->price }}</h4>
							</div>
							<a class="messy-product-add card-shadow">
								<i class="fas fa-plus"></i>
							</a>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="tab-pane fade" id="bathandbody" role="tabpanel" aria-labelledby="bathandbody-tab">
				<div class="row">
				@foreach ($products as $product)
					<div class="col-3">
						<div class="messy-product-item">
							<div class="messy-product-image">
								<img src="{{ url('img/products') }}/{{ ($product->image) }}"/>
							</div>
							<div class="messy-product-name">
								<h4>{{ $product->name }}</h4>
							</div>
							<div class="messy-product-price">
								<h4>₱{{ $product->price }}</h4>
							</div>
							<a class="messy-product-add card-shadow">
								<i class="fas fa-plus"></i>
							</a>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="tab-pane fade" id="homecare" role="tabpanel" aria-labelledby="homecare-tab">
				<div class="row">
				@foreach ($products as $product)
					<div class="col-3">
						<div class="messy-product-item">
							<div class="messy-product-image">
								<img src="{{ url('img/products') }}/{{ ($product->image) }}"/>
							</div>
							<div class="messy-product-name">
								<h4>{{ $product->name }}</h4>
							</div>
							<div class="messy-product-price">
								<h4>₱{{ $product->price }}</h4>
							</div>
							<a class="messy-product-add card-shadow">
								<i class="fas fa-plus"></i>
							</a>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="tab-pane fade" id="menscare" role="tabpanel" aria-labelledby="menscare-tab">
				<div class="row">
				@foreach ($products as $product)
					<div class="col-sm-8">
						<div class="messy-product-item">
							<div class="messy-product-image">
								<img src="{{ url('img/products') }}/{{ ($product->image) }}"/>
							</div>
							<div class="messy-product-name">
								<h4>{{ $product->name }}</h4>
							</div>
							<div class="messy-product-price">
								<h4>₱{{ $product->price }}</h4>
							</div>
							<a class="messy-product-add card-shadow">
								<i class="fas fa-plus"></i>
							</a>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('sidebar')
<div class="container">
	<div class="messy-t-barcode">
		<div class="barcode-number">
			<input type="text" class="d-inline-block" placeholder="84701764619376" maxlength="12"  autofocus>
			<div class="barcode-icon d-inline-block">
				<img src="{{ asset('img/barcode.svg') }}"/>
			</div>
		</div>
	</div>
	<div class="messy-t-cart bg-white">
		<div class="messy-t-cart-header">
			<h1>Cart</h1>
		</div>
		<div class="messy-t-cart-items">
			<div class="messy-cart-item">
				<div class="item-photo d-inline-block align-top">
					<img src="{{ asset('img/products/shampoo.jpg') }}"/>
				</div>
				<div class="item-details d-inline-block align-top">
					<div class="item-name">
						<h3>Men's shampoo</h3>
					</div>
					<div class="item-stock-count">
						Stock: <span id="item-count">72</span>
					</div>
				</div>
				<div class="item-actions-price d-inline-block align-top">
					<div class="item-price">
						Php <span id="item-price">70.00</span>
					</div>
					<div class="item-actions">
					</div>
				</div>
			</div>
		</div>
		<div class="messy-t-cart-footer">
			<div class="total">
				<div class="total-title d-inline-block">
					<h4>total</h4>
				</div>
				<div class="total-price d-inline-block">
					Php <span id="total-price">70.00</span>
				</div>
			</div>
			<div class="checkout">
				<button>Checkout</button>
			</div>
		</div>
	</div>
	<div class="messy-t-total d-none">
		<div class="total">
				<div class="total-title">
					<h5>total</h5>
				</div>
				<div class="total-price">
					Php <span id="total-price">70.00</span>
				</div>
			</div>
	</div>
</div>
@endsection

@section('cart')
<div class="messy-cart active d-none">
	<script>
	$(document).ready(function(){
		$(".messy-cart-header .back-icon").on('click', function(e) {
	  		$(".messy-cart").toggleClass("active");
		});
	});
	</script>
	<div class="container">
		<div class="messy-cart-header row">
			<div class="col">
				<div class="back-icon">
					<i class="fas fa-chevron-left"></i>
				</div>
			</div>
			<div class="col">
				<h1>{{ __('Cart') }}</h1>
			</div>
			<div class="col">
			</div>
		</div>
		<div class="messy-cart-body">
			<div class="messy-cart-item">
				<div class="item-photo">
					<img src="{{ asset('img/products/shampoo.png') }}"/>
				</div>
				<div class="item-details">
					<div class="item-detail-name">
						<span id="item-name">Men's Shampoo</span>
						<span id="item-stock">72</span>
					</div>
					<div class="item-detail-cat">
					</div>
				</div>
				<div class="item-actions">
					<div class="item-detail-price">
						Php <span id="item-price">70.00</span>
					</div>
				</div>
			</div>
			<div class="messy-cart-item">
				<div class="item-photo">
					<img src="{{ asset('img/products/shampoo.png') }}"/>
				</div>
				<div class="item-details">
					<div class="item-detail-name">
						<span id="item-name">Men's Shampoo</span>
						<span id="item-stock">72</span>
					</div>
					<div class="item-detail-cat">
					</div>
				</div>
				<div class="item-actions">
					<div class="item-detail-price">
						Php <span id="item-price">70.00</span>
					</div>
				</div>
			</div>
		</div>
		<div class="messy-cart-footer">
			<div class="messy-cart-footer-details">
				<h2></h2>
			</div>
			<div class="messy-cart-footer-checkout">
				<button class="card-shadow">Checkout</button>
			</div>
		</div>
	</div>
</div>
@endsection

@section('b-nav')
<div class="container">
	<nav class="navigation">
		<ul class="nav nav-pills nav-justified" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="pill" href="#" role="tab" aria-controls="" aria-selected="true">
					<img src="{{ asset('sprites/grid-orange.svg') }}"/>
					<span>Shop</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="pill" href="#" role="tab" aria-controls="" aria-selected="true">
					<img src="{{ asset('sprites/barcode-orange.svg') }}"/>
					<span>Scan</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="pill" href="#" role="tab" aria-controls="" aria-selected="true">
					<img src="{{ asset('sprites/cart-filled-orange.svg') }}"/>
					<span>Cart</span>
				</a>
			</li>
		</ul>
	</nav>
</div>
@endsection
