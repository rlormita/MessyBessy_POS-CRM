<template>
	<div class="overview-wrapper product-index">
		<div class="overview-content">
			<div class="overview-header">
				<h3 class="overview-header-title">
					<strong>Categories</strong> Overview
				</h3>
				<div class="overview-new">
					<button class="new-item" @click="component = 'addCategory'">
						<i class="fas fa-plus"></i>
						<span>New Category</span>
					</button>
				</div>
			</div>
			<div class="overview-table">
				<div class="table">
					<div class="row row-header">
						<div class="col">
							<span class="col-title">
								Name
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								Product Count
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								Stock Count
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								Defective Stock Count
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								Product Average Price
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								Actions
							</span>
						</div>
					</div>
					<div class="row categoriesList" v-for="(category, index) in listCategories" key="category.id">
						<div class="col">
							<span class="col-title">
								{{ category.name }}
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								{{ category.product_count }}
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								{{ category.total_stock }}
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								{{ category.defective_stock }}
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								{{ category.ave_price }}
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
	import addCategory from './addCategory.vue';

    export default {
    	components: {
    		'addCategory': addCategory,
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
        },
        computed: {
        	listCategories() {
        		if (this.categories.length === 0) {
        			$('.categoriesList').addClass("error");
        		} else {
        			return this.categories;
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
                        this.categories = response.data.data;
                    })
                    .catch(function (error) {
                    });
            }
        }
    }
</script>