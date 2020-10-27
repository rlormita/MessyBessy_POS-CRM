<template>
  <div class="db-modal product-add" id="addNew">
    <div class="db-modal-container">
      <div class="db-modal-card cs-scroll">
        <div class="card-header">
          <div class="card-title">Add Stock</div>
          <div class="card-action">
            <a @click="hideModal" class="close-btn">
              <i class="fas fa-times"></i>
            </a>
          </div>
        </div>
        <form
          enctype="multipart/form-data"
          class="card-form"
          v-on:submit.prevent="createStock()"
        >
          <div class="card-body">
            <div class="form-group">
              <input
                type="text"
                id="name"
                v-model="stocks.branch"
                required
                pattern="\S+.*"
              />
              <label for="name">Branch</label>
            </div>
            <div class="form-group">
              <input
                type="text"
                id="description"
                v-model="stocks.location"
                required
                pattern="\S+.*"
              />
              <label for="description">Location</label>
            </div>
            <div class="form-group">
              <input
                type="text"
                id="stock"
                v-model="stocks.region"
                required
                pattern="\S+.*"
              />
              <label for="stock">Region</label>
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
      stocks: new Form({
        branch: "",
        location: "",
        region: "",
      
      }),

      seen: true,
    };
  },

  mounted() {
    
  },
  methods: {
    // createProduct() {
    //   this.product.post("api/product");
    //   console.log(this.product);
    // },
    hideModal(event) {
      this.$emit("update:is", "");
    },
    // uploadImage(e) {
    //   let file = e.target.files[0];
    //   console.log(file);
    //   let reader = new FileReader();
    //   if (file["size"] < 2111775) {
    //     reader.onloadend = (file) => {
    //       this.product.image = reader.result;
    //     };
    //     reader.readAsDataURL(file);
    //   } else {
    //     console.log("file size can not be bigger than 2mb");
    //   }
    // },

    // loadCategory() {
    //   axios.get("api/category").then(({ data }) => (this.category = data.data));
    // },

    async createStock() {
      await this.stocks.post("api/stock");
      Fire.$emit('AfterCreated');
      this.hideModal();

      Toast.fire({
        icon: "success",
        title: "New stock created",
      });

    },
  },
  created() {
    this.loadCategory();
  },
};
</script>