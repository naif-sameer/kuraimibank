<script setup lang="ts">
import { useI18n } from 'vue-i18n';
import { onMounted, ref } from 'vue';

import { SubCategoryType } from '@/types';

import SectionTitle from '@/components/SectionTitle.vue';
import Modal from '@/components/Modal.vue';
import Button from '@/components/form/Button.vue';

import Table from './Table.vue';
import ModalBody from './ModalBody.vue';
import { useSubCategoryStore } from '@/stores/sub-categories.store';

const { t } = useI18n();
let store = useSubCategoryStore();

// render data from store
onMounted(async () => {
  store.getSubCategories();
});

const createModal = ref(false);
const showCreateModal = () => {
  store.resetItem();

  createModal.value = true;
};

const addItem = () => {
  store.addSubCategory();

  // close the modal
  createModal.value = false;

  // reset item store data
  store.resetItem();
};

const editModal = ref(false);
const showEditModal = (data: SubCategoryType) => {
  editModal.value = true;

  // update store item data
  store.item.id = data.id;

  store.item.name = data.name;
  store.item.link = data.link;
  store.item.category_id = data.category_id;
  store.item.parent_category = data.parent_category;
  store.item.icon = data.icon;
};

const updateItem = () => {
  store.updateSubCategory();

  // close the modal
  editModal.value = false;
};
</script>

<template>
  <!-- title -->
  <SectionTitle class="flex justify-between">
    <span> {{ t('sub_categories.title') }} </span>

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
        :modal-title="t('sub_categories.title')"
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
        :modal-title="t('sub_categories.title')"
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
