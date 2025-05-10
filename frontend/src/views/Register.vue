<script setup>

</script>

<template>
  <div class="min-h-screen flex items-center justify-center px-4">
    <section class="bg-white rounded-xl shadow-lg p-8 w-full max-w-md">
      <form class="space-y-4" id="login-form">
        <h2 class="text-2xl font-bold text-center text-amber-700">Register</h2>
        <div>
          <label class="block text-sm font-medium text-gray-700">Full Name</label>
          <input type="text" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="John Doe"/>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="you@example.com"/>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Password</label>
          <input type="password" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="••••••••"/>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
          <input type="password" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="••••••••"/>
        </div>
        <button type="submit" class="w-full bg-amber-700 text-white hover:bg-amber-600 transition-colors py-2 px-4 rounded-lg font-semibold">
          Sign Up
        </button>
      </form>
    </section>
  </div>
</template>

<style scoped>

</style>