<template>
<Cabecalho />
<h1>Registro</h1>
<form @submit.stop.prevent="registro">
<label>Nome</label>
<input v-model="name" type="text" />

<label>email</label>
<input v-model="email" type="email" /><br/>

<label>Cidade</label>
<input v-model="cidade" type="text" />

<label>Estado</label>
<input v-model="estado" type="text" /><br/>

<label>Rua/Numero</label>
<input v-model="rua" type="text" />

<label>Telefone</label>
<input v-model="telefone" type="text" /><br/>

<label>Senha</label>
<input  v-model="password" type="password" /><br/>
<button type="submit">Cadastra</button>
</form>

</template>

<script>
import Cabecalho from '../components/Cabecalho.vue';
import api from '@/http/api';

export default{
    components:{
        Cabecalho
    },
    data() {
    return {
        name: '',
        email: '',
        cidade: '',
        estado: '',
        rua: '',
        telefone: '',
        password: ''
    }
},
    methods:{
    registro(){
    api.post('/auth/registroAdm', 
    {email: this.email, password: this.password,
        name: this.name, cidade: this.cidade,
        estado: this.estado, rua: this.rua, 
        telefone: this.telefone
    })
    .then(response => {
        const salvar = response.data
        console.log(salvar)
        this.$router.push('/')})
      .catch(error => {
        console.error(error);
      });
  }
 }
}
</script>

<style scoped>
</style>