<template>
  <div id="app">
    <TheNavigation/>
    <Header/>
    <router-view/>
    <Footer/>
  </div>
</template>

<script>
// @ is an alias to /src
import TheNavigation from '@/components/TheNavigation'
import Header from '@/components/Layouts/Header.vue'
import Footer from '@/components/Layouts/Footer.vue'

export default {
  name: 'App',
  components: {
    Header,
    TheNavigation,
    Footer
  }
}
</script>

<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
}
</style>
