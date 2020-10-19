/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue';
import VueRouter from 'vue-router';
import router from './routes';

require('./bootstrap');

window.Vue = require('vue');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

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

/* Vue Router */
Vue.use(VueRouter);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});