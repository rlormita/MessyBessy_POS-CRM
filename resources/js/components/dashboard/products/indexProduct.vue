<template>
  <div class="overview-wrapper product-index">
    <div class="overview-content">
      <div class="overview-header">
        <h3 class="overview-header-title">
          <strong>Products</strong> Overview
        </h3>
        <div class="overview-new">
          <button class="new-item" @click="component = 'addProduct'">
            <i class="fas fa-plus"></i>
            <span>New product</span>
          </button>
        </div>
      </div>
      <div class="overview-table">
        <div class="table">
          <div class="row row-header">
            <div class="col">
              <span class="col-title"> Product </span>
            </div>
            <div class="col">
              <span class="col-title">
                <center>Category</center>
              </span>
            </div>
            <div class="col">
              <span class="col-title">
                <center>Price</center>
              </span>
            </div>
            <div class="col">
              <span class="col-title">
                <center>Stock</center>
              </span>
            </div>
            <div class="col">
              <span class="col-title">
                <center>Minimum Stocks</center>
              </span>
            </div>
            <div class="col">
              <span class="col-title">
                <center>Total Sold</center>
              </span>
            </div>
            <div class="col">
              <span class="col-title">
                <center>Image</center>
              </span>
            </div>
            <div class="col">
              <span class="col-title"> Actions </span>
            </div>
          </div>
          <div class="row" v-for="products in product" :key="products.id">
            <div class="col">
              <span class="col-title">
                <strong>{{ products.name }}</strong>
              </span>
            </div>
            <div class="col">
              <span class="col-title" v-for="categories in category" :key="categories.id">
                <center>{{ categories.name }}</center>
              </span>
            </div>
            <div class="col">
              <span class="col-title">
                <center>{{ products.price }}</center>
              </span>
            </div>
            <div class="col">
              <span class="col-title">
                <center>{{ products.in_stock }}</center>
              </span>
            </div>
            <div class="col">
              <span class="col-title">
                <center>{{ products.min_stock }}</center>
              </span>
            </div>
            <div class="col">
              <span class="col-title">
                <center>{{ products.total_sold }}</center>
              </span>
            </div>
            <div class="col">
              <span class="col-title">
                <center><img :src="`img/products/${product.image}`" /></center>
              </span>
            </div>
            <div class="col">
              <span class="col-title"> Actions </span>
            </div>
          </div>
        </div>
      </div>
      <component
        v-bind:is="component"
        v-on:update:is="component = $event"
      ></component>
    </div>
  </div>
</template>

<script>
import addProduct from "./addProduct.vue";

export default {
  components: {
    addProduct: addProduct,
  },
  data() {
    return {
      // categories: [],
      product: {},
      category: {},
      // message: '',
      // productName: '',
      // productDesc: '',
      component: "",
    };
  },
  // mounted() {
  //     this.loadCategories();
  //     this.loadProducts();
  // },
   methods: {
   loadProduct() {
      axios.get("api/product").then(({ data }) => (this.product = data.data));
      console.log(this.product);
    },
    loadCategory() {
      axios.get("api/category").then(({ data }) => (this.category = data.data));
      console.log(this.category);
    },
   },

  created() {
    this.loadProduct();
    this.loadCategory()
  },
};
</script>