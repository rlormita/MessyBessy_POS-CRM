<template>
	<div class="db-bs-modal product-add">
		<div class="db-modal-container">
			<div class="db-modal-card cs-scroll">
				<div class="card-header">
					<div class="card-title">
						Add Category
					</div>
					<div class="card-action">
						<a @click="hideModal" class="close-btn">
							<i class="fas fa-times"></i>
						</a>
					</div>
				</div>
				<form class="card-form" v-on:submit.prevent="createProduct" method="post">
					<div class="card-body">
						<div class="form-group">
							<input type="text" id="name" v-model="category.name" required pattern="\S+.*">
							<label for="name">Name</label>
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Add</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</template>

<script>

    export default {
        data: function () {
            return {
                categories: [],
                category: {
                	name: '',
                },
                seen: true,
            }
        },
        mounted() {
            this.loadCategories();
        },
        methods: {
            /* launchModal() {
                this.productName = 'Product 1';
                this.productDesc = 'Product Description 1';
                $('#productModal').modal('show');
            }, */
            hideModal(event) {
            	this.$emit('update:is', '')
            },
            uploadImage(event) {
            	console.log(event.target.files);
            },
            loadCategories: function() {
                axios.get('/api/categories')
                    .then((response) => {
                        this.categories = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            createCategory: function() {
            	axios.get('/api/category/create',this.product)
            		.then((response) => {
            			this.product.push(new Product(data));
            			console.log(response.data)
            		})
            		.catch((response) => {
            			this.product = response.data.product;
            			console.log(response.data)
            		});
            }
        }
    }
</script>