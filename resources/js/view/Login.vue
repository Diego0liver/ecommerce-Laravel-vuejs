<template>
    <Cabecalho/>
    <h3 class="desc">Faça login para ver seu carrinho de compras</h3>
    <form class="login" @submit.stop.prevent="logar">
    <label class="label">Email:</label>
    <input class="input" v-model="email" type="email" name="email"/>
    <label class="label">Password:</label>
    <input class="input" v-model="password" type="password" name="password"/>
    <button class="btnLog" type="submit">Logar</button>
    <RouterLink to="/reg">
        <p class="btnLog">Cadastro</p>
    </RouterLink>
    </form>
</template>

<script>
import api from '@/http/api'
import Cabecalho from '@/components/Cabecalho.vue'
import { RouterLink } from 'vue-router';
export default{
 name:'login',
 components:{
    Cabecalho,
    RouterLink
},
 data() {
    return {
        email: '',
        password: ''
    }
 },
 methods:{
    logar(){
    api.post('/auth/loginAdmin', {email: this.email, password: this.password})
    .then(response => {
        const tokenSalvo = response.data.token
        const idAuth = response.data.id
        localStorage.setItem('authToken', tokenSalvo)
        localStorage.setItem('userID', idAuth)
        this.$router.push('/')
    })
      .catch(error => {
        console.error(error);
      });
  }
 }
}
</script>

<style scoped>
.login{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-top: 20px;
}
.desc{
    text-align: center;
    margin-top: 20px;
}
.label{
    font-weight: bold;
    margin: 5px;
    background-color: #ff7f00;
    color: #fff;
    padding: 5px;
    border-radius: 10px;
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
.btnLog{
    margin-top: 9px;
    background-color: #ff7f00;
    color: #fff;
    padding: 10px;
    font-weight: bold;
    cursor: pointer;
    border: none;
    border-radius: 10px;
}
.btnLog:hover{
    box-shadow: 0 0 1em #ff7f00;
}
</style>