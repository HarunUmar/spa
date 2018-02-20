import Vue from 'vue';
import Pos from './components/pos/Pos.vue';
import Admin from './components/admin/admin.vue';
import Home from './components/Home.vue';
import Register from './components/Register.vue';
import Signin from './components/Signin.vue';
import Guard from './middleware.js';
import search from './components/search.vue';


export default [
 {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path:'/admin',
            name: 'admin',
            beforeEnter: Guard.authAdmin,
            component:Admin
        },
        {
            path:'/search',
            name: 'search',
            component:search
        },
        {
            path: '/pos',
            name: 'pos',
            //meta: { requiresAuth: true},
            beforeEnter: Guard.authPos,
            component:Pos
        },

        {
            path: '/register',
            name: 'register',
            beforeEnter: Guard.guest,
            component: Register

        },
        {
            path: '/signin',
            name: 'signin',
            beforeEnter: Guard.guest,
            component: Signin
        }
];