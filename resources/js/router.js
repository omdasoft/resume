import Vue from 'vue';
import VueRouter from 'vue-router';

import Dashboard from './components/admin/DashboardComponent.vue';
/*
import About from './pages/About.vue';
*/

Vue.use(VueRouter);
const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    
    routes: [
        {
            path: '/',
            name: 'dashboard',
            component: Dashboard
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
    ]
    
});

export default router;