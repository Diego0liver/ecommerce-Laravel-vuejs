import {createStore} from 'vuex';
import API from '../http/api';
const idUsers = localStorage.getItem('userID');

export default createStore({
    state:{
      produtos:[],
      pedidos:[]
    },
    mutations:{
      SET_DATA(state, data){
        state.produtos = data;
      },
      SET_PEDIDO(state, data){
        state.pedidos = data;
      },
    },
    getters:{
    },
    actions:{
         async getProdutos({commit}){
            try{
                const res = await API.get('/produtos')
                commit('SET_DATA', res.data)
            }catch(err){
                    console.log(err)
            }
         },
         async getCart({commit}){
          try{
            if(idUsers){
              const res = await API.get(`/produtopedido/${idUsers}`)
              commit('SET_PEDIDO', res.data.Produtos)}
          }catch(err){
                  console.log(err)
          }}},
    modules:{
    }
})