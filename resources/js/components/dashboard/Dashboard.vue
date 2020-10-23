<template>
	<main class="main-content">
        <div class="sidebar-wrapper">
			<div class="dashboard-sidebar">
				<div class="sidebar-header">
					<div class="header">
						<a href="/home">
							<div class="header-icon">
								<img src="img/icon.png"/>
							</div>
							<div class="header-title">
								<span>EasyBessy</span>
							</div>
						</a>
					</div>
				</div>
				<div class="sidebar-body">
					<div class="sidebar-item-group">
							<div class="sidebar-item">
								<router-link to="/dashboard" class="nav-link item" tag="a" exact>
									<i class="far fa-chart-line"></i>
									<span>Dashboard</span>
								</router-link>
							</div>
					</div>
					<div class="sidebar-item-group">
						<div class="sidebar-item">
							<router-link to="/dashboard/shop/products" tag="a" class="nav-link item" exact>
								<i class="far fa-shopping-bag"></i>
								<span>Products</span>
							</router-link>
						</div>
						<div class="sidebar-item">
							<router-link to="/dashboard/shop/categories" tag="a" class="nav-link item" exact>
								<i class="far fa-table"></i>
								<span>Categories</span>
							</router-link>
						</div>
					</div>
					<div class="sidebar-item-group">
						<div class="sidebar-item">
							<router-link to="/employee" tag="a" class="nav-link item" exact>
								<i class="far fa-user"></i>
								<span>Employees</span>
							</router-link>
						</div>
					</div>
					<div class="sidebar-item-group">
						<div class="sidebar-item">
							<router-link to="/dashboard/shop/settings" tag="a" class="nav-link item" exact>
								<i class="fas fa-cogs"></i>
								<span>Settings</span>
							</router-link>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="dashboard-main">
			<div class="dashboard-top">
				<div class="account-pane">
				</div>
			</div>
			<div class="dashboard-content">
	        	<router-view></router-view>
	        </div>
	    </div>
    </main>
</template>

<script>
	import DashboardMain from './DashboardMain.vue';
	import DashboardProducts from './DashboardProducts.vue';
	import DashboardCategories from './DashboardCategories.vue';

	export default {
		components: {
			'dashmain': DashboardMain,
			'products': DashboardProducts,
			'categories': DashboardCategories
		},
		data() {
			return {
				reactive: true,
				component: 'dashmain',
			}
		}
	}
</script>