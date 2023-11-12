<template>
   <Cabecalho/>
   <div>
     <div>
      <h1 class="nomeProduto">{{ dados.nome }}</h1>
     </div>
    <div class="produtoCorpo">
      <img class="imgProduto" :src="`http://127.0.0.1:8000/img/produtos/${dados.imagem}`" alt="ImgProduto" />
      <div class="cardDetalhes">
      <h3 class="nomeProduto2">{{ dados.nome }}</h3>
      <h3 class="preco">R$ {{ dados.preco }}</h3>
      <p class="desconto">10% de desconto no PIX</p>
      <p class="desconto">Frete GRATIS acima de 200R$</p>
      <p class="descricao">{{ dados.descricao }}</p>
      <button @click="addCart" class="btn">Adicionar ao carrinho</button>
     </div>
    </div>
    <h5 class="nomeProduto">Outros produtos</h5>
    <div class="conteinerOutros">
      <div class="scrolling-content">
        <ul class="cardOutros" v-for="prod in produtos">
        <RouterLink :to="'/produtoid/' + prod.id">
        <img class="imgOutros" :src="`http://127.0.0.1:8000/img/produtos/${prod.imagem}`" alt="Imagem" />
        <li class="nomeOutros">{{ prod.nome }}</li>
        <li class="precoOutros">R$ {{ prod.preco }}</li>
       </RouterLink >
      </ul>
      </div>
    </div>
   </div>
</template>

<script>
import Cabecalho from '@/components/Cabecalho.vue'
import api from '../http/api'
import { mapState, mapActions } from 'vuex';
const IDcart = localStorage.getItem('userID');
export default {
    name: 'produtoid',
    components:{
      Cabecalho
    },
    props: ['id'],
    data() {
     return {
      id: this.$route.params.id,
      dados:{}
    }
  },
  async mounted() {
    try {
       await api.get('/produtos/' + this.id)
       .then(response => {
        this.dados = response.data})
    } catch (error) {
      console.error( error);
    }
    this.getProdutos();
  },
  methods:{
    ...mapActions(['getProdutos']),
    addCart(){
      if(IDcart){
    api.post('/produtos/cart', {pedido_id: IDcart, produto_id: this.id})
    .then(response => {
      console.log(response.data)})
      .catch(error => {
        console.error(error);
      })}else{
        alert('Para adicionar ao carrinho precisa fazer o login')
      }
  }},
  computed:{
    ...mapState(['produtos'])
  }
  }
</script>

<style scoped>
.produtoCorpo{
  display: flex;
  justify-content: center;
  margin: 30px;
}
.imgOutros{
  width: 90px;
}
.nomeProduto{
  text-align: center;
  margin-top: 20px;
  color: #42464d;
  font-size: 45px;
}
.nomeOutros{
  list-style: none;
}
.cardOutros{
  margin: 10px;
}
.precoOutros{
  color: #ff7f00;
  list-style: none;
}
.nomeProduto2{
  color: #42464d;
  font-size: 35px;
  font-style: italic;
  margin-top: 20px;
}
.preco{
    color: #ff7f00;
    font-size: 40px;
    font-weight: bold;
}
.desconto{
   font-size: 15px;
    font-style: italic;
    color: darkgrey;
    margin-top: 10px;
}
.conteinerOutros{
    display: flex;
    overflow: hidden;
    white-space: nowrap;
    align-items: center;
    justify-content: center;
}
.scrolling-content {
    display: flex;
    overflow-x: scroll;
    white-space: nowrap;
    width: 900px;
    margin-bottom: 100px;
}
.scrolling-content::-webkit-scrollbar-thumb {
    background: #ff7f00; 
    border-radius: 5px; 
}
.scrolling-content::-webkit-scrollbar {
    height: 12px;
}
.scrolling-content::-webkit-scrollbar-track {
    background: #eee;
    border-radius: 5px; 
}
.btn{
  margin-top: 180px;
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
.descricao{
  color: rgb(136, 136, 136);
  margin-top: 20px;
}
.imgProduto{
  width: 450px;
  height: 450px;
}
.cardDetalhes{
  box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    border-radius: 10px;
    margin-top: 30px;
    padding: 20px;
}
</style>