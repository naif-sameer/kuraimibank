<script setup lang="ts">
import { useI18n } from 'vue-i18n';
import { onMounted, ref } from 'vue';

import { MainServiceType } from '@/types';
import { useMainServiceStore } from '@/stores/main-services.store';

import SectionTitle from '@/components/SectionTitle.vue';
import Modal from '@/components/Modal.vue';
import Button from '@/components/form/Button.vue';

import Table from './Table.vue';
import ModalBody from './ModalBody.vue';

const { t } = useI18n();
let store = useMainServiceStore();

// render data from store
// await store.getMainServices();

const createModal = ref(false);
const showCreateModal = () => {
  store.resetItem();

  createModal.value = true;
};

const addItem = () => {
  store.addMainService();

  // close the modal
  createModal.value = false;

  // reset item store data
  store.resetItem();
};

const editModal = ref(false);
const showEditModal = (data: MainServiceType) => {
  editModal.value = true;

  // update store item data
  store.item = data;
};

const updateItem = () => {
  store.updateMainService();

  // close the modal
  editModal.value = false;
};
</script>

<template>
  <!-- title -->
  <SectionTitle class="flex justify-between">
    <span> {{ t('main_services.title') }} </span>

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
      <Modal :open="createModal" :hide-modal="() => (createModal = false)" :modal-title="t('main_services.title')">
        <template #body>
          <ModalBody :item="store.item" />
        </template>

        <template #footer>
          <Button type="submit">
            {{ t('add') }}
          </Button>
        </template>
      </Modal>
    </form>
  </Teleport>

  <!------ edit modal ------>
  <Teleport to="#app-modal">
    <form class="space-y-4" @submit.prevent="updateItem">
      <Modal :open="editModal" :hide-modal="() => (editModal = false)" :modal-title="t('main_services.title')">
        <template #body>
          <ModalBody :item="store.item" />
        </template>

        <template #footer>
          <Button type="submit">
            {{ t('update') }}
          </Button>
        </template>
      </Modal>
    </form>
  </Teleport>
</template>
