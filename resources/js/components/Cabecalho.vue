
<template>
<nav class="nav">
    <RouterLink to="/">
    <img class="logoTipo" src="../../../public/img/logos/logo.png" alt="logo">
    </RouterLink>
    <div>
    <h1 class="title">Tec Stoom</h1>
    <input class="busca" type="text" />
    </div>
    <div>
      <img class="carrinho" src="../../../public/img/logos/user.png" alt="cart">
    <RouterLink to="/card">
      <img class="carrinho" src="../../../public/img/logos/cart.png" alt="cart">
    </RouterLink>
   </div>
</nav>
</template>

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
   .logoTipo{
    width: 120px;
    height: 120px;
    border-radius: 100%;
    margin: 10px;
   }
   .busca{
    height: 20px;
    width: 200px;
   }
   .carrinho{
    margin: 30px;
    background-color: white;
    border-radius: 100%;
    padding: 10px;
    width: 40px;
    height: 40px;
   }
</style>