<template>
	<div class="db-modal product-add">
		<div class="db-modal-container">
			<div class="db-modal-card cs-scroll">
				<div class="card-header">
					<div class="card-title">
						Add Product
					</div>
					<div class="card-action">
						<a @click="hideModal" class="close-btn">
							<i class="fas fa-times"></i>
						</a>
					</div>
				</div>
				<form class="card-form" v-on:submit.prevent="createProduct()">
					<div class="card-body">
						<div class="form-group">
							<input type="text" id="name" v-model="product.name" required pattern="\S+.*">
							<label for="name">Name</label>
						</div>
						<div class="form-group">
							<select id="category" v-model="product.category" required pattern="\S+.*">
								<option v-for="category in categories" :value="`${category.id}`">{{ category.name }}</option>
							</select>
							<label for="category">Category</label>
						</div>
						<div class="form-group">
							<input type="text" id="description" v-model="product.description" required pattern="\S+.*">
							<label for="description">Description</label>
						</div>
						<div class="form-group">
							<input type="text" id="stock" v-model="product.stock" required pattern="\S+.*">
							<label for="stock">Stock Count</label>
						</div>
						<div class="form-group">
							<input type="text" id="min_stock" v-model="product.stock_defective" required pattern="\S+.*">
							<label for="min_stock">Defective Stock</label>
						</div>
						<div class="form-group">
							<input type="text" id="price" v-model="product.price" required pattern="\S+.*">
							<label for="price">Price</label>
						</div>
						<div class="form-group">
							<input type="file" id="image" @change="uploadImage"/>
							<label for="image">Upload Image</label>
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
                product: {
                	name: '',
                	category: '',
                	description: '',
                	in_stock: '',
                	min_stock: '',
                	price: '',
                	image: '',
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
                axios.get('/categories')
                    .then((response) => {
                        this.categories = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            createProduct: function() {
            	event.preventDefault();
            	axios.post('/products', {
                    name : 'test',
                    category : '1',
                    description : 'test',
                    in_stock : '1',
                    min_stock : '1',
                    price : '100',
                    })
            		.then((response) => {
            			console.log(response.data);
                        this.$emit('update:is', '')
            		})
            		.catch((response) => {
            			console.log(response.data);
            			alert(response);
            		});
            }
        }
    }
</script>