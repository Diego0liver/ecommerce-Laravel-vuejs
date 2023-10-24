<template>
<nav class="nav">
    <img class="logoTipo" src="../../../public/img/logos/logo.png" alt="logo">
    <input class="busca" type="text" />
    <RouterLink to="/card">
     <button class="carrinho">Carrinho !</button>
    </RouterLink>
</nav>
</template>

<style scoped>
  .nav{
    background-color: #ff7f00;
    display: flex;
    justify-content: space-between;
   }
   .logoTipo{
    width: 120px;
    height: 120px;
    border-radius: 100%;
    margin: 10px;
   }
   .busca{
    margin-top: 50px;
    height: 20px;
    width: 200px;
   }
   .carrinho{
    margin: 10px;
   }
</style>