<template>
  <Cabecalho />
  <div>
   <h1 class="nome">{{ dados.name }}</h1>
   <h3 class="email">{{ dados.email }}</h3>
   <div class="line-container">
   <p class="linha"></p>
   </div>
   <div class="cardContato">
    <h5>Enderco:</h5>
    <p>Rua: {{ dados.rua }}</p>
    <p>Cidade: {{ dados.cidade }} - {{ dados.estado }}</p>
    <h5>Contatos:</h5>
    <p>Telefone: {{ dados.telefone  }}</p>
    <p>Email: {{ dados.email }}</p>
    <div>
    <button class="btn">Editar endereco</button>
    <button class="btn">Ver meus pedidos</button>
    </div>
    <div class="line-container">
     <p class="linha"></p>
     </div>
    <button class="btn" @click="logout">Sair da conta</button>
  </div>
  </div>
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
    location.reload()
  }}
 }
 </script>

 <style scoped>
 .nome{
  text-align: center;
  font-weight: bold;
  margin: 10px;
 }
 .email{
  text-align: center;
  color: darkgrey;
  margin: 10px;
 }
 .cardContato{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  font-size: 20px;
  margin-top: 10px;
 }
 .btn{
    margin-top: 9px;
    background-color: #ff7f00;
    color: #fff;
    padding: 10px;
    font-weight: bold;
    cursor: pointer;
    border: none;
    border-radius: 10px;
    margin-bottom: 10px;
    margin-left: 5px;
}
.btn:hover{
    box-shadow: 0 0 1em #ff7f00;
}
.linha{
  border-bottom:2px #ff7f00 solid;
  width: 160px;
}
.line-container {
  display: flex;
  justify-content: center; 
  align-items: center; 
}
</style>