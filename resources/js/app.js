
require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('pagination', require('laravel-vue-pagination'));

Vue.component('header-component', require('./components/HeaderComponents.vue').default);
Vue.component('app-component', require('./layouts/App.vue').default);

import { Form, HasError, AlertError } from 'vform';
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

//import sweet alert
import Swal from 'sweetalert2'
window.Swal = Swal
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
window.Toast = Toast

//import vue router
import VueRouter from 'vue-router';
Vue.use(VueRouter);


import Dashboard from './components/admin/DashboardComponent.vue';
import Message from './components/admin/MessageComponent.vue';
import Profile from './components/admin/ProfileComponent.vue';

//define the components links
let routes = [
  { path: '/dashboard', component:Dashboard},
  { path: '/messages', component:Message},
  { path:'/profile', component:Profile}
 
  ]

   //create new vuerouter instance
   const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
  })

const app = new Vue({
    router,
    el: '#app',
    //render:h=>h(App),
});
