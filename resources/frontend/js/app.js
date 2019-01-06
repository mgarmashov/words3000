import Vue from 'vue'
import vuetify from 'vuetify'
import store from './store'
import router from './router'
import ml from './lang/ml'
import App from './components/App'
import axios from 'axios';
import VueAxios from 'vue-axios'
import VueAuth from '@websanova/vue-auth'

require('./bootstrap')
window.Vue = require('vue')

Vue.use(vuetify)
Vue.use(VueAxios, axios)
// axios.default.baseURL  = 'http://words3000.test/api';

Vue.router = router
Vue.use(VueAuth, {
  auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
  http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
  router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
  loginData: {url: 'api/auth/login', method: 'POST', redirect: '/', fetchUser: true},
  logoutData: {url: 'api/auth/logout', method: 'POST', redirect: '/', makeRequest: true},
  fetchData: {url: 'api/auth/me', method: 'POST', enabled: true},
  refreshData: {url: 'api/auth/refresh', method: 'POST', enabled: true, interval: 30}
});

Vue.component('modal-login', require('./components/ModalLogin'));

const app = new Vue({
  el: '#app',
  router,
  store,
  ml,
  render: h => h(App)
})

