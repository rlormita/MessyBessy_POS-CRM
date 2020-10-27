<template>
	<div class="db-modal product-add">
		<div class="db-modal-container">
			<div class="db-modal-card cs-scroll">
				<div class="card-header">
					<div class="card-title">
						Add Employee Account
					</div>
					<div class="card-action">
						<a @click="hideModal" class="close-btn">
							<i class="fas fa-times"></i>
						</a>
					</div>
				</div>
				<form class="card-form" v-on:submit.prevent="createEmployee" method="post">
					<div class="card-body">
						<div class="form-group">
							<input type="text" id="firstName" v-model="employee.firstName" required pattern="\S+.*">
							<label for="firstName">First Name</label>
						</div>
                        <div class="form-group">
                            <input type="text" id="lastName" v-model="employee.lastName" required pattern="\S+.*">
                            <label for="lastName">Last Name</label>
                        </div>
                        <div class="form-group">
                            <input type="email" id="email" v-model="employee.email" required pattern="\S+.*">
                            <label for="email">Email</label>
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" v-model="employee.password" required pattern="\S+.*">
                            <label for="password">Password</label>
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
                employee: {
                	firstName: '',
                    lastName: '',
                    email: '',
                    password: '',
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
            }
        }
    }
</script>