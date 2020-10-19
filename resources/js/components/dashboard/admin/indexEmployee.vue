<template>
	<div class="overview-wrapper product-index">
		<div class="overview-content">
			<div class="overview-header">
				<h3 class="overview-header-title">
					<strong>Manage</strong> Employees
				</h3>
				<div class="overview-new">
					<button class="new-item" @click="component = 'addEmployee'">
						<i class="fas fa-plus"></i>
						<span>New Employee</span>
					</button>
				</div>
			</div>
			<div class="overview-table">
				<div class="table">
					<div class="row row-header">
						<div class="col">
							<span class="col-title">
								Profile Photo
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								Last Name
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								First Name
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								Email
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								Last Login
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								Actions
							</span>
						</div>
					</div>
					<div class="row" v-for="(user, index) in user" :key="user.id">
						<div class="col">
							<span class="col-title">
								<img :src="`img/uploads/profile_image/${ user.image }`" style="border-radius: 50px;" />
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								<strong>{{ user.lastName }}</strong>
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								<strong>{{ user.firstName }}</strong>
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								<strong>{{ user.email }}</strong>
							</span>
						</div>
						<div class="col">
							<span class="col-title">
								<strong>{{ user.last_log }}</strong>
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
	import addEmployee from './addEmployee.vue';

    export default {
    	components: {
    		'addEmployee': addEmployee,
    	},
        data: function () {
            return {
				component: '',
				user: []
            }
        },
        mounted() {
            this.loadEmployees();
        },
        methods: {
            /* launchModal() {
                this.productName = 'Product 1';
                this.productDesc = 'Product Description 1';
                $('#productModal').modal('show');
            }, */
            loadEmployees: function() {
                axios.get('/employees')
                    .then((response) => {
                        this.user = response.data.data;
                        console.log(this.user);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
            
        }
    }

</script>