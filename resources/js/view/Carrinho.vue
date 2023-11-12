<template>
 <Cabecalho />
 <div class="body">
  <div class="cardSacola">
      <h1>PRODUTO E SERVIÇO</h1>
      <ul class="cardProduto" v-for="ped in pedidos" :key="ped.id">
          <img class="imgProduto" :src="`http://127.0.0.1:8000/img/produtos/${ped.imagem}`" alt="Imagem" />
          <div>
          <li class="nome">{{ ped.nome }}</li>
          <li class="preco">R$ {{ ped.preco }}</li>
          </div>
          <li @click="remove(ped.id)" class="remov">Remover</li>
      </ul>
    </div>

    <div class="cardTotal">
      <h2>RESUMO</h2>
      <h4>Quantidade de produtos</h4>
      <h4>{{ pedidos.length }}</h4>
      <p class="detal">Frete gratis acima de R$ 1000</p>
      <p class="detal">10% pagamento no PIX</p>
      <h1 class="total">Total: R$ {{ totalPreco.toFixed(2) }}</h1>
      <button class="btn">Finaliza pedido</button>
      <p class="exclui">Esvaziar carrinho</p>
    </div>
</div>
</template>

<script>
import Cabecalho from '@/components/Cabecalho.vue';
import { mapState, mapActions } from 'vuex';

export default {
    name: 'carrinho',
    components: {Cabecalho},
    methods:{
      ...mapActions(['getCart']),
      
    remove(id){
      console.log(id)
    }
},
mounted(){
  this.getCart();
},
computed:{
  totalPreco() {
    return this.pedidos.reduce((total, ped) => total + parseFloat(ped.preco), 0);
    },
    ...mapState(['pedidos']),
   
}
}
</script>

<style scoped>
.body{
  background-color: rgb(245, 245, 245);
  display: flex;
}
.cardProduto{
  list-style: none;
  display: flex;
  background-color: #fff;
  margin-top: 10px;
  padding: 10px;
  width: 900px;
  border-radius: 20px;
}
.imgProduto{
  width: 60px;
}
.preco{
  font-weight: bold;
  color: #ff7f00;
}
.total{
  color: #ff7f00;
}
.nome{
  font-style: italic;
}
.remov{
  margin-left: 50px;
  cursor: pointer;
  color: red;
  font-weight: bold;
}
.detal{
  font-style: italic;
  color: rgb(190, 188, 188);
}
.cardTotal{
  background-color: #fff;
  margin: 10px;
  padding: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  border-radius: 20px;
}
.btn{
    margin-top: 9px;
    margin-bottom: 9px;
    background-color: #ff7f00;
    color: #fff;
    padding: 10px;
    font-weight: bold;
    cursor: pointer;
    border: none;
    border-radius: 10px;
}
.btn:hover{
  box-shadow: 0 0 1em #ff7f00;
}
.exclui{
  margin-top: 20px;
  font-style: italic;
  cursor: pointer;
  color: red;
  font-weight: bold;
}
</style>