<template>
  <div class="border-t border-gray-200 pt-6">
    <h3 class="text-xl font-medium text-gray-800 mb-3">Try it out</h3>
    <div class="bg-gray-100 p-4 rounded-md">
      <div class="mb-3">
        <code class="text-blue-600 font-mono">https://api.gold-api.com/price/(symbol)</code>
      </div>
      <div class="flex items-center text-sm text-gray-600 mb-2">
        <span>Response Time: </span>
        <span class="ml-1 font-medium">99.160 ms</span>
      </div>
      <div class="bg-red-50 border-l-4 border-red-500 p-3">
        <div class="flex">
          <div class="flex-shrink-0 text-red-500">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
            </svg>
          </div>
          <div class="ml-3">
            <p class="text-sm text-red-700">Error: Request failed with status code 404</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>