<template>
    <v-app id="inspire">
        <div v-if="$auth.ready()">
            <v-navigation-drawer
                    v-model="drawer"
                    fixed
                    app
            >
                <v-list dense>
                    <v-list-tile @click="">
                        <v-list-tile-action>
                            <v-icon>home</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>Home</v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile @click="">
                        <v-list-tile-action>
                            <v-icon>contact_mail</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>Contact</v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list>
            </v-navigation-drawer>

            <v-toolbar color="indigo" dark fixed app>
                <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
                <v-toolbar-title>Application1</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items class="hidden-sm-and-down">
                    <div v-if="$auth.check()">Авторизован {{$auth.user().email}}</div>
                    <div v-else>пусто</div>
                    <v-btn color="primary" @click="showModalLogin">Войти</v-btn>
                    <v-btn flat>Регистрация</v-btn>
                </v-toolbar-items>
            </v-toolbar>
            <modal-login></modal-login>
            <v-content>
                <v-container fluid fill-height>
                    <v-layout
                            justify-center
                            align-center
                    >
                        <v-flex text-xs-center>
                            <router-view></router-view>
                        </v-flex>
                    </v-layout>
                </v-container>
            </v-content>
            <v-footer color="indigo" app>
                <span class="white--text">&copy; 2017</span>
            </v-footer>
        </div>
        <div v-if="!$auth.ready()">
            <div class="text-xs-center" style="height: 90vh">
                <v-progress-circular
                        :size="100"
                        color="primary"
                        indeterminate
                        style="margin-top: 30%"
                ></v-progress-circular>
            </div>
        </div>
    </v-app>
</template>

<script>

  export default {
    name: "App",
    data: () => ({
      drawer: null
    }),
    props: {
      source: String
    },
    mounted() {
      console.log('Смонтирован App.vue')
      console.log(laroute.route('words-get'))
    },
    methods: {
      showModalLogin () {
        this.$store.dispatch('showModalLogin')
      }
    },
    created() {
      this.$auth.ready(function () {
        //
      })

    }
  }
</script>

<style scoped>

</style>