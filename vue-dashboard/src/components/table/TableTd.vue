<script lang="ts" setup>
defineProps<{ primary?: boolean; long?: boolean }>();
</script>

<template>
  <td class="px-4 py-3">
    <div
      v-if="!$slots.body"
      class="whitespace-nowrap"
      :class="{
        'font-semibold': primary,
        'max-w-[140px] dots overflow-hidden': long,
      }"
    >
      <slot />
    </div>

    <slot name="body"> </slot>
  </td>
</template>

<style>
.dots::after {
  content: '...';
}
</style>
