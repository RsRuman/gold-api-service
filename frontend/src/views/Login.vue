<script setup>
import { useAuthStore } from '@/stores/auth.js';
import { ref } from 'vue';
import { Toast } from '@/utils/toast.js';

const auth = useAuthStore();

const email = ref('');
const password = ref('');

const login = async () => {
  const credentials = {
    email: email.value,
    password: password.value,
  };

  try {
    await auth.login(credentials);
    await auth.getUser();

    Toast.fire({
      icon: 'success',
      title: 'Login successful!',
    });

    console.log('Logged in user:', auth.user);
  } catch (error) {
    const message = error?.response?.data?.message || 'Login failed. Please try again.';

    Toast.fire({
      icon: 'error',
      title: message,
    });
  }
};
</script>

<template>
  <div class="min-h-screen flex items-center justify-center px-4">
    <section class="bg-white rounded-xl shadow-lg p-8 w-full max-w-md">
      <form class="space-y-4" id="login-form" @submit.prevent="login">
        <h2 class="text-2xl font-bold text-center text-amber-700">Login</h2>

        <div>
          <label class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" v-model="email" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="you@example.com"/>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Password</label>
          <input type="password" v-model="password" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="••••••••"/>
        </div>

        <button type="submit" class="w-full bg-amber-700 text-white hover:bg-amber-600 transition-colors py-2 px-4 rounded-lg font-semibold">
          Login
        </button>
      </form>

      <div class="text-sm text-center text-gray-600 mt-2">
        <span>Don't have an account?</span>
        <a class="text-blue-600 hover:underline font-semibold ml-1" href="/register">Sign Up</a>
      </div>
    </section>
  </div>
</template>