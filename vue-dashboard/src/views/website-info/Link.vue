<script setup lang="ts">
defineProps<{
  title: string;
  to: string;
}>();
</script>

<template>
  <RouterLink
    :to="to"
    class="block w-full px-4 py-2 cursor-pointer hover:bg-gray-100 hover:text-purple-700 focus:outline-none focus:ring-2"
  >
    {{ title }}
  </RouterLink>
</template>
