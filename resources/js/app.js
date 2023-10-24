import './bootstrap';
import '../js/styleGlobal.css'
import { createApp } from 'vue';
import router from '../js/router/index'
import Home from './view/Home.vue'
import App from './view/App.vue'
import Carrinho from './view/Carrinho.vue'
import ProdutoID from './view/ProdutoID.vue'
import store from './store'
const app = createApp();

app.component('app', App)
app.component('home', Home)
app.component('carrinho', Carrinho)
app.component('produtoid', ProdutoID)
app.use(router)
app.use(store)
app.mount('#app');