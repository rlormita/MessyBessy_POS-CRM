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
        <div class="messy-shop" aria-labelledby="shop" role="tabpanel" id="shop">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="messy-product-item" v-for="(product, index) in products">
                            <div class="messy-product-image">
                                <img :src="`/img/products/${product.image}`"/>
                            </div>
                            <div class="messy-product-name">
                                <h4>{{ product.name }}</h4>
                            </div>
                            <div class="messy-product-price">
                                <h4>₱ {{ product.price }}</h4>
                            </div>
                            <div class="messy-product-index" hidden="hidden">
                                <h4>{{ index }}</h4>
                            </div>
                            <a class="messy-product-add card-shadow" data-toggle="modal" :data-target="`#productModal-${product.id}`">
                                <i class="fas fa-plus"></i>
                            </a>
                            <div class="productModal">
                                <div class="modal card-shadow fade" :id="`productModal-${product.id}`" tabindex="-1" role="dialog">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-body">
                                        <div class="modal-actions row">
                                            <div class="col-6">
                                                <a data-dismiss="modal">
                                                    <i class="fas fa-chevron-left"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="modal-image">
                                            <img :src="`/img/products/${product.image}`"/>
                                        </div>
                                        <div class="modal-details">
                                            <h4 class="product-title">
                                                {{ product.name }}
                                            </h4>
                                            <h4 class="product-price">
                                                Php {{ product.price }}
                                            </h4>
                                            <div class="product-size">
                                                <h6>Size</h6>
                                                <div class="size-group">
                                                    <input type="radio" :id="`${product.id}-2L`" name="product-size" value="2L" hidden checked/>
                                                    <label :for="`${product.id}-2L`" class="sizeSelect">2L</label>
                                                </div>
                                                <div class="size-group">
                                                    <input type="radio" :id="`${product.id}-500mL`" name="product-size" value="500mL" hidden/>
                                                    <label :for="`${product.id}-500mL`" class="sizeSelect">500mL</label>
                                                </div>
                                            </div>
                                            <p>{{ product.description }}</p>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <a class="addCart-btn btn btn-primary" data-dismiss="modal"><span>Add to Cart</span></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
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
                message: '',
                productName: '',
                productDesc: ''
            }
        },
        mounted() {
            this.loadCategories();
            this.loadProducts();
        },
        methods: {
            /* launchModal() {
                this.productName = 'Product 1';
                this.productDesc = 'Product Description 1';
                $('#productModal').modal('show');
            }, */
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