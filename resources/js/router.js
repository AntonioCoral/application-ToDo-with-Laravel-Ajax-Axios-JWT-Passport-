import { createApp } from 'vue';
import { createRouter, createWebHashHistory } from 'vue-router'
import Login from './components/Login.vue';
import Dashboard from './components/Dashboard.vue'


const routes = [
    {
        path: '/', component: Login,
    },{
        path: '/dashboard', component: Dashboard
    }
]

const router = createRouter({
    history: createWebHashHistory(),
    routes,
})

