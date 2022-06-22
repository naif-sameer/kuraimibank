<script setup lang="ts">
import { RouterView } from 'vue-router';

import Sidebar from '@/components/Sidebar.vue';
import Navbar from '@/components/Navbar.vue';
</script>

<template>
  <div class="lg:grid lg:auto-cols-fr grid-cols-12">
    <Sidebar class="col-span-3 lg:col-span-2" />

    <!-- main content -->
    <main class="col-span-9 lg:col-span-10">
      <Navbar />

      <div class="px-4 bg-gray-100 py-4 min-h-screen">
        <RouterView />
      </div>
    </main>
  </div>
</template>

<style>
/* import font awesome style */
@import '@/assets/font.min.css';

/* editor custom style */
.ck-editor__editable_inline {
  min-height: 10rem;
  max-height: 15rem;
  overflow-y: scroll;
}
</style>
