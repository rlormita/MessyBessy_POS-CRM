/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue';

// import router from './routes';

require('./bootstrap');

window.Vue = require('vue');
import moment from 'moment'
import { Form, HasError, AlertError } from 'vform'

window.Form = Form;

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

import VueRouter from 'vue-router';
Vue.use(VueRouter);


// ProductList vue components
Vue.component('messy-transact', require('./components/shop/FrontPage.vue').default);
Vue.component('messy-trans-catnav', require('./components/shop/TransCatNav.vue').default);
Vue.component('messy-trans-botnav', require('./components/shop/TransBotNav.vue').default);
Vue.component('messy-main', require('./components/shop/FrontPage.vue').default);
Vue.component('messy-shop', require('./components/shop/ShopFront.vue').default);
Vue.component('messy-item', require('./components/shop/ProductItem.vue').default);
Vue.component('messy-cart', require('./components/shop/ShoppingCart.vue').default);
Vue.component('messy-scan', require('./components/shop/CodeScan.vue').default);
Vue.component('product-modal', require('./components/shop/ProductModal.vue').default);
Vue.component('welcome', require('./components/screens/Welcome.vue').default);

/* Dashboard Components */
Vue.component('dashboard', require('./components/dashboard/Dashboard.vue').default);
Vue.component('dashboard-sidebar', require('./components/dashboard/DashboardSidebar.vue').default);
Vue.component('dashboard-products', require('./components/dashboard/DashboardProducts.vue').default);
Vue.component('dashboard-categories', require('./components/dashboard/DashboardCategories.vue').default);
Vue.component('product-index', require('./components/dashboard/products/indexProduct.vue').default);
Vue.component('category-index', require('./components/dashboard/categories/indexCategory.vue').default);

/* Transaction Components */
Vue.component('transaction', require('./components/transaction/TransactionMain.vue').default);


const routes = [
    { path: '/dashboard/employee', component: require('./components/dashboard/admin/indexEmployee.vue').default },

]

const router = new VueRouter({
    mode: 'history',
    routes
});

Vue.filter('date', function(created) {
    if (!created) return ''
    return moment(created).format('MMMM Do YYYY, h:mm:ss a');
});

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
    router
});