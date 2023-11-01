<template>
 <Cabecalho />
    <h1>Ola a</h1>
    <ul v-for="ped in pedido" :key="ped.id">
        <li>{{ ped.nome }}</li>
        <li>{{ ped.preco }}</li>
    </ul>
    <h1>Total: R$ {{ totalPreco.toFixed(2) }}</h1>
    <h2>{{ lengthCart }}</h2>
</template>

<script>
import Cabecalho from '@/components/Cabecalho.vue';
import api from '../http/api'
export default {
    name: 'carrinho',
    components: {Cabecalho},
    data(){
        return{
          pedido:[],
          lengthCart:{}
        }
    },
    methods:{
    pedidos(){
    const idUsers = localStorage.getItem('userID')
    api.get(`/produtopedido/${idUsers}`)
    .then(response => {
        this.pedido = response.data.Produtos
        this.lengthCart = response.data.Produtos.length
    })
      .catch(error => {
        console.error(error);
      });
  }
},
mounted(){
    this.pedidos();
    
},
computed:{
  totalPreco() {
    return this.pedido.reduce((total, ped) => total + parseFloat(ped.preco), 0);
    },
}
}
</script>