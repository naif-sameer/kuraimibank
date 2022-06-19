<script setup lang="ts">
import { RouterLink, useLink, useRoute } from 'vue-router';

let props = defineProps({
  to: {
    type: String,
    required: true,
  },
  text: String,
  icon: String,
});

const { isExactActive } = useLink({
  to: props.to,
});
</script>
<template>
  <li class="relative px-6 py-3">
    <RouterLink
      :to="to"
      class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
      active-class="text-gray-800 dark:text-gray-100"
    >
      <span
        v-if="isExactActive"
        class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
        aria-hidden="true"
      >
      </span>

      <i class="fa" :class="`fa-${icon}`"></i>

      <span class="ml-4">{{ text }}</span>
    </RouterLink>
  </li>
</template>
