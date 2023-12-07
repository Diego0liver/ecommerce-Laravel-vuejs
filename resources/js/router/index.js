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
      path: '/cliente',
      name: 'cliente',
      component: () => import ('../view/Cliente.vue'),
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
    ,
    {
      path: '/reg',
      name: 'registro',
      component: ()=> import ('../view/Registro.vue'),
      props: true
    },
    {
      path: '/admin',
      name: 'admin',
      component: ()=> import ('../view/AdminLogin.vue'),
      props: true
    },
    {
      path: '/painel',
      name: 'painel',
      component: ()=> import ('../view/admin/HomeAdmin.vue'),
      // beforeEnter: auth.authAdmin
    }
  ]
})

export default router