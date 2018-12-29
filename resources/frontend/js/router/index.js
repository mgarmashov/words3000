import Vue from 'vue'
import Router from 'vue-router'

import indexPage from '../components/indexPageComponent'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'index',
      component: indexPage
    }
  ],
  mode: 'history'
})
