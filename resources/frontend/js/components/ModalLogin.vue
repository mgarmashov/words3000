<template>
    <v-layout row justify-center>
        <v-dialog v-model="modalLoginVisible" persistent max-width="600px" @keydown.esc="hideModalLogin">
            <v-card>
                <v-card-title>
                    <span class="headline">Login</span>
                </v-card-title>
                <v-card-text>
                    <v-container grid-list-md>
                        <v-layout wrap>
                            <v-form v-model="valid" ref="form" validation>
                                <v-flex xs12>
                                    <v-text-field
                                            prepend-icon="person"
                                            name="email"
                                            label="E-mail"
                                            type="text"
                                            v-model="email"
                                            required
                                            :rules="emailRules">
                                    </v-text-field>
                                </v-flex>
                                <v-flex xs12>
                                    <v-text-field
                                            id="password"
                                            prepend-icon="lock"
                                            name="password"
                                            label="Password"
                                            type="password"
                                            v-model="password"
                                            required
                                            :rules="passwordRules"
                                    ></v-text-field>
                                </v-flex>
                            </v-form>
                        </v-layout>
                    </v-container>
                    <small>*indicates required field</small>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                            color="blue darken-1"
                            flat
                            @click="hideModalLogin"
                    >Close</v-btn>
                    <v-btn
                            color="blue darken-1"
                            flat
                            @click="login"
                            :disabled="!valid"
                    >Login</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-layout>
</template>

<script>

  export default {
    name: 'ModalLogin',
    data () {
      return {
        email: 'mikhail.garmashov@gmail.com',
        password: 'moscow',
        valid: false,
        emailRules: [
          v => !!v || 'Email is required'
        ],
        passwordRules: [
          v => (v && v.length >= 3) || 'Password must be longer than 3 symbols'
        ]
      }
    },
    computed: {
      modalLoginVisible () {
        return this.$store.getters.modalLoginVisible
      }
    },
    methods: {
      hideModalLogin () {
        this.$store.dispatch('hideModalLogin')
      },
      login () {
        if (this.$refs.form.validate()) {
          let user = {
            email: this.email,
            password: this.password
          }
          // console.log(this.$auth)
          this.$store.dispatch('loginUser', {email: this.email, password: this.password, $auth: this.$auth})
            .then(() => {

              // this.$router.push('/')
              this.hideModalLogin()
            })
            .catch(err => console.log(err))
        }
      }
    },
    mounted() {

    },
  }
</script>