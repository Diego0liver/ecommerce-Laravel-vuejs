import { createRouter, createWebHistory } from 'vue-router'
import Home from '../view/Home.vue'
import auth from  '../services/index'

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
      component: () => import ('../view/Carrinho.vue'),
      beforeEnter: auth.auth
    },
    {
      path: '/produtoid/:id',
      name: 'produtoid',
      component: ()=> import ('../view/ProdutoID.vue'),
      props: true
    },
    {
      path: '/categoria/pc',
      name: 'categoriapc',
      component: ()=> import ('../view/CategoriaPc.vue'),
      props: true
    },
    {
      path: '/categoria/notebook',
      name: 'categoriaNote',
      component: ()=> import ('../view/CategoriaNote.vue'),
      props: true
    },
    {
      path: '/categoria/acessorios',
      name: 'categoriaAcess',
      component: ()=> import ('../view/CategoriaAcess.vue'),
      props: true
    },
    {
      path: '/login',
      name: 'login',
      component: ()=> import ('../view/Login.vue'),
      props: true
    }
  ]
})

export default router