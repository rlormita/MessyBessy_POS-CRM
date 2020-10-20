<template>
	<div class="dashboard-content">
		<div class="dashboard-container">
			@{{ message }}
			<router-link to="/dashboard/shop/products">test</router-link>
		</div>
	</div>
</template>

<script>
export default {
  data () {
    return {
      message: 'This is the home component!'
    };
  }
};
</script>