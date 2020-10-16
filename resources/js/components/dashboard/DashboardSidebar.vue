<template>
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
						<a class="nav-link item active" @click="component = ''" id="link-dashboard">
							<i class="far fa-chart-line"></i>
							<span>Dashboard</span>
						</a>
					</div>
				</div>
				<div class="sidebar-item-group">
					<div class="sidebar-item">
						<a class="nav-link item" @click="component = products" id="link-products">
							<i class="far fa-shopping-bag"></i>
							<span>Products</span>
						</a>
					</div>
					<div class="sidebar-item">
						<a class="nav-link item" @click="component = categories" id="link-categories">
							<i class="far fa-table"></i>
							<span>Categories</span>
						</a>
					</div>
				</div>
				<div class="sidebar-item-group">
					<div class="sidebar-item">
						<a class="nav-link item" @click="component = ''" id="link-settings">
							<i class="fas fa-cogs"></i>
							<span>Settings</span>
						</a>
					</div>
				</div>
			</div>
		</div>		
	</div>
</template>

<script>
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