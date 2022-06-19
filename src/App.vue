<script setup lang="ts">
import { useI18n } from 'vue-i18n';
import { RouterView, RouterLink } from 'vue-router';
import Sidebar from '@/components/Sidebar.vue';
import Navbar from '@/components/Navbar.vue';

let { t } = useI18n();
</script>

<template>
  <div class="flex justify-between">
    <Sidebar />

    <!-- main content -->
    <main class="w-full">
      <Navbar />

      <div class="px-4 bg-gray-100 py-4">
        <RouterView />
      </div>
    </main>
  </div>
</template>

<style>
/* import font awesome */
@import '@/assets/font.min.css';

.ck-editor__editable_inline {
  min-height: 10rem;
  max-height: 15rem;

  overflow-y: scroll;
}
</style>
