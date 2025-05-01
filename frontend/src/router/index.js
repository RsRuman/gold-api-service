// frontend/src/router/index.js
import { createRouter, createWebHistory } from 'vue-router';
import App from '@/App.vue';
import Doc from '@/views/Doc.vue';
import About from '@/views/About.vue';
import Service from '@/views/Service.vue';
import Term from '@/views/Term.vue';

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
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
