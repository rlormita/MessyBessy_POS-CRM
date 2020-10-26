<template>
  <div class="db-modal product-add">
    <div class="db-modal-container">
      <div class="db-modal-card cs-scroll">
        <div class="card-header">
          <div class="card-title">Add Product</div>
          <div class="card-action">
            <a @click="hideModal" class="close-btn">
              <i class="fas fa-times"></i>
            </a>
          </div>
        </div>
        <form enctype="multipart/form-data" class="card-form" v-on:submit.prevent="createProduct()">
          <div class="card-body">
            <div class="form-group">
              <input
                type="text"
                id="name"
                v-model="product.name"
                required
                pattern="\S+.*"
              />
              <label for="name">Name</label>
            </div>
            <div class="form-group">
              <select id="category"  v-model="product.product_category_id" required pattern="\S+.*">
                <option v-for="(categories, index) in category" :key="index"  :value="categories.id">
                  {{ categories.name }}
                </option>
                <input type="hidden" />
              </select>
            <label for="category">Category</label>

            </div>
            <div class="form-group">
              <input
                type="text"
                id="description"
                v-model="product.description"
                required
                pattern="\S+.*"
              />
              <label for="description">Description</label>
            </div>
            <div class="form-group">
              <input
                type="text"
                id="stock"
                v-model="product.stock_qty"
                required
                pattern="\S+.*"
              />
              <label for="stock">Stock Count</label>
            </div>
            <div class="form-group">
              <input
                type="text"
                id="min_stock"
                v-model="product.minimum_stock"
                required
                pattern="\S+.*"
              />
              <label for="min_stock">Defective Stock</label>
            </div>
            <div class="form-group">
              <input
                type="text"
                id="price"
                v-model="product.price"
                required
                pattern="\S+.*"
              />
              <label for="price">Price</label>
            </div>
            <div class="form-group">
              <input type="file" ref="file" id="image" @change="uploadImage" />
              <label for="image">Upload Image</label>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      category: {},
      product: new Form({
        name: "",
        product_category_id: "",
        description: "",
        stock_qty: "",
        minimum_stock: "",
        price: "",
        image: "",
      }),

      seen: true,
    };
  },

  mounted() {
    this.loadCategory();
  },
  methods: {
    // createProduct() {
    //   this.product.post("api/product");
    //   console.log(this.product);
    // },
    hideModal(event) {
      this.$emit("update:is", "");
    },
    uploadImage(e) {
          let file = e.target.files[0];
          console.log(file);
          let reader = new FileReader();
          if(file['size'] < 2111775){
          reader.onloadend = (file)=>{
              this.product.image = reader.result;
          }
           reader.readAsDataURL(file)
          }else{
            console.log('file size can not be bigger than 2mb');
          }
        
    },
    
    loadCategory() {
      axios.get("api/category").then(({ data }) => (this.category = data.data));
      console.log(this.category);
    },

    async createProduct() {
      await this.product
        .post("api/product")
        .then((response) => {
          console.log(response.data);
          this.$emit("update:is", "");
        })
        .catch((response) => {
          console.log(response.data);
        });
    },
  },
  created() {
    this.loadCategory();
  },
};
</script>