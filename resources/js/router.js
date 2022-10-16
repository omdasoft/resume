import Vue from 'vue';
import VueRouter from 'vue-router';

import Portfolio from './pages/portfolio.vue';
import Main from './pages/index.vue';
import Contact from './pages/contact.vue';
import Posts from './pages/posts.vue';

//import dashboard pages 
import Dashboard from './dashboard/pages/dashboard.vue';
import Message from './dashboard/pages/message.vue';
import Profile from './dashboard/pages/profile.vue';

Vue.use(VueRouter);
const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    
    routes: [
        {
            path: '/',
            name: 'index',
            component: Main
        },
        {
            path: '/portfolio',
            name: 'portfolio',
            component: Portfolio
        },
        {
            path: '/contact',
            name: 'contact',
            component: Contact
        },
        {
            path: '/posts',
            name: 'posts',
            component: Posts
        },
        {
            path: '/message',
            name: 'message',
            component: Message
        },
        {
            path: '/dashboard/profile',
            name: 'profile',
            component: Profile
        }
    ]
    
});

export default router;