<template>
<div class="container">
        <div class="messy-top-nav">
            <div class="messy-t-nav">
                <div class="container">
                    <div class="row">
                        <div class="col col-6 left">
                            <a onclick="history.back()" class="back-btn">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            <h3 class="title">Products</h3>
                        </div>
                        <div class="col col-6 right d-none">
                            <div class="cart-item-count">
                                <span>1</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mid">
                        </div>
                    </div>
                    <div class="row">
                        <div class="messy-nav-pills">
                            <ul class="nav nav-pills nav-justified" role="tablist">
                                <li :class="`nav-item nav-id-${category.id}`" v-for="category in categories">
                                    <a class="nav-link" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true" :href="`#`">
                                        {{ category.name }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="messy-shop active" aria-labelledby="shop" role="tabpanel" id="shop">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="messy-product-item" v-for="product in products">
                            <div class="messy-product-image">
                                <img :src="`/img/products/${product.image}`"/>
                            </div>
                            <div class="messy-product-name">
                                <h4>{{ product.name }}</h4>
                            </div>
                            <div class="messy-product-price">
                                <h4>₱ {{ product.price }}</h4>
                            </div>
                            <a class="messy-product-add card-shadow">
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <messy-cart></messy-cart>
        <messy-scan></messy-scan>
        <messy-trans-botnav></messy-trans-botnav>
    </div>
</template>

<script>
    
    export default {
        data: function () {
            return {
                categories: [],
                products: [],
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