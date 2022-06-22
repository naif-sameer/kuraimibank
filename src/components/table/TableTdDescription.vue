<script lang="ts" setup>
import { useI18n } from 'vue-i18n';

import TableTd from './TableTd.vue';

const { t, locale } = useI18n();

defineProps<{
  description: {
    ar: string;
    en: string;
  };
}>();
</script>

<template>
  <TableTd>
    <div class="flex">
      <div
        class="font-semibold flex max-w-[8rem] overflow-hidden whitespace-nowrap"
        v-html="locale === 'en' ? description.en : description.ar"
      ></div>
      <span> ... </span>
    </div>
  </TableTd>
</template>
