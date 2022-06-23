<script setup lang="ts">
import { ref } from 'vue';

let props = defineProps<{
  label: string;
  isOpen?: boolean;
}>();

const detailsOpen = ref(props.isOpen || false);
</script>

<template>
  <details :open="detailsOpen" @click="detailsOpen = !detailsOpen">
    <summary>{{ label }}</summary>

    <div class="ps-4 flex flex-col">
      <slot />
    </div>
  </details>
</template>

<style scoped>
summary {
  list-style: none;

  font-family: 'Font Awesome 6 Pro';
  font-family: var(--fa-style-family, 'Font Awesome 6 Pro');
  font-weight: 900;
  font-weight: var(--fa-style, 900);

  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  display: inline-block;
  display: var(--fa-display, inline-block);
  font-style: normal;
  font-variant: normal;
  text-rendering: auto;
}

summary::before {
  content: '\f015';
  margin-right: 16px;
}
summary::-webkit-details-marker {
  display: none;
}
</style>
