<script setup lang="ts">
import { useI18n } from 'vue-i18n';
import SidebarItem from './SidebarItem.vue';

const { t } = useI18n();
</script>
<template>
  <aside class="hidden bg-white dark:bg-gray-800 lg:block min-h-screen">
    <div class="py-4 text-gray-500 dark:text-gray-400 sticky top-0">
      <a
        class="ms-6 text-lg font-bold text-gray-800 dark:text-gray-200"
        href="#"
      >
        {{ t('dashboard-title') }}
      </a>
      <ul class="mt-6 overflow-y-scroll snap-y max-h-[85vh] pb-28">
        <SidebarItem icon="home" :text="t('website-info')" to="/" />

        <SidebarItem
          icon="bank"
          :text="t('exchange-rates')"
          to="/exchange-rates"
        />

        <SidebarItem
          icon="map-marker-alt"
          :text="t('countries.title')"
          to="/countries"
        />

        <SidebarItem icon="city" :text="t('cities.title')" to="/cities" />

        <SidebarItem
          icon="swatchbook"
          :text="t('categories.title')"
          to="/categories"
        />

        <SidebarItem icon="toolbox" :text="t('jobs.title')" to="/jobs" />

        <SidebarItem
          icon="lock"
          :text="t('privacy_policy.title')"
          to="/privacy-policy"
        />

        <SidebarItem icon="link" :text="t('social-media')" to="/social-media" />

        <SidebarItem
          icon="user-group"
          :text="t('our_partners.title')"
          to="/our-partners"
        />

        <SidebarItem
          icon="square-poll-vertical"
          :text="t('financial-reports')"
          to="/financial-reports"
        />

        <SidebarItem icon="newspaper" :text="t('news.title')" to="/news" />

        <SidebarItem
          icon="map-location-dot"
          :text="t('service_points.title')"
          to="/service-points"
        />

        <SidebarItem
          icon="hand-holding-box"
          :text="t('main_services.title')"
          to="/main-services"
        />

        <SidebarItem
          icon="user-headset"
          :text="t('services.title')"
          to="/services"
        />
        <!--
          


        <SidebarItem icon="bank" :text="t('pages')" to="/pages" />





 -->

        <!-- <li class="relative px-6 py-3">
          <a
            class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
            href="/app/buttons"
          >
            <svg
              fill="none"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              viewBox="0 0 24 24"
              stroke="currentColor"
              class="w-5 h-5"
              aria-hidden="true"
            >
              <path
                d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"
              ></path>
            </svg>
            <span class="ml-4">Buttons</span>
          </a>
        </li>
        <li class="relative px-6 py-3">
          <a
            class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
            href="/app/modals"
          >
            <svg
              fill="none"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              viewBox="0 0 24 24"
              stroke="currentColor"
              class="w-5 h-5"
              aria-hidden="true"
            >
              <path
                d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"
              ></path>
            </svg>
            <span class="ml-4">Modals</span>
          </a>
        </li>
        <li class="relative px-6 py-3">
          <a
            class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
            href="/app/tables"
          >
            <svg
              fill="none"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              viewBox="0 0 24 24"
              stroke="currentColor"
              class="w-5 h-5"
              aria-hidden="true"
            >
              <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
            </svg>
            <span class="ml-4">Tables</span>
          </a>
        </li>
        <li class="relative px-6 py-3">
          <button
            class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
            aria-haspopup="true"
          >
            <span class="inline-flex items-center">
              <svg
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                viewBox="0 0 24 24"
                stroke="currentColor"
                class="w-5 h-5"
                aria-hidden="true"
              >
                <path
                  d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"
                ></path>
              </svg>
              <span class="ml-4">Pages</span></span
            >
            <svg
              fill="currentColor"
              viewBox="0 0 20 20"
              class="w-4 h-4"
              aria-hidden="true"
            >
              <path
                fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </button>
        </li> -->
      </ul>
    </div>
  </aside>
</template>

<style>
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
