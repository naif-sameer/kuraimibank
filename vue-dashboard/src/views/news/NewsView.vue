<script setup lang="ts">
import { useI18n } from 'vue-i18n';
import { onMounted, ref } from 'vue';

import { NewsType } from '@/types';

import { useNewsStore } from '@/stores/news.store';
import SectionTitle from '@/components/SectionTitle.vue';
import Modal from '@/components/Modal.vue';
import Button from '@/components/form/Button.vue';

import Table from './Table.vue';
import ModalBody from './ModalBody.vue';

// render data from store
onMounted(async () => {
  store.getNews();
});

const { t } = useI18n();
let store = useNewsStore();

const createModal = ref(false);
const showCreateModal = () => {
  store.resetItem();

  createModal.value = true;
};

const addItem = () => {
  store.addNews();

  // close the modal
  createModal.value = false;

  // reset item store data
  store.resetItem();
};

const editModal = ref(false);
const showEditModal = (data: NewsType) => {
  editModal.value = true;

  // update store item data
  store.item.id = data.id;

  store.item.title = data.title;
  store.item.description = data.description;
  store.item.image = data.image;
};

const updateItem = () => {
  store.updateNews();

  // close the modal
  editModal.value = false;
};
</script>

<template>
  <!-- title -->
  <SectionTitle class="flex justify-between">
    <span> {{ t('news.title') }} </span>

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
        :modal-title="t('news.title')"
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
        :modal-title="t('news.title')"
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
