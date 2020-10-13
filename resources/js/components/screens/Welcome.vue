<template>
    
</template>

<script>
	import LoginForm from '../auth/LoginForm.vue'
	import RegisterForm from '../auth/RegisterForm.vue'

	export default {
		data() {
			return {
				currentForm: LoginForm,
			}
		},
		props: [
			{
				name: 'routeLink',
			}
		],
		components: {
			'LoginForm': LoginForm,
			'RegisterForm': RegisterForm
		}
	}

	$(document).ready(function() {
		$('.login-btn a').on('click', function() {
			$('.welcome-form .form').addClass('show');
		});
	});
</script>