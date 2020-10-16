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
								Category
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								Product
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								Price
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								Stock
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								Minimum Stocks
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								Total Sold
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								Image
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								Actions
							</span>
						</div>
					</div>
					<div class="row" v-for="(product, index) in products" :key="product.id">
						<div class="col">
							<span class="col-title">
								{{ product.category }}
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								{{ product.name }}
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								{{ product.price }}
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								{{ product.stock_count }}
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								{{ product.min_stock }}
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								{{ product.total_sold }}
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								<img :src="`img/products/${ product.image }`"/>
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
        methods: {
            /* launchModal() {
                this.productName = 'Product 1';
                this.productDesc = 'Product Description 1';
                $('#productModal').modal('show');
            }, */
            loadCategories: function() {
                axios.get('/api/categories')
                    .then((response) => {
                        this.categories = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            loadProducts: function() {
                axios.get('/api/products')
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