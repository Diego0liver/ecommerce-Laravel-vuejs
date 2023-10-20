<template>
    <h1>Deu good</h1>
    <ul v-for="prod in data" :key="prod.id">
        <li>{{ prod.nome }}</li>
        <li>{{ prod.preco }}</li>
        <img class="imgProduto" :src="`http://127.0.0.1:8000/img/produtos/${prod.imagem}`" alt="Imagem" />
    </ul>
    <button @click="carrinho">Carrinho !</button>
</template>


<script>
import { mapState, mapActions } from 'vuex';
export default{
    methods:{
        ...mapActions(['getProdutos']),
        carrinho(){
        this.$router.push('/card')
      }
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
   .imgProduto{
    width: 180px;
    height: 180px;
   }
</style>