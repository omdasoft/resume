
require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('pagination', require('laravel-vue-pagination'));

//front components
Vue.component('header-component', require('./components/HeaderComponent.vue').default);
Vue.component('sidebar-component', require('./components/SidebarComponent.vue').default);
Vue.component('footer-component', require('./components/footerComponent.vue').default);
Vue.component('front-layout-component', require('./layouts/Front.vue').default);
//dahsboard components
Vue.component('dashboard-navbar', require('./dashboard/components/TheNavbar.vue').default);
Vue.component('dashboard-sidebar', require('./dashboard/components/TheSidebar.vue').default);
Vue.component('dashboard-footer', require('./dashboard/components/TheFooter.vue').default);
Vue.component('dashboard-layout-component', require('./layouts/Dashboard.vue').default);


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

import router from './router';

const app = new Vue({
    router,
    el: '#app',
    //render:h=>h(App),
});
