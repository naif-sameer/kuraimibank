<script setup lang="ts">
import { onBeforeMount } from 'vue';
import { RouterView } from 'vue-router';

import { useServicePointStore } from '@/stores/service-points.store';
import { useCitiesStore } from '@/stores/cities.store';

const citiesStore = useCitiesStore();
let servicePointStore = useServicePointStore();

// render data from store
onBeforeMount(() => {
  servicePointStore.getServicePoints();
  citiesStore.getCities();
});
</script>

<template>
  <!-- content -->
  <div class="w-full overflow-hidden rounded-lg shadow-xs mb-8">
    <RouterView />
  </div>
</template>
