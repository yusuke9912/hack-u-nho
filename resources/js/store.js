import Vue from 'vue'
import Vuex from 'vuex'
 
Vue.use(Vuex)
 
export default new Vuex.Store({
 
  // 共有するデータ
  state: {
    user: {
      id: null,
      auth : null,
      token: null,
    }
  },
  
  // ミューテーション
  // ※stateのデータ変更はミューテーションが行う
  mutations: {
    setUser(state, payload) {
      state.user = payload;
    }
  },
  
  // ゲッター
  getters: {
    getUser(state) {
      return state.user;
    }
  },
  
  // アクション
  actions: {
    setUser(context, payload) {
      context.commit('setUser', payload);
    }    
  }    
})