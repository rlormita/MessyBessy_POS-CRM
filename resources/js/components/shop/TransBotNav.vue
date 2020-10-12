<template>
	<div class="bottom-nav">
		<div class="container">
			<nav class="navigation">
				<ul class="nav nav-pills nav-justified" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="pill" href="#shop" role="tab" aria-controls="" aria-selected="true">
							<img :src="`sprites/grid-orange.svg`"/>
							<span>Shop</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="pill" href="#scan" role="tab" aria-controls="" aria-selected="true">
							<img :src="`sprites/barcode-orange.svg`"/>
							<span>Scan</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link nav-link-cart" data-toggle="pill" href="#cart" role="tab" aria-controls="cart" aria-selected="true">
							<img :src="`sprites/cart-filled-orange.svg`"/>
							<span>Cart</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</template>