@extends('transactions\main')

@section('navigation')
<div class="container">
	<div class="messy-t-nav row">
		<div class="col left">
			<button onclick="history.back()" class="back-btn">
				<i class="fas fa-chevron-left"></i>
			</button>
		</div>
		<div class="col mid">
			<h3 class="title">Products</h3>
		</div>
		<div class="col right">
			<div class="cart-item-count">
				<span>1</span>
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
				<img src="{{ asset('img/user/eunace_rocamora.jpg') }}"/>
			</div>
			<div class="account-details d-inline-block align-top">
				<h5>Welcome</h5>
				<div class="account-name logged-in">
					<h4>{{ Auth::user()->firstName }}</h4>
				</div>
			</div>
            <a id="navbarDropdown" class="nav-link dropdown-toggle d-inline-block" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre></a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        @endguest
	</div>
</div>

@endsection

@section('store')
<div class="container">
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
	<div class="messy-t-total">
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
		<ul class="nav navbar-nav row">
			<li class="col active">
				<a href="#">
					<img src="{{ asset('sprites/cart.svg') }}"/>
					<span>Transaction</span>
				</a>
			</li>
			<li class="col">
				<a href="#">
					<img src="{{ asset('sprites/inventory.svg') }}"/>
					<span>Inventory</span>
				</a>
			</li>
			<li class="col">
				<a href="#">
					<img src="{{ asset('sprites/dashboard.svg') }}"/>
					<span>Dashboard</span>
				</a>
			</li>
			<li class="col">
				<a href="#">
					<img src="{{ asset('sprites/settings.svg') }}"/>
					<span>Settings</span>
				</a>
			</li>
		</ul>
	</nav>
</div>
@endsection