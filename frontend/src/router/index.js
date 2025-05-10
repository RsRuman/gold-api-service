// frontend/src/router/index.js
import { createRouter, createWebHistory } from 'vue-router';

import Doc from '@/views/Doc.vue';
import About from '@/views/About.vue';
import Service from '@/views/Service.vue';
import Term from '@/views/Term.vue';
import Package from '@/views/Package.vue';
import Login from '@/views/Login.vue';
import Register from '@/views/Register.vue';

const routes = [
    {
        path: '/docs',
        name: 'Doc',
        component: Doc
    },
    {
        path: '/services',
        name: 'Service',
        component: Service
    },
    {
        path: '/about',
        name: 'About',
        component: About
    },
    {
        path: '/terms',
        name: 'Term',
        component: Term
    },
    {
        path : '/packages',
        name : 'Package',
        component: Package
    },
    {
        path : '/login',
        name : 'Login',
        component: Login
    },
    {
        path : '/register',
        name : 'Register',
        component: Register
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
