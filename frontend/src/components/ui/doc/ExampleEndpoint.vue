<template>
  <h2 class="text-2xl font-semibold text-gray-800 mb-4">Get Price</h2>
  <p class="text-gray-600 mb-6">Retrieves the current price for a specific asset.</p>
  <h3 class="text-xl font-medium text-gray-800 mb-2">Endpoint</h3>
  <div class="bg-gray-100 p-3 rounded-md mb-6">
    <div class="flex items-center">
      <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs font-bold mr-3">GET</span>
      <code class="text-gray-800 font-mono">/price/(symbol)</code>
    </div>
  </div>
  <h3 class="text-xl font-medium text-gray-800 mb-2">Parameters</h3>

  <div class="border border-gray-200 rounded-md overflow-hidden mb-6">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
      <tr>
        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
      </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
      <tr>
        <td class="px-4 py-3 whitespace-nowrap text-sm font-mono text-gray-900">symbol</td>
        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">string</td>
        <td class="px-4 py-3 text-sm text-gray-500">The asset symbol (e.g., XAU for gold)</td>
      </tr>
      </tbody>
    </table>
  </div>
</template>