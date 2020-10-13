<template>
    
</template>

<script>
	export default {
        name: 'LoginForm',
        props: ['actionLink']
	}
	$(document).ready(function(){
		$('.card-nav-back').on('click', function() {
			console.log('test');
		});
	});
</script>