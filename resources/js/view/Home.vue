<template>
    <div>
        <Cabecalho />
        <ul class="opcoes">
            <li class="listaOpcoes">PC's</li>
            <li class="listaOpcoes">NoteBook's</li>
            <li class="listaOpcoes">Acessorios</li>
        </ul>
    </div>
    <div class="cardItem">
    <ul class="card" v-for="prod in data" :key="prod.id">
        <RouterLink :to="'/produtoid/' + prod.id">
        <img class="imgProduto" :src="`http://127.0.0.1:8000/img/produtos/${prod.imagem}`" alt="Imagem" />
        <li class="nomeProduto">{{ prod.nome }}</li>
        <li class="precoProduto">R$ {{ prod.preco }}</li>
        <li class="desProduto">10% de desconto no PIX</li>
       </RouterLink >
    </ul>
    </div>
</template>


<script>
import { mapState, mapActions } from 'vuex';
import Cabecalho from '../components/Cabecalho.vue'
import { RouterLink } from 'vue-router';
export default{
    components:{
    Cabecalho,
    RouterLink
},
    methods:{
        ...mapActions(['getProdutos']),
    },
    mounted(){
       this.getProdutos();
    },
    computed:{
          ...mapState(['data'])
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
   .opcoes{
      display: flex;
      justify-content: center;
   }
   .listaOpcoes{
    margin-left: 10px;
    list-style: none;
    background-color: #666666;
    color: white;
    padding: 15px;
    border-radius: 10px;
    box-shadow: rgba(0, 0, 0, 0.35) 0px -50px 36px -28px inset;
    border: rgb(255, 255, 255) solid 1px;
   }
   .listaOpcoes:hover{
    box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
   }
</style>