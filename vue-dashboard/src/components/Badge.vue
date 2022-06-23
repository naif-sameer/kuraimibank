<script lang="ts" setup>
interface IBadge {
  type: 'primary' | 'danger' | 'success' | 'warning';
}
defineProps<IBadge>();
</script>

<template>
  <span
    class="inline-flex px-2 text-xs font-medium leading-5 rounded-full"
    :class="{
      'text-purple-700 bg-purple-100': type === 'primary',
      'text-red-700 bg-red-100': type === 'danger',
      'text-green-700 bg-green-100': type === 'success',
      'text-orange-700 bg-orange-100': type === 'warning',
    }"
  >
    <slot />
  </span>
</template>
