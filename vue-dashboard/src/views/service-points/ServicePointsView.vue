<script setup lang="ts">
import { useI18n } from 'vue-i18n';
import { onMounted, ref } from 'vue';

import { ServicePointType } from '@/types';

import { useServicePointStore } from '@/stores/service-points.store';
import SectionTitle from '@/components/SectionTitle.vue';
import Modal from '@/components/Modal.vue';
import Button from '@/components/form/Button.vue';

import Table from './Table.vue';
import ModalBody from './ModalBody.vue';

// render data from store
onMounted(async () => {
  store.getServicePoints();
});

const { t } = useI18n();
let store = useServicePointStore();

const createModal = ref(false);
const showCreateModal = () => {
  store.resetItem();

  createModal.value = true;
};

const addItem = () => {
  store.addServicePoint();

  // close the modal
  createModal.value = false;

  // reset item store data
  store.resetItem();
};

const editModal = ref(false);
const showEditModal = (data: ServicePointType) => {
  editModal.value = true;

  // update store item data
  store.item.id = data.id;

  store.item.name = data.name;
  store.item.address = data.address;
  store.item.working_hours = data.working_hours;
  store.item.phone = data.phone;
  store.item.second_phone = data.second_phone;
  store.item.city_id = data.city_id;
};

const updateItem = () => {
  store.updateServicePoint();

  // close the modal
  editModal.value = false;
};
</script>

<template>
  <!-- title -->
  <SectionTitle class="flex justify-between">
    <span> {{ t('service_points.title') }} </span>

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
      <Modal
        :open="createModal"
        :hide-modal="() => (createModal = false)"
        :modal-title="t('service_points.title')"
      >
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
      <Modal
        :open="editModal"
        :hide-modal="() => (editModal = false)"
        :modal-title="t('service_points.title')"
      >
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
