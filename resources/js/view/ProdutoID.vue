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
      <button class="btn">Adicionar ao carrinho</button>
     </div>
    </div>
   </div>
</template>

<script>
import Cabecalho from '../components/Cabecalho.vue'
import api from '../http/api'
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
  }
  }
</script>

<style scoped>
.produtoCorpo{
  display: flex;
  justify-content: center;
  margin: 30px;
}
.nomeProduto{
  text-align: center;
  margin-top: 20px;
  color: #42464d;
  font-size: 45px;
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
.btn{
  margin-top: 180px;
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