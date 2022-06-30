<script setup lang="ts">
import { RouterView } from 'vue-router';

import { useToastStore } from '@/stores/toast.store';

import Sidebar from '@/components/Sidebar.vue';
import Navbar from '@/components/Navbar.vue';
import Toast from '@/components/Toast.vue';
import Loading from '@/components/Loading.vue';

const toastStore = useToastStore();
</script>

<template>
  <div class="flex">
    <Sidebar class="w-72 min-w-[16rem]" />

    <!-- main content -->
    <main class="overflow-hidden w-full min-h-screen">
      <Navbar />

      <div class="px-4 bg-gray-100 py-4 min-h-full">
        <RouterView v-slot="{ Component }">
          <template v-if="Component">
            <Suspense>
              <!-- main content -->
              <component :is="Component"></component>

              <!-- loading state -->
              <template #fallback> <Loading /> </template>
            </Suspense>
          </template>
        </RouterView>
      </div>
    </main>
  </div>

  <Teleport to="#toast-container" :disabled="toastStore.items.length === 0"> <Toast /> </Teleport>
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

.dashboard {
  grid-template-columns: 16rem 1fr;
}
</style>
