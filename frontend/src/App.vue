<script setup>
import { RouterView } from 'vue-router';
import Nav from './components/layout/Nav.vue';
</script>

<template>
  <Nav/>
  <main>
    <RouterView/>
  </main>
</template>

<style scoped>

</style>
