<template>
  <div class="overview-wrapper product-index">
    <div class="overview-content">
      <div class="overview-header">
         <h3 class="overview-header-title">
          <strong>Categories</strong> Overview
        </h3>
        <div class="overview-new">
          <modal ref="modal"></modal>
          <button class="new-item" @click="openModal">
            <i class="fas fa-plus"></i>
           <span>New Category</span>
          </button>
        </div>
      </div>
      <div class="overview-table">
        <div class="table">
         <div class="row row-header">
            <div class="col">
              <span class="col-title"> Name </span>
            </div>
            <div class="col">
              <span class="col-title"> Actions </span>
            </div>
          </div>
            <div class="row" v-for="categories in category" :key="categories.id">
            <div class="col">
              <span class="col-title">
                {{ categories.name }}
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
                    @click="deleteCategory(categories.id)"
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
import modal from "./addCategory.vue";
export default {
  components: { modal },
  data() {
    return {
      category: {},
    };
  },

  methods: {
   loadCategory() {
      axios.get("api/category").then(({ data }) => (this.category = data.data));
      console.log(this.category);
    },
    openModal() {
      this.$refs.modal.show();
    },
      deleteCategory(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        axios.delete("api/category/" + id).then(() => {
          Swal.fire("Deleted!", "Your file has been deleted.", "success");
        }).catch(()=>{
          Swal.fire("Failed!", "There was something wrong.", "warning");
        });
      });
    },
  },
  created() {
    this.loadCategory();
    setInterval(() => {this.loadCategory()}, 3000);
  },
};
</script>