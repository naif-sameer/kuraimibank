<script lang="ts" setup>
import { RouterLink } from 'vue-router';

type BreadcrumbsType = {
  items: Array<{
    text: string;
    href: string;
    disabled?: boolean;
  }>;
};

defineProps<BreadcrumbsType>();
</script>

<template>
  <div class="flex gap-2 items-center">
    <template v-for="(item, index) in items">
      <RouterLink v-if="!item.disabled" class="text-blue-500 hover:text-blue-600" :to="item.href">
        {{ item.text }}
      </RouterLink>

      <span v-else> {{ item.text }} </span>

      <!-- don't render it with the latest element -->
      <template v-if="items.length > 1 && index !== items.length - 1">
        <span class="text-gray-400"> / </span>
      </template>
    </template>
  </div>
</template>
