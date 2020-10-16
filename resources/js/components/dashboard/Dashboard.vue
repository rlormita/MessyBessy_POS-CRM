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
							<a class="nav-link item active" @click="component = ''">
								<i class="far fa-chart-line"></i>
								<span>Dashboard</span>
							</a>
						</div>
					</div>
					<div class="sidebar-item-group">
						<div class="sidebar-item">
							<a class="nav-link item" @click="component = 'products'">
								<i class="far fa-shopping-bag"></i>
								<span>Products</span>
							</a>
						</div>
						<div class="sidebar-item">
							<a class="nav-link item" @click="component = 'categories'">
								<i class="far fa-table"></i>
								<span>Categories</span>
							</a>
						</div>
					</div>
					<div class="sidebar-item-group">
						<div class="sidebar-item">
							<a class="nav-link item" @click="component = ''">
								<i class="fas fa-cogs"></i>
								<span>Settings</span>
							</a>
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
	        <component v-bind:is="component"></component>
	    </div>
    </main>
</template>

<script>
	import DashboardProducts from './DashboardProducts.vue';
	import DashboardCategories from './DashboardCategories.vue';

	export default {
		components: {
			'products': DashboardProducts,
			'categories': DashboardCategories
		},
		data() {
			return {
				reactive: true,
				component: '',
			}
		}
	}
	$(document).ready(function() {
		$('.nav-link').click(function() {
			if($(this).is('#link-dashboard')) {
				$(this).removeClass('active');
				$('.link-dashboard').addClass('active');
			} else if($(this).is('#link-products')) {
				$(this).removeClass('active');
				$('.link-products').addClass('active');
			} else if($(this).is('#link-categories')) {
				$(this).removeClass('active');
				$('.link-categories').addClass('active');
			} else if($(this).is('#link-settings')) {
				$(this).removeClass('active');
				$('.link-settings').addClass('active');
			}
		});
	});
</script>