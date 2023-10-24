import { createRouter, createWebHistory } from 'vue-router'
import Home from '../view/Home.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/card',
      name: 'carrinho',
      component: () => import ('../view/Carrinho.vue')
    },
    {
      path: '/produtoid/:id',
      name: 'produtoid',
      component: ()=> import ('../view/ProdutoID.vue'),
      props: true
    }
  ]
})

export default router