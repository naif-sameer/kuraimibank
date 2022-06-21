<script setup lang="ts">
defineProps<{
  isActive: boolean;
}>();
</script>

<template>
  <label
    for="default-toggle"
    class="inline-flex relative items-center cursor-pointer"
  >
    <input :checked="isActive" type="checkbox" class="sr-only peer" />
    <div
      class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-purple-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-purple-600"
    ></div>
  </label>
</template>
