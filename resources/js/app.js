/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import VueSweetalert2 from 'vue-sweetalert2';
import VueApexCharts from 'vue-apexcharts'

window.Vue.use(VueApexCharts)
window.Vue.use(ElementUI);
window.Vue.use(VueSweetalert2);
// window.Vue.use(ApexCharts);
// window.Vue.use(ElNotification);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('apexchart', VueApexCharts);
Vue.component('app-component', require('./components/App.vue').default);
Vue.component('index-component', require('./components/PageInit.vue').default);
Vue.component('login-component', require('./components/auth/Login.vue').default);
Vue.component('navbar-component', require('./components/principal/Navbar.vue').default);
Vue.component('footer-component', require('./components/principal/Footer.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import router from './routes'

const app = new Vue({
    el: '#app',
    router
});
