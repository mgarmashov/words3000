<template>
    <router-view></router-view>
</template>

<script>
  export default {
    name: "App",
    mounted() {
      console.log('Смонтирован App.vue')
      console.log(laroute.route('words-get'))
    }
  }
</script>

<style scoped>

</style>