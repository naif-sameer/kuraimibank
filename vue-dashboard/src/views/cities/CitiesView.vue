<script setup lang="ts">
import { useI18n } from 'vue-i18n';

import { useCitiesStore } from '@/stores/cities.store';

import SectionTitle from '@/components/SectionTitle.vue';
import Modal from '@/components/Modal.vue';
import Input from '@/components/form/Input.vue';
import Button from '@/components/form/Button.vue';

import Table from './Table.vue';

const { t } = useI18n();
let citiesStore = useCitiesStore();

// render data from store
await citiesStore.getCities();
</script>

<template>
  <div>
    <!-- title -->
    <SectionTitle class="flex justify-between">
      <span> {{ t('cities.title') }} </span>

      <!-- <Button @click="showCreateModal" size="sm">{{ t('add') }}</Button> -->
    </SectionTitle>

    <!-- content -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-8">
      <!-- table content -->
      <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
          <Table />
        </div>
      </div>

      <!-- TODO pagination -->
      <!------ table pagination  ------>
      <!-- <TablePagination /> -->
    </div>

    <!------ edit modal ------>
    <Teleport to="#app-modal">
      <form class="space-y-4" @submit.prevent="citiesStore.updateCity">
        <Modal :open="citiesStore.editModal" :hide-modal="citiesStore.closeEditModal" :modal-title="t('cities.title')">
          <template #body>
            <!------ arabic name ------>
            <Input v-model="citiesStore.item.name.ar" type="text" :label="t('cities.arabic-name')" />

            <!------ english name ------>
            <Input v-model="citiesStore.item.name.en" type="text" :label="t('cities.english-name')" />
          </template>

          <template #footer>
            <Button type="submit"> {{ t('update') }} </Button>
          </template>
        </Modal>
      </form>
    </Teleport>
  </div>
</template>
