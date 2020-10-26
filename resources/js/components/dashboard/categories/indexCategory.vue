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
  },
  created() {
    this.loadCategory();
  },
};
</script>