import Vue from 'vue'
import App from './App.vue'
import router from './router'
import './plugins/element.js'
// import axios from 'axios'
import store from './store'
// import http from './utils/request'

Vue.config.productionTip = false

// Vue.prototype.$axios = axios
// axios.defaults.baseURL = 'http://www.api.com/api'

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
