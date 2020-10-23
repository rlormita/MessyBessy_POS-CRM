<template>
  <div v-if="showModal" class="db-modal product-add">
    <div id="modal" class="db-modal-container">
      <div class="db-modal-card cs-scroll">
        <div class="card-header">
          <div class="card-title">Add Employee Account</div>
          <div class="card-action">
            <a @click="hide" class="close-btn">
              <i class="fas fa-times"></i>
            </a>
          </div>
        </div>
        <form class="card-form" @submit.prevent="createUser()">
          <div class="card-body">
            <div class="form-group">
              <input
                type="text"
                id="firstName"
                v-model="form.firstName"
                required
                pattern="\S+.*"
              />
              <label for="firstName">First Name</label>
            </div>
            <div class="form-group">
              <input
                type="text"
                id="lastName"
                v-model="form.lastName"
                required
                pattern="\S+.*"
              />
              <label for="lastName">Last Name</label>
            </div>
            <div class="form-group">
              <input
                type="email"
                id="email"
                v-model="form.email"
                required
                pattern="\S+.*"
              />
              <label for="email">Email</label>
            </div>
            <div class="form-group">
              <input
                type="password"
                id="password"
                v-model="form.password"
                required
                pattern="\S+.*"
              />
              <label for="password">Password</label>
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
      users: {},
      form: new Form({
        firstName: "",
        lastName: "",
        email: "",
        password: "",
      }),
    };
  },
  methods: {
    createUser() {
      this.form.post("api/users");
    },
    show() {
      this.showModal = true;
    },
    hide() {
      this.showModal = false;
    },
  },
};
// export default {
//     data: function () {
//         return {
//             categories: [],
//             employee: {
//             	firstName: '',
//                 lastName: '',
//                 email: '',
//                 password: '',
//             },
//             seen: true,
//         }
//     },
//     mounted() {
//         this.loadCategories();
//     },
//     methods: {
//         /* launchModal() {
//             this.productName = 'Product 1';
//             this.productDesc = 'Product Description 1';
//             $('#productModal').modal('show');
//         }, */
//         hideModal(event) {
//         	this.$emit('update:is', '')
//         },
//         uploadImage(event) {
//         	console.log(event.target.files);
//         },
//         loadCategories: function() {
//             axios.get('/api/categories')
//                 .then((response) => {
//                     this.categories = response.data.data;
//                 })
//                 .catch(function (error) {
//                     console.log(error);
//                 });
//         }
//     }
// }
</script>