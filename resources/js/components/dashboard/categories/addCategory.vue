<template>
  <div v-if="showModal" class="db-modal product-add">
    <div id="modal" class="db-modal-container">
      <div class="db-modal-card cs-scroll">
        <div class="card-header">
          <div class="card-title">Add Category</div>
          <div class="card-action">
            <a @click="hide" class="close-btn">
              <i class="fas fa-times"></i>
            </a>
          </div>
        </div>
        <form class="card-form" @submit.prevent="createCategory()">
          <div class="card-body">
            <div class="form-group">
              <input
                type="text"
                id="name"
                v-model="form.name"
                required
                pattern="\S+.*"
              />
              <label for="name">Name</label>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Add</button>
            <button type="submit" @click="hide">Close</button>
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
      showModal: false,
      category: {},
      form: new Form({
        name: ""
      }),
    };
  },
  methods: {
    createCategory() {
      this.form.post("api/category");
       this.hide();
      Toast.fire({
        icon: "success",
        title: "New Category created",
      });
    },
    show() {
      this.showModal = true;
    },
    hide() {
      this.showModal = false;
    },
  },
};
</script>