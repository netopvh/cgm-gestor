import Vue from 'vue'
import Vuex from 'Vuex'

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        item:{}
    },
    mutations:{
        setItem(state, obj){
            state.item = obj;
        }
    }
})