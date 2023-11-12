<template>
<Cabecalho />
<h1 class="titulo">Cadastra</h1>
<form class="formCadastro" @submit.stop.prevent="registro">
<label>Nome</label>
<input class="input" v-model="name" type="text" />

<label>email</label>
<input class="input" v-model="email" type="email" />

<label>Cidade</label>
<input class="input" v-model="cidade" type="text" />

<label>Estado</label>
<input class="input" v-model="estado" type="text" />

<label>Rua/Numero</label>
<input class="input" v-model="rua" type="text" />

<label>Telefone</label>
<input class="input" v-model="telefone" type="text" />

<label>Senha</label>
<input class="input"  v-model="password" type="password" />
<button class="btn" type="submit">Cadastra</button>
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
.titulo{
    text-align: center;
}
.formCadastro{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
.btn{
    margin-top: 9px;
    background-color: #ff7f00;
    color: #fff;
    padding: 10px;
    font-weight: bold;
    cursor: pointer;
    border: none;
    border-radius: 10px;
    margin-bottom: 10px;
    margin-left: 5px;
}
.btn:hover{
    box-shadow: 0 0 1em #ff7f00;
}
.input{
    border: none;
    border-bottom: 2px solid #ff7f00;
    padding: 5px;
    border-radius: 3px;
    background-color: rgb(236, 236, 236);
    width: 350px;
    }
    .input:focus{
    box-shadow: 0 0 1em #ff7f00;
    border: 1px solid #ff7f00;
    outline: 0;
}
</style>