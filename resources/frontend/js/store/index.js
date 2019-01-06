import Vue from 'vue'
import Vuex from 'vuex'
import Modals from './modals'
import Shared from './shared'
import Users from './users'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    Modals,
    Users,
    Shared
  }
})
