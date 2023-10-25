<template>
    <div>
        <Cabecalho />
        <CategoriasOpc />
    </div>
    <div class="cardItem">
    <ul class="card" v-for="prod in dados" :key="prod.id">
        <RouterLink :to="'/produtoid/' + prod.id">
        <img class="imgProduto" :src="`http://127.0.0.1:8000/img/produtos/${prod.imagem}`" alt="Imagem" />
        <li class="nomeProduto">{{ prod.nome }}</li>
        <li class="precoProduto">R$ {{ prod.preco }}</li>
        <li class="desProduto">10% de desconto no PIX</li>
       </RouterLink>
    </ul>
    </div>
</template>


<script>
import Cabecalho from '@/components/Cabecalho.vue'
import CategoriasOpc from '@/components/CategoriasOpc.vue'
import { RouterLink } from 'vue-router';
import api from '../http/api';
export default{
    components:{
    Cabecalho,
    CategoriasOpc,
    RouterLink
},
data() {
     return {
      dados:{}
    }
  },
methods: {
  fetchData() {
    api.get('/categoria/acessorios')
    .then(response => {
        this.dados = response.data.categoria}
        )
      .catch(error => {
        // Lide com erros aqui
        console.error(error);
      });
  }
},
mounted() {
  this.fetchData();
}
}
</script>

<style scoped>
   .cardItem{
    display: flex;
    justify-content: space-evenly;
    flex-wrap: wrap;
    margin: 10px;
   }
   .card{
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    border-radius: 10px;
    margin-top: 30px;
    padding: 20px;
   }
   .card:hover{
    border: #ff7f00 solid 1px;
    cursor: pointer;
    box-shadow: #ff800086 0px 3px 8px;
   }
   .imgProduto{
    width: 180px;
    height: 180px;
   }
   .precoProduto{
    list-style: none;
    color: #ff7f00;
    font-size: 25px;
    font-weight: bold;
   }
   .nomeProduto{
    color: #4e464d;
    list-style: none;
    font-size: 22px;
    font-weight: bold;
   }
   .desProduto{
    list-style: none;
    font-size: 12px;
    font-style: italic;
    color: darkgrey;
    margin-top: 5px;
    margin-left: 10px;
   }
</style>