import Vue from 'vue'
import vuex from 'vuex'
import vuetify from 'vuetify'
// import App from './App'
// import store from './store'
import router from './router'
import ml from './lang/ml'
// import Vuetify from 'vuetify'
import App from './components/App'
// import 'vuetify/dist/vuetify.min.css'

require('./bootstrap')
window.Vue = require('vue')

Vue.use(vuetify)
Vue.component('login-modal', require('./components/loginModal'));

const app = new Vue({
  el: '#app',
  router,
  vuex,
  ml,
  render: h => h(App)
})
