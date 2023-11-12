
<template>
<nav class="nav">
    <RouterLink to="/">
    <img class="logoTipo" src="../../../public/img/logos/logo.png" alt="logo">
    </RouterLink>
    <div>
    <h1 class="title">Tec Stoom</h1>
    <input class="busca" type="text" />
    </div>
    
    <div class="nav">
    <RouterLink to="/cliente">
      <img class="user" src="../../../public/img/logos/user.png" alt="user">
    </RouterLink>  
    <RouterLink to="/card">
      <div class="cartNav">
      <img class="carrinho" src="../../../public/img/logos/cart.png" alt="cart">
      <p class="numberCart">{{ pedidos.length }}</p>
    </div>
    </RouterLink>
   </div>
</nav>
</template>

<script>
import { mapState, mapActions } from 'vuex';

export default{
  methods:{
  ...mapActions(['getCart']),
},
mounted(){
  this.getCart();
},
computed:{
    ...mapState(['pedidos'])
}
}
</script>

<style scoped>
  .title{
    margin-top:25px;
    color: white;
    text-align: center;
    font-weight: bold;
    font-family: 'Alfa Slab One', serif;
    font-size: 30px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
  }
  .nav{
    background-color: #ff7f00;
    display: flex;
    justify-content: space-between;
   }
   .cartNav{
    display: flex;
    margin: 30px;
   }
   .numberCart{
   background-color: #d36a02;
   width: 20px;
   height: 20px;
   text-align: center;
   color: #fff;
   font-weight: bold;
   border-radius: 50%;
   margin-left: -15px;
   }
   .logoTipo{
    width: 120px;
    height: 120px;
    border-radius: 100%;
    margin: 10px;
   }
   .busca{
    height: 20px;
    width: 200px;
    border: none;
    border-bottom: 2px solid #ff7f00;
    padding: 5px;
    border-radius: 3px;
    background-color: rgb(236, 236, 236);
   }
    .busca:focus{
    box-shadow: 0 0 1em #ffffff;
    border: 1px solid #ffffff;
    outline: 0;
}
   .carrinho{
    background-color: white;
    border-radius: 100%;
    padding: 10px;
    width: 40px;
    height: 40px;
   }
   .user{
    background-color: white;
    border-radius: 100%;
    padding: 10px;
    width: 40px;
    height: 40px;
    margin-top: 30px;
   }
</style>