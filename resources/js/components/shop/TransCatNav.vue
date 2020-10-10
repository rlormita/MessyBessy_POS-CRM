<template>
	
</template>

<script>

    export default {
        data: function () {
            return {
                categories: []
            }
        },
        mounted() {
            this.loadCategories();
        },
        methods: {
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