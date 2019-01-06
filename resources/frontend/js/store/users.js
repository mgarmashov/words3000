class User {
  constructor (token, is_admin, login, name, surname, email) {
    this.token = token,
    this.is_admin = is_admin,
    this.login = login,
    this.name = name,
    this.surname = surname,
    this.email = email
  }
}

export default {
  state: {
    user: null
  },
  mutations: {
    setUser (state, payload) {
      state.user = payload
    }
  },
  actions: {
    async registerUser ({commit}, {email, password}) {
      commit('clearError')
      commit('setLoading', true)
      try {
        const user = await firebase.auth().createUserWithEmailAndPassword(email, password)
        commit('setUser', new User(user.uid))
        commit('setLoading', false)
      } catch (error) {
        commit('setLoading', false)
        commit('setError', error.message)
        throw error
      }
    },
    async loginUser ({commit}, {email, password, $auth}) {
      commit('clearError')
      commit('setLoading', true)
      try {
        const userAuth = await $auth.login({
          params: {
            email: email,
            password: password
          },
          success: function () {},
          error: function () {},
          rememberMe: true,
          fetchUser: false,
        })
        // console.log(userAuth)
        const token = userAuth.data.access_token
        // console.log(token)
        // console.log($auth.fetch())
        await $auth.fetch().then((user) => {
          console.log(user)
          commit('setUser', new User({
            token,
            is_admin: user.data.is_admin,
            login: user.data.login,
            name: user.data.name,
            surname: user.data.surname,
            email: user.data.email
          }))
        })

        commit('setLoading', false)
        console.log($auth.check())
      } catch (error) {
        commit('setLoading', false)
        commit('setError', error.message)
        throw error
      }
    },
    autoLoginUser ({commit}, payload) {
      commit('setUser', new User(payload.uid))
    },
    logoutUser ({commit}) {
      this.$auth().logout()
      commit('setUser', null)
      this.$router.push('/')
    }

  },
  getters: {
    user (state) {
      return state.user
    },
    isUserLoggedIn (state) {
      return state.user !== null
    }
  }
}
