import './bootstrap';
import '../js/styleGlobal.css'
import { createApp } from 'vue';
import router from '../js/router/index'
import App from './components/App.vue'
import store from './store'
const app = createApp();


app.component('app', App)
app.use(router)
app.use(store)
app.mount('#app');