import './bootstrap';


import { createApp } from 'vue';
import router from './router'
import App from './components/App.vue'
import Carrinho from './components/Carrinho.vue'
import store from './store'
const app = createApp();

app.component('app', App)
app.component('carrinho', Carrinho)
app.use(router)
app.use(store)
app.mount('#app');