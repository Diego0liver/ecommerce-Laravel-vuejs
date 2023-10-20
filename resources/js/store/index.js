import {createStore} from 'vuex';
import API from '../http/api'

export default createStore({
    state:{
      data:[]
    },
    mutations:{
      SET_DATA(state, newData){
        state.data = newData;
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
         }
    },
    modules:{

    }
})