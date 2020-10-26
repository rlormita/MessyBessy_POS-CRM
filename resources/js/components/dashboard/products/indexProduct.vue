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
              <!-- v-for="categories in category" :key="categories.id" -->
              <span class="col-title">
                <center>{{ products.product_category_id }}</center>
              </span>
            </div>
            <div class="col">
              <span class="col-title">
                <center>{{ products.price }}</center>
              </span>
            </div>
            <div class="col">
              <span class="col-title">
                <center>{{ products.stock_qty }}</center>
              </span>
            </div>
            <div class="col">
              <span class="col-title">
                <center>{{ products.minimum_stock }}</center>
              </span>
            </div>
            <div class="col">
              <span class="col-title">
                <center>{{ products.total_sold }}</center>
              </span>
            </div>
            <div class="col">
              <span class="col-title">
                <center>
                  <img v-bind:src="'/img/products/' + products.image" />
                </center>
              </span>
            </div>
            <div class="col">
              <span class="col-title">
                <a
                  href="#"
                  class="btn btn-link"
                  data-toggle="tooltip"
                  data-placement="bottom"
                  title="More Details"
                >
                  <i class="far fa-eye"></i>
                </a>
              </span>
              <span class="col-title">
                <a
                  href="#"
                  class="btn btn-link"
                  data-toggle="tooltip"
                  data-placement="bottom"
                  title="Edit Product"
                >
                  <i class="far fa-edit"></i>
                </a>
              </span>
              <span class="col-title">
                <form action="#" method="post" class="d-inline">
                  <!-- @csrf
                                @method('delete') -->
                  <a
                    @click="deleteProduct(products.id)"
                    class="btn btn-link"
                    data-toggle="tooltip"
                    data-placement="bottom"
                    title="Delete Product"
                  >
                    <i class="far fa-trash-alt"></i>
                  </a>
                </form>
              </span>
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
import CodeScanVue from "../../shop/CodeScan.vue";
import addProduct from "./addProduct.vue";

export default {
  components: {
    addProduct: addProduct,
  },
  data() {
    return {
      // categories: [],
      product: {
        id: "",
      },
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
    deleteProduct(id) {
         Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        axios.delete("api/products/" + id).then(() => {
          Swal.fire("Deleted!", "Your file has been deleted.", "success");
        }).catch(()=>{
          Swal.fire("Failed!", "There was something wrong.", "warning");
        });
      });
    },
  },

  created() {
    this.loadProduct();
    setInterval(() => {
      this.loadProduct();
    }, 3000);
    this.loadCategory();
  },
};
</script>