<script setup lang="ts">
import { useI18n } from 'vue-i18n';
import { onMounted, ref } from 'vue';

import SectionTitle from '@/components/SectionTitle.vue';
import Modal from '@/components/Modal.vue';
import Input from '@/components/form/Input.vue';
import Button from '@/components/form/Button.vue';

import Table from './Table.vue';
import { useCategoriesStore } from '@/stores/categories.store';

const { t } = useI18n();
let store = useCategoriesStore();
// render data from store

// await store.getCategories();

const createModal = ref(false);
const showCreateModal = () => {
  store.resetItem();

  createModal.value = true;
};

const addCategory = () => {
  store.addCategory();

  // close the modal
  createModal.value = false;

  // reset item store data
  store.resetItem();
};

const editModal = ref(false);
const showEditModal = (data: any) => {
  editModal.value = true;

  // update store item data
  store.item.name.ar = data.name.ar;
  store.item.name.en = data.name.en;
  store.item.id = data.id;
};

const updateCategory = () => {
  store.updateCategory();

  // close the modal
  editModal.value = false;
};
</script>

<template>
  <!-- title -->
  <SectionTitle class="flex justify-between">
    <span>
      {{ t('categories.title') }}
    </span>

    <Button @click="showCreateModal" size="sm">{{ t('add') }}</Button>
  </SectionTitle>

  <!-- content -->
  <div class="w-full overflow-hidden rounded-lg shadow-xs mb-8">
    <!-- table content -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <Table :showEditModal="showEditModal" />
      </div>
    </div>

    <!-- TODO pagination -->
    <!------ table pagination  ------>
    <!-- <TablePagination /> -->
  </div>

  <!------ create item modal ------>
  <Teleport to="#app-modal">
    <form class="space-y-4" @submit.prevent="addCategory">
      <Modal :open="createModal" :hide-modal="() => (createModal = false)" :modal-title="t('categories.title')">
        <template #body>
          <!------ arabic name ------>
          <Input v-model="store.item.name.ar" type="text" :label="t('categories.arabic-name')" />

          <!------ english name ------>
          <Input v-model="store.item.name.en" type="text" :label="t('categories.english-name')" />
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
    <form class="space-y-4" @submit.prevent="updateCategory">
      <Modal :open="editModal" :hide-modal="() => (editModal = false)" :modal-title="t('categories.title')">
        <template #body>
          <!------ arabic name ------>
          <Input v-model="store.item.name.ar" type="text" :label="t('categories.arabic-name')" />

          <!------ english name ------>
          <Input v-model="store.item.name.en" type="text" :label="t('categories.english-name')" />
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
