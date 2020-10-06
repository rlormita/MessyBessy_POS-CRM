@extends('transactions.main')

@section('accountHeader')
<div class="container messy-account">
	<div class="messy-account-header">
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

@section('sidebar')
<div class="container messy-t">
	<div class="messy-t-barcode">
		<div class="barcode-number">
			<span class="d-inline-block">84701764619376</span>
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
