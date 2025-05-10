<script setup>
import { ref } from 'vue';
import { RouterLink } from 'vue-router';

const isOpen = ref(false);
</script>

<template>
  <nav class="bg-yellow-600 text-white px-4 py-3">
    <div class="container mx-auto flex items-center justify-between">
      <div class="text-xl font-bold">MySite</div>
      <button @click="isOpen = !isOpen" class="md:hidden focus:outline-none">
        <!-- Hamburger Icon -->
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
      <ul class="hidden md:flex space-x-6">
        <li><RouterLink to="/docs" class="hover:underline">Doc</RouterLink></li>
        <li><RouterLink to="/services" class="hover:underline">Service</RouterLink></li>
        <li><RouterLink to="/about" class="hover:underline">About</RouterLink></li>
        <li><RouterLink to="/terms" class="hover:underline">Term</RouterLink></li>
        <li><RouterLink to="/packages" class="hover:underline">Package</RouterLink></li>
        <li><RouterLink to="/login" class="hover:underline">Login</RouterLink></li>
      </ul>
    </div>
    <!-- Mobile Menu -->
    <ul v-if="isOpen" class="md:hidden mt-3 space-y-2 px-4">
      <li><RouterLink to="/docs" class="block hover:underline">Doc</RouterLink></li>
      <li><RouterLink to="/services" class="block hover:underline">Service</RouterLink></li>
      <li><RouterLink to="/about" class="block hover:underline">About</RouterLink></li>
      <li><RouterLink to="/terms" class="block hover:underline">Term</RouterLink></li>
      <li><RouterLink to="/packages" class="block hover:underline">Package</RouterLink></li>
      <li><RouterLink to="/login" class="block hover:underline">Login</RouterLink></li>
    </ul>
  </nav>
</template>

<style scoped>

</style>