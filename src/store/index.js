import Vue from 'vue'
import Vuex from 'vuex'
import tab from '@/store/tab'

Vue.use(Vuex)

/* export default new Vuex.Store({
  state: {
  },
  getters: {
  },
  mutations: {
  },
  actions: {
  },
  modules: {
  }
}) */

const store = new Vuex.Store({
  modules: {
    tab
  },
})

export default store
