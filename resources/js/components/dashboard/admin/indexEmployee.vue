<template>
  <div class="overview-wrapper product-index">
    <div class="overview-content">
      <div class="overview-header">
        <h3 class="overview-header-title"><strong>Manage</strong> Employees</h3>
        <div class="overview-new">
          <modal ref="modal"></modal>
          <button class="new-item" @click="openModal">
            <i class="fas fa-plus"></i>
            <span>New Employee</span>
          </button>
        </div>
      </div>
      <div class="overview-table">
        <div class="table">
          <div class="row row-header">
            <div class="col">
              <span class="col-title"> Profile Photo </span>
            </div>
            <div class="col">
              <span class="col-title"> Last Name </span>
            </div>
            <div class="col">
              <span class="col-title"> First Name </span>
            </div>
            <div class="col">
              <span class="col-title"> Email </span>
            </div>
            <div class="col">
              <span class="col-title"> Last Login </span>
            </div>
            <div class="col">
              <span class="col-title"> Role </span>
            </div>
          </div>
          <div class="row" v-for="user in users" :key="user.id">
            <div class="col">
              <span class="col-title">
                <img
                  v-bind:src="
                    '/img/uploads/profile_image/' + user.profile_image
                  "
                  style="border-radius: 50px"
                />
              </span>
            </div>
            <div class="col">
              <span class="col-title">
                <strong>{{ user.lastName }} </strong>
              </span>
            </div>
            <div class="col">
              <span class="col-title">
                <strong>{{ user.firstName }}</strong>
              </span>
            </div>
            <div class="col">
              <span class="col-title">
                <strong>{{ user.email }}</strong>
              </span>
            </div>
            <div class="col">
              <span class="col-title">
                <strong>{{ user.last_login_at | date }}</strong>
              </span>
            </div>
            <div class="col">
              <span class="col-title"> Role </span>
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
import modal from "./addEmployee.vue";
export default {
  components: { modal },
  data() {
    return {
      users: {},
    };
  },

  methods: {
    loadUsers() {
      axios.get("api/users").then(({ data }) => (this.users = data.data));
      console.log(this.users);
    },
    openModal() {
      this.$refs.modal.show();
    },
  },
  created() {
    this.loadUsers();
  },
};
</script>