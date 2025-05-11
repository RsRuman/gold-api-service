// frontend/src/router/index.js
import { createRouter, createWebHistory } from 'vue-router';

import Doc from '@/views/Doc.vue';
import About from '@/views/About.vue';
import Service from '@/views/Service.vue';
import Term from '@/views/Term.vue';
import Package from '@/views/Package.vue';
import Login from '@/views/Login.vue';
import Register from '@/views/Register.vue';
import Profile from '@/views/UserProfile.vue';

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
        path: '/packages',
        name: 'Package',
        component: Package
    },
    {
        path: '/login',
        name: 'Login',
        component: Login,
        meta: { guestOnly: true }
    },
    {
        path: '/register',
        name: 'Register',
        component: Register,
        meta: { guestOnly: true }
    },
    {
        path: '/profile',
        name: 'Profile',
        component: Profile,
        meta: { requiresAuth: true }
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

// Global middleware guard
router.beforeEach((to, from, next) => {
    const isAuthenticated = !!localStorage.getItem('token');

    if (to.meta.requiresAuth && !isAuthenticated) {
        next({ name: 'Login' });
    } else if (to.meta.guestOnly && isAuthenticated) {
        next({ name: 'Profile' });
    } else {
        next();
    }
});

export default router;
