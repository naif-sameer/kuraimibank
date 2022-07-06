<script setup lang="ts">
import { useI18n } from 'vue-i18n';
import { ref } from 'vue';

import { ServiceType } from '@/types';
import { useServiceStore } from '@/stores/services.store';

import SectionTitle from '@/components/SectionTitle.vue';
import Modal from '@/components/Modal.vue';
import Button from '@/components/form/Button.vue';

import Table from './Table.vue';
import ModalBody from './ModalBody.vue';

const { t } = useI18n();
let store = useServiceStore();

// render data from store
// await store.getServices();

const createModal = ref(false);
const showCreateModal = () => {
  store.resetItem();

  createModal.value = true;
};

const addItem = () => {
  store.addService();

  // close the modal
  createModal.value = false;

  // reset item store data
  store.resetItem();
};

const editModal = ref(false);
const showEditModal = (data: ServiceType) => {
  editModal.value = true;

  // update store item data
  store.item = data;
};

const updateItem = () => {
  store.updateService();

  // close the modal
  editModal.value = false;
};
</script>

<template>
  <!-- title -->
  <SectionTitle class="flex justify-between">
    <span> {{ t('services.title') }} </span>

    <Button @click="showCreateModal" size="sm">{{ t('add') }}</Button>
  </SectionTitle>

  <!-- content -->
  <div class="w-full overflow-hidden rounded-lg shadow-xs mb-8">
    <!-- table content -->

    <Table :showEditModal="showEditModal" />

    <!-- TODO pagination -->
    <!------ table pagination  ------>
    <!-- <TablePagination /> -->
  </div>

  <!------ create item modal ------>
  <Teleport to="#app-modal">
    <form class="space-y-4" @submit.prevent="addItem">
      <Modal :open="createModal" :hide-modal="() => (createModal = false)" :modal-title="t('services.title')">
        <template #body> <ModalBody :item="store.item" /> </template>

        <template #footer>
          <Button type="submit"> {{ t('add') }} </Button>
        </template>
      </Modal>
    </form>
  </Teleport>

  <!------ edit modal ------>
  <Teleport to="#app-modal">
    <form class="space-y-4" @submit.prevent="updateItem">
      <Modal :open="editModal" :hide-modal="() => (editModal = false)" :modal-title="t('services.title')">
        <template #body> <ModalBody :item="store.item" /> </template>

        <template #footer>
          <Button type="submit"> {{ t('update') }} </Button>
        </template>
      </Modal>
    </form>
  </Teleport>
</template>
