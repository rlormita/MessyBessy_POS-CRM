<template>
</template>


<script>
    export default {
    	props:['name','link','image'],
        data: function () {
            return {
                categories: [],
                products: []
            }
        },
        mounted() {
            this.loadCategories();
            this.loadProducts();
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
            },
            loadProducts: function() {
                axios.get('/api/products')
                    .then((response) => {
                        this.products = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    }
</script>