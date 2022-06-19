<script setup lang="ts">
import { useI18n } from 'vue-i18n';

import SectionTitle from '@/components/SectionTitle.vue';

import AboutUs from './AboutUs.vue';
import ApplyForService from './ApplyForService.vue';
import ValuesPrinciples from './ValuesPrinciples.vue';
import StrategyStatement from './StrategyStatement.vue';
import BoardMembers from './BoardMembers.vue';
import ContactUs from './ContactUs.vue';

const { t } = useI18n();
</script>

<template>
  <!-- title -->
  <SectionTitle> {{ t('website-info') }} </SectionTitle>

  <!-- content -->
  <div class="w-full overflow-hidden rounded-lg shadow-xs mb-8 space-y-6">
    <!-- about us -->
    <AboutUs />

    <!-- apply for service -->
    <ApplyForService />

    <!-- ValuesPrinciples -->
    <ValuesPrinciples />

    <!-- StrategyStatement -->
    <StrategyStatement />

    <!-- BoardMembers -->
    <BoardMembers />

    <!-- ContactUs -->
    <ContactUs />
  </div>
</template>
