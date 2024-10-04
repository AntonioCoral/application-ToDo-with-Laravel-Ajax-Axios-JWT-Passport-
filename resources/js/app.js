import { createApp } from 'vue';
import Login from './components/Login.vue';
import Dashboard from './components/Dashboard.vue';

const app = createApp({});
app.component('login-component', Login);
app.component('dashboard-component', Dashboard);
app.mount('#app');  // El componente se montará en el div con id="app"
