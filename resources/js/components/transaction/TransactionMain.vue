<template>
	<div class="transaction-content">
		<div class="transaction-container">
			<div class="transaction-shop">
				<div class="shop-header">
					<!-- Shop Header -->
					<div class="header-actions header-top">
						<a href="/home" type="a" class="btn search-btn" exact>
							<i class="far fa-home"></i>
							<span>Home</span>
						</a>
					</div>
					<div class="header-title">
						<h3>Messy Products</h3>
						<h5>Store ID: <span id="branch-location">Messy-MOA</span></h5>
					</div>
					<div class="header-actions header-right">
						<button type="button" class="btn search-btn">
							<i class="far fa-search"></i>
							<span>Search</span>
						</button>
						<button type="button" class="btn barcode-btn">
							<i class="far fa-barcode"></i>
							<span>Scan</span>
						</button>
					</div>
				</div>
				<div class="shop-body">
					<!-- List of products -->
					<div class="product-categories row">
						<router-link tag="a" :to="`?cat=${category.id}`" class="category-item col" key="category.id" v-for="category in categories" exact>
							<div class="item-info">
								<div class="item-main-info">
									<h6 class="item-name">
										{{ category.name }}
									</h6>
								</div>
							</div>
						</router-link>
					</div>
					<div class="product-items row">
						<div class="product-item col-4" v-for="product in orderedProducts">
							<div class="item-info">
								<div class="item-main-info">
									<h4 class="item-name">
										{{ product.name }}
									</h4>
									<span class="item-weight">
										240ml
									</span>
								</div>
								<span class="item-price">
									Php {{ product.price }}
								</span>
								<img class="item-image" :src="`img/products/${ product.image }`"/>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="transaction-cart">
				<div class="cart-content">
					<div class="cart-header">
						<h2 class="title">Cart</h2>
					</div>
					<div class="cart-items">
					</div>
					<div class="cart-details">
						<div class="cart-details-content">

						</div>
						<div class="cart-checkout">
							<div class="checkout-type">
								<div class="credit-info">
								</div>
								<div class="credit-type">
									<button type="button">Change</button>
								</div>
							</div>
							<button type="submit">Checkout</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>

    export default {
    	components: {
    	},
        data: function () {
            return {
                categories: [],
                products: [],
                message: '',
                productName: '',
                productDesc: '',
				component: '',
            }
        },
        mounted() {
            this.loadCategories();
            this.loadProducts();
        },
        computed: {
        	orderedProducts: function () {
			    return _.orderBy(this.products, 'name')
			}
        },
        methods: {
            /* launchModal() {
                this.productName = 'Product 1';
                this.productDesc = 'Product Description 1';
                $('#productModal').modal('show');
            }, */
            loadCategories: function() {
                axios.get('/categories')
                    .then((response) => {
                        this.categories = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            loadProducts: function() {
            	this.loader = true;
                axios.get('/products')
                    .then((response) => {
                        this.products = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            
        }
    }

</script>