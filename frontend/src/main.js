import './assets/main.css';
import axios from 'axios';

import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import { createPinia } from 'pinia';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

const token = localStorage.getItem('token');

if (token) {
    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
}

const app = createApp(App);
const pinia = createPinia();
app.use(VueSweetalert2);

app.use(pinia);
app.use(router);
app.mount('#app');