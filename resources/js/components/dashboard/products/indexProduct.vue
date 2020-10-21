<template>
	<div class="overview-wrapper product-index">
		<div class="overview-content">
			<div class="overview-header">
				<h3 class="overview-header-title">
					<strong>Products</strong> Overview
				</h3>
				<div class="overview-new">
					<button class="new-item" @click="component = 'addProduct'">
						<i class="fas fa-plus"></i>
						<span>New product</span>
					</button>
				</div>
			</div>
			<div class="overview-table">
				<div class="table">
					<div class="row row-header">
						<div class="col">
							<span class="col-title">
								Product
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								<center>Category</center>
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								<center>Price</center>
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								<center>Stock</center>
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								<center>Minimum Stocks</center>
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								<center>Total Sold</center>
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								<center>Image</center>
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								Actions
							</span>
						</div>
					</div>
					<div class="row" v-for="(product, index) in allProducts" :key="allProducts.id">
						<div class="col">
							<span class="col-title">
								<strong>{{ product.name }}</strong>
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								<center>{{ product.product_category_id }}</center>
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								<center>{{ product.price }}</center>
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								<center>{{ product.stock }}</center>
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								<center>{{ product.stock_defective }}</center>
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								<center>{{ product.total_sold }}</center>
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								<center><img :src="`img/products/${ product.image }`"/></center>
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								Actions
							</span>
						</div>
					</div>
				</div>
			</div>
			<component v-bind:is="component" v-on:update:is="component = $event"></component>
		</div>
	</div>
</template>

<script>
	import addProduct from './addProduct.vue';

    export default {
    	components: {
    		'addProduct': addProduct,
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
        	allProducts() {
        		if (this.products.length === 0) {
        			console.log(this.products);
        		} else {
        			return this.products;
        			console.log(this.products);
        		}
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
                        this.categories = response.data;
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