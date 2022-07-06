<script setup lang="ts">
import { useI18n } from 'vue-i18n';
import { onMounted, ref } from 'vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

import SectionTitle from '@/components/SectionTitle.vue';
import Modal from '@/components/Modal.vue';
import Input from '@/components/form/Input.vue';
import Button from '@/components/form/Button.vue';

import { SocialMediaType } from '@/types';

import Table from './Table.vue';
import { useSocialMediaStore } from '@/stores/social-media.store';
import DragDropImage from '@/components/DragDropImage.vue';
import Label from '@/components/form/Label.vue';

const { t } = useI18n();
let store = useSocialMediaStore();

// render data from store
// await store.getSocialMedia();

const createModal = ref(false);
const showCreateModal = () => {
  store.resetItem();

  createModal.value = true;
};

const addSocialMedia = () => {
  store.addSocialMedia();

  // close the modal
  createModal.value = false;

  // reset item store data
  store.resetItem();
};

const editModal = ref(false);
const showEditModal = (data: SocialMediaType) => {
  editModal.value = true;

  // update store item data
  store.item = data;
};

const updateSocialMedia = () => {
  store.updateSocialMedia();

  // close the modal
  editModal.value = false;
};
</script>

<template>
  <!-- title -->
  <SectionTitle class="flex justify-between">
    <span> {{ t('social-media') }} </span>

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
    <form class="space-y-4" @submit.prevent="addSocialMedia">
      <Modal :open="createModal" :hide-modal="() => (createModal = false)" :modal-title="t('social-media')">
        <template #body>
          <!------ name ------>
          <Input v-model="store.item.name" type="text" :label="t('name')" />

          <!------ link ------>
          <Input v-model="store.item.link" type="url" :label="t('link')" />

          <hr />

          <!------ Drag and drop file ------>
          <div>
            <Label> {{ t('icon') }}</Label>
            <DragDropImage v-model="store.item.icon" />
          </div>
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
    <form class="space-y-4" @submit.prevent="updateSocialMedia">
      <Modal :open="editModal" :hide-modal="() => (editModal = false)" :modal-title="t('social-media')">
        <template #body>
          <!------ name ------>
          <Input v-model="store.item.name" type="text" :label="t('name')" />

          <!------ link ------>
          <Input v-model="store.item.link" type="url" :label="t('link')" />

          <hr />

          <!------ Drag and drop file ------>
          <div>
            <Label> {{ t('icon') }}</Label>

            <DragDropImage v-model="store.item.icon" />
          </div>
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
