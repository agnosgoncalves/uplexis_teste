
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('form-get-posts', require('./components/FormGetPosts.vue').default);
Vue.component('page-get-posts', require('./components/PageGetPosts.vue').default);
Vue.component('list-posts', require('./components/ListPosts.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// set plugins 

import Notifications from 'vue-notification'
Vue.use(Notifications)

const app = new Vue({
    el: '#app'
});
