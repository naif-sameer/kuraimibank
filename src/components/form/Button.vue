<script setup lang="ts">
type ButtonType = {
  size?: 'sm' | 'md';
};

defineProps<ButtonType>();
</script>

<template>
  <button
    class="rounded bg-green-600 text-green-50"
    :class="{
      'py-2 px-12': size === undefined,
      'py-1 px-6 text-sm': size === 'sm',
      'py-2 px-8 text-sm': size === 'md',
    }"
  >
    <slot />
  </button>
</template>
