<script setup>

import CardItem from "@/components/ui/package/CardItem.vue";
import { ref } from 'vue';
import {useAuthStore} from "@/stores/auth.js";

const showKey = ref(false);
const showSecret = ref(false);

// Example secrets
const appKey = 'agag575745645646464645645645645645645664646464';
const appSecret = '464fsajdfkjsakdfjksjkldfjklsdjfkljsldkjflksjdfklsjdlk';

const auth = useAuthStore();

</script>

<template>
  <div class="container mx-auto px-4 py-8 max-w-4xl">
    <section class="bg-gray-50 flex items-center justify-center">
      <div class="p-6 rounded-xl shadow-lg bg-white w-full">
        <!-- Left Section -->
        <div class="bg-amber-50 flex flex-col p-2 rounded-2xl">
          <img class="w-28 h-28 rounded-full border-4 border-amber-700 object-cover" src="/default-profile.png" alt="Profile" />
          <h2 class="mt-4 text-xl text-amber-700 font-semibold">John Doe</h2>
          <button class="mt-4 px-4 py-2 bg-amber-700 hover:bg-amber-600 rounded-lg text-white text-sm font-medium w-28">Edit Profile</button>
        </div>

        <!-- Right Section -->
        <h3 class="text-lg text-amber-700 font-semibold mt-6">Secrets</h3>
        <div class="mt-4 space-y-4">

          <!-- App Key -->
          <div class="flex items-start justify-between bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
            <div class="text-sm text-gray-700 w-full">
              <p class="font-medium mb-1">APP Key:</p>
              <p class="break-all text-xs text-gray-600">
                {{ showKey ? appKey : '•••••••••••••••••••••••••••••••••••••••••••••' }}
              </p>
            </div>
            <button @click="showKey = !showKey" class="ml-4 text-xs text-amber-700 hover:text-amber-900 font-medium">
              {{ showKey ? 'Hide' : 'View' }}
            </button>
          </div>

          <!-- App Secret -->
          <div class="flex items-start justify-between bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
            <div class="text-sm text-gray-700 w-full">
              <p class="font-medium mb-1">APP Secret:</p>
              <p class="break-all text-xs text-gray-600">
                {{ showSecret ? appSecret : '•••••••••••••••••••••••••••••••••••••••••••••' }}
              </p>
            </div>
            <button @click="showSecret = !showSecret" class="ml-4 text-xs text-amber-700 hover:text-amber-900 font-medium">
              {{ showSecret ? 'Hide' : 'View' }}
            </button>
          </div>

        </div>

        <h3 class="text-lg text-amber-700 font-semibold mt-6">Current Subscription</h3>
        <div class="flex flex-wrap gap-2 mt-2">
          <CardItem/>
          <CardItem/>
        </div>

        <h3 class="text-lg text-amber-700 font-semibold mt-6 mb-2">Contact Information</h3>
        <ul class="text-gray-300 text-sm space-y-2">
          <li class="flex items-center gap-2">
            <svg class="w-4 h-4 text-amber-700" fill="currentColor" viewBox="0 0 24 24"><path d="M4 4h16v16H4V4zm1 2v12h14V6H5zm4 2h6v2H9V8z"/></svg>
            <span class="text-black">john.doe@example.com</span>
          </li>
          <li class="flex items-center gap-2">
            <svg class="w-4 h-4 text-amber-700" fill="currentColor" viewBox="0 0 24 24"><path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1.003 1.003 0 011.11-.21c1.21.49 2.53.76 3.88.76a1 1 0 011 1v3.5a1 1 0 01-1 1C7.82 21 2 15.18 2 8.5a1 1 0 011-1h3.5a1 1 0 011 1c0 1.35.27 2.67.76 3.88a1.003 1.003 0 01-.21 1.11l-2.2 2.2z"/></svg>
            <span class="text-black">+1 (555) 123-4567</span>
          </li>
          <li class="flex items-center gap-2">
            <svg class="w-4 h-4 text-amber-700" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 7 7 13 7 13s7-6 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5S13.38 11.5 12 11.5z"/></svg>
            <span class="text-black">San Francisco, CA</span>
          </li>
        </ul>
      </div>
    </section>
  </div>
</template>