

require('./bootstrap');
window.Vue = require('vue');

// Support vuex
import Vuex from 'vuex';
Vue.use(Vuex);

import storeData from "./store/index"
const store = new Vuex.Store(
    storeData
)
//support moemnt js
import {filter} from './filter';

//support boostrap-vue
import BootstrapVue from 'bootstrap-vue';
Vue.use(BootstrapVue);

//vue-router support
import VueRouter from 'vue-router'; 
Vue.use(VueRouter);
import{routes} from './routes';


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-main', require('./components/admins/AdminMaster.vue').default);

//Vue-progress bar
import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '4px'
}) 

//sweet alert 2
import Swal from 'sweetalert2';
window.Swal = Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });  

window.Toast =Toast;

//vform 
import { Form, HasError, AlertError } from 'vform'
//make global
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form = Form;

//vrouter
const router = new VueRouter({
    mode: 'hash', //hash, history
    routes // short for `routes: routes`
  })
const app = new Vue({
    el: '#app',
    router,
    store,
}); 