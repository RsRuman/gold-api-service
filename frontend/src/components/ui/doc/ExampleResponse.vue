<template>
  <h3 class="text-xl font-medium text-gray-800 mb-2">Response</h3>
  <div class="border border-gray-200 rounded-md overflow-hidden mb-6">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
      <tr>
        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Field</th>
        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
      </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
      <tr>
        <td class="px-4 py-3 whitespace-nowrap text-sm font-mono text-gray-900">name</td>
        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">string</td>
        <td class="px-4 py-3 text-sm text-gray-500">The asset name</td>
      </tr>
      <tr>
        <td class="px-4 py-3 whitespace-nowrap text-sm font-mono text-gray-900">price</td>
        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">float</td>
        <td class="px-4 py-3 text-sm text-gray-500">The current price of the asset</td>
      </tr>
      <tr>
        <td class="px-4 py-3 whitespace-nowrap text-sm font-mono text-gray-900">symbol</td>
        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">string</td>
        <td class="px-4 py-3 text-sm text-gray-500">The trading symbol of the asset</td>
      </tr>
      <tr>
        <td class="px-4 py-3 whitespace-nowrap text-sm font-mono text-gray-900">updatedAt</td>
        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">string</td>
        <td class="px-4 py-3 text-sm text-gray-500">The timestamp of the latest update</td>
      </tr>
      <tr>
        <td class="px-4 py-3 whitespace-nowrap text-sm font-mono text-gray-900">updatedAtReadable</td>
        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">string</td>
        <td class="px-4 py-3 text-sm text-gray-500">A readable format of the update time</td>
      </tr>
      </tbody>
    </table>
  </div>
</template>