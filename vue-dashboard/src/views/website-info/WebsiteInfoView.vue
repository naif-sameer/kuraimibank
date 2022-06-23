<script setup lang="ts">
import { useI18n } from 'vue-i18n';

import SectionTitle from '@/components/SectionTitle.vue';

import AboutUs from './AboutUs.vue';
import ApplyForService from './ApplyForService.vue';
import ValuesPrinciples from './ValuesPrinciples.vue';
import StrategyStatement from './StrategyStatement.vue';
import BoardMembers from './BoardMembers.vue';
import ContactUs from './ContactUs.vue';
import { RouterLink } from 'vue-router';
import Link from './Link.vue';

const { t } = useI18n();
</script>

<template>
  <!-- title -->
  <SectionTitle> {{ t('website-info') }} </SectionTitle>

  <!-- content -->
  <div class="w-full overflow-hidden rounded-lg shadow-xs mb-8 space-y-6">
    <div
      class="flex font-medium text-gray-900 bg-white border border-gray-200 rounded-lg divide-x divide-gray-200 text-md"
    >
      <Link to="/about-us" title="about us"></Link>
      <Link to="/apply-fo-service" title="apply fo-service"></Link>
      <Link to="/values-principles" title="values principles"></Link>
      <Link to="/strategy-statement" title="strategy statement"></Link>
      <Link to="/board-members" title="board members"></Link>
      <Link to="/contact-us" title="contact us"></Link>
    </div>

    <router-view></router-view>
  </div>
</template>
