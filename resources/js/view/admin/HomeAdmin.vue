<template>
  <h1>DashBoard</h1>
  <h3>Adicionar produto</h3>
  <div>
    <form @submit.stop.prevent="addProduto">
        <label>Nome do produto</label>
        <input type="text" v-model="nome"/><br/>
     
        <label>Descricao do produto</label>
        <textarea type="text" v-model="descricao"></textarea><br/>

        <label>Categoria do produto</label>
        <!-- <select id="categoria" v-model="categoria" multiple>
        <option value="NoteBook">NoteBook</option>
        <option value="Pc">Pc</option>
        <option value="Acessorios">Acessorios</option>
        </select><br/> -->
        <input type="text" v-model="categoria"/><br/>

        <label>Imagem do produto</label>
        <input type="file" @change="fotoUpdat" /><br/>

        <label>Preco do produto</label>
        <input type="text" v-model="preco"/><br/>

        <input type="submit" value="Salvar"/>

    </form>
  </div>
</template>

<script>
import api from '@/http/api';
 export default{
    data(){
        return{
        nome: '',
        descricao: '',
        categoria: '',
        foto: null,
        preco: ''
    }
    },
    methods:{
     
    addProduto(event){
        api.post('/produtos', 
        {nome: this.nome, descricao: this.descricao,
            categoria: this.categoria, foto: this.foto = event.target.files[0],
            preco: this.preco
        })
        .then(response => {
            const salvar = response.data
            console.log(salvar)
            })
        .catch(error => {
            console.error(error);
        });
  }
 }
 }
</script>

<style scoped></style>