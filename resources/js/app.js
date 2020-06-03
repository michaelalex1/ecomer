/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'

import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
Vue.use(Loading)
Vue.component('pagination', require('laravel-vue-pagination'));

Vue.use(VueRouter)

import App from './views/App'

import ListCategory from './views/admin/category/index'
import ListProduct from './views/admin/product/index'

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/category/list',
            name: 'ListCategory',
            component: ListCategory
        },
        {
            path: '/product/list',
            name: 'ListProduct',
            component: ListProduct
        }


    ],
});

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
const app = new Vue({
    el: '#app',
    components: { App },
    router,
});
