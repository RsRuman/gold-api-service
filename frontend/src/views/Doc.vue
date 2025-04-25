<script setup>
import Header from "@/components/ui/doc/Header.vue";
import ExampleEndpoint from "@/components/ui/doc/ExampleEndpoint.vue";
import ExampleResponse from "@/components/ui/doc/ExampleResponse.vue";
import Response from "@/components/ui/doc/Response.vue";

</script>

<template>
  <div class="container mx-auto px-4 py-8 max-w-4xl">
    <Header/>
    <section class="bg-white rounded-lg shadow-sm border border-gray-200 mb-8">
      <div class="p-6">
        <ExampleEndpoint/>
        <ExampleResponse/>
        <Response/>
      </div>
    </section>
  </div>
</template>

<style scoped>

</style>