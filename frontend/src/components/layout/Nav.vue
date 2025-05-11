<script setup>
import { ref, computed, watch } from 'vue';
import { RouterLink, useRouter, useRoute } from 'vue-router';
import { useAuthStore } from '@/stores/auth.js';
import { Toast } from '@/utils/toast.js';

const auth = useAuthStore();
const isOpen = ref(false);
const profileOpen = ref(false);

const router = useRouter();
const route = useRoute();   // get the current route
const isAuthenticated = computed(() => !!auth.token);

function signOut(event) {
  event.preventDefault();
  auth.logout();
  Toast.fire({
    icon: 'success',
    title: 'Sign out successful!',
  });
  router.push({ name: 'Login' });
}

watch(() => route.fullPath, () => {
  console.log(profileOpen.value)
  profileOpen.value = false;
});
</script>

<template>
  <nav class="bg-yellow-600 text-white px-4 py-3">
    <div class="container mx-auto flex items-center justify-between">

      <!-- Branding -->
      <div class="text-xl font-bold">MySite</div>

      <!-- Mobile Hamburger -->
      <button @click="isOpen = !isOpen" class="md:hidden focus:outline-none">
        <!-- svg here -->
      </button>

      <!-- Desktop Nav -->
      <ul class="hidden md:flex items-center space-x-6">

        <!-- public links -->
        <li><RouterLink to="/docs" class="hover:underline">Doc</RouterLink></li>
        <li><RouterLink to="/services" class="hover:underline">Service</RouterLink></li>
        <li><RouterLink to="/about" class="hover:underline">About</RouterLink></li>
        <li><RouterLink to="/terms" class="hover:underline">Term</RouterLink></li>
        <li><RouterLink to="/packages" class="hover:underline">Package</RouterLink></li>

        <!-- Login (only when NOT authenticated) -->
        <li v-if="!isAuthenticated">
          <RouterLink to="/login" class="hover:underline">Login</RouterLink>
        </li>

        <!-- Profile Dropdown (only when authenticated) -->
        <li v-if="isAuthenticated" class="relative" @click="profileOpen = !profileOpen">
          <button class="flex items-center space-x-2 focus:outline-none">
            <img src="/default-profile.png" alt="User" class="w-8 h-8 rounded-full border-2 border-white"/>
            <span class="text-sm">{{ auth.user?.name }}</span>
          </button>

          <div v-if="profileOpen" class="absolute right-0 mt-2 w-40 bg-white text-gray-800 rounded shadow z-50">
            <RouterLink to="/profile" class="block px-4 py-2 hover:bg-gray-100" @mouseout="profileOpen = !profileOpen">
              Profile
            </RouterLink>
            <RouterLink to="/login" class="block px-4 py-2 hover:bg-gray-100" @click.prevent="signOut">
              Sign Out
            </RouterLink>
          </div>
        </li>
      </ul>
    </div>

    <!-- Mobile Nav -->
    <ul v-if="isOpen" class="md:hidden mt-3 space-y-2 px-4">
      <!-- public -->
      <li><RouterLink to="/docs" class="block hover:underline">Doc</RouterLink></li>
      <li><RouterLink to="/services" class="block hover:underline">Service</RouterLink></li>
      <li><RouterLink to="/about" class="block hover:underline">About</RouterLink></li>
      <li><RouterLink to="/terms" class="block hover:underline">Term</RouterLink></li>
      <li><RouterLink to="/packages" class="block hover:underline">Package</RouterLink></li>

      <!-- mobile login / profile -->
      <li v-if="!isAuthenticated">
        <RouterLink to="/login" class="block hover:underline">Login</RouterLink>
      </li>
      <li v-else>
        <RouterLink to="/profile" class="block hover:underline">Profile</RouterLink>
      </li>
      <li v-if="isAuthenticated">
        <RouterLink to="/login" class="block hover:underline" @click.prevent="signOut">
          Sign Out
        </RouterLink>
      </li>
    </ul>
  </nav>
</template>
