<template>
  <Cabecalho />
<h1>Cliente</h1>
    <ul>
       <li>{{ dados.name }}</li>
       <li>{{ dados.cidade }} - {{ dados.estado }}</li>
       <li>{{ dados.rua }}</li>
       <li>{{ dados.telefone }}</li>
       <li>{{ dados.email }}</li>
    </ul>
    <button>Editar</button><br/>
    <button @click="logout">Sair da conta</button>
 </template>
 
 <script>
 import Cabecalho from '@/components/Cabecalho.vue';
 import api from '../http/api'
 const userID = localStorage.getItem('userID');
 export default {
     name: 'carrinho',
     components: {Cabecalho},
     data(){
      return{
          dados:[]
      }
     },
     methods: {
  fetchData() {
    api.get(`/cliente/user/${userID}`)
    .then(response => {
        this.dados = response.data
      })
      .catch(error => {
        console.error(error);
      });
  }
},
mounted() {
  this.fetchData();
},
computed:{
  logout(){
    localStorage.removeItem("authToken");
    localStorage.removeItem("userID");
    this.$router.push('/')
    location.reload();
  }}
 }
 </script>