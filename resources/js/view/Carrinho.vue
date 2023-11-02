<template>
 <Cabecalho />
    <h1>Ola a</h1>
     <ul v-for="ped in pedidos" :key="ped.id">
        <li>{{ ped.nome }}</li>
        <li>{{ ped.preco }}</li>
    </ul>
    <h1>Total: R$ {{ totalPreco.toFixed(2) }}</h1>
</template>

<script>
import Cabecalho from '@/components/Cabecalho.vue';
import { mapState, mapActions } from 'vuex';

export default {
    name: 'carrinho',
    components: {Cabecalho},
    methods:{
      ...mapActions(['getCart']),
},
mounted(){
  this.getCart();
  
},
computed:{
  totalPreco() {
    return this.pedidos.reduce((total, ped) => total + parseFloat(ped.preco), 0);
    },
    ...mapState(['pedidos'])
    
}
}
</script>