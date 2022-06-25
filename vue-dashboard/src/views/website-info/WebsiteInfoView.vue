<script setup lang="ts">
import { useI18n } from 'vue-i18n';

import SectionTitle from '@/components/SectionTitle.vue';

const { t } = useI18n();
</script>

<template>
  <!-- content -->
  <div class="w-full overflow-hidden rounded-lg shadow-xs mb-8 space-y-6">
    <router-view></router-view>
  </div>
</template>
