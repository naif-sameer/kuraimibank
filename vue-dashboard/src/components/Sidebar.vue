<script setup lang="ts">
import { useI18n } from 'vue-i18n';
import SidebarItem from './SidebarItem.vue';
import SidebarAccordionItem from './SidebarAccordionItem.vue';

const { t } = useI18n();

const websiteInfoList: Array<{ to: string; text: string; module: string }> = [
  {
    to: '/',
    text: 'about us',
    module: 'about-us',
  },
  {
    to: '/apply-for-service',
    text: 'apply-for-service',
    module: 'apply-for-service',
  },
  {
    to: '/values-principles',
    text: 'values-principles',
    module: 'values-principles',
  },
  {
    to: '/strategy-statement',
    text: 'strategy-statement',
    module: 'strategy-statement',
  },
  {
    to: '/board-members',
    text: 'board-members',
    module: 'board-members',
  },
  {
    to: '/contact-us',
    text: 'contact-us',
    module: 'contact-us',
  },
  {
    to: '/privacy-policy',
    text: t('privacy_policy.title'),
    module: 'privacy-policy',
  },
  {
    to: '/social-media',
    text: t('social-media'),
    module: 'social-media',
  },
];
</script>
<template>
  <aside class="hidden bg-white dark:bg-gray-800 lg:block min-h-screen">
    <div class="py-4 text-gray-500 dark:text-gray-400 sticky top-0">
      <a class="ms-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
        {{ t('dashboard-title') }}
      </a>
      <ul class="mt-6 overflow-y-scroll snap-y max-h-[85vh] pb-28">
        <SidebarAccordionItem :items="websiteInfoList" icon="home" to="/" :label="t('website-info')" />

        <SidebarItem icon="bank" :text="t('exchange-rates')" to="/exchange-rates" />

        <SidebarItem icon="map-marker-alt" :text="t('countries.title')" to="/countries" />

        <SidebarItem icon="city" :text="t('cities.title')" to="/cities" />

        <SidebarItem icon="toolbox" :text="t('jobs.title')" to="/jobs" />

        <SidebarItem icon="user-group" :text="t('our_partners.title')" to="/our-partners" />

        <SidebarItem icon="square-poll-vertical" :text="t('financial-reports')" to="/financial-reports" />

        <SidebarItem icon="newspaper" :text="t('news.title')" to="/news" />

        <SidebarItem icon="map-location-dot" :text="t('service_points.title')" to="/service-points" />

        <SidebarItem icon="user-headset" :text="t('services.title')" to="/services" />

        <!-- <SidebarItem icon="bank" :text="t('pages')" to="/pages" />      -->
      </ul>
    </div>
  </aside>
</template>

<style>
/***** scrollbar style *******/
/* width */
ul::-webkit-scrollbar {
  width: 0px;
  height: 0px;
}

/* Track */
ul::-webkit-scrollbar-track {
  background: #edf2f7;
}

/* Handle */
ul::-webkit-scrollbar-thumb {
  background: #cbd5e0;
  /* border-radius: 100vh; */
  /* border: 3px solid #edf2f7; */
}

/* Handle on hover */
ul::-webkit-scrollbar-thumb:hover {
  background: #a0aec0;
}
</style>
