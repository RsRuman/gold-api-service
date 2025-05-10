<script setup>
import CardItem from "@/components/ui/package/CardItem.vue";
import PricingTable from "@/components/ui/package/PricingTable.vue";
</script>

<template>
  <div class="container mx-auto px-4 py-8 max-w-4xl">
    <PricingTable/>
    <div class="flex">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl w-full p-6">
        <CardItem/>
        <CardItem/>
        <CardItem/>
      </div>
    </div>
  </div>

</template>
