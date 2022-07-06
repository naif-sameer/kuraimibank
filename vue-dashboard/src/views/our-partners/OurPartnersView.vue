<script setup lang="ts">
import { useI18n } from 'vue-i18n';
import { onMounted, ref } from 'vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

import { OurPartnerType } from '@/types';
import { useOurPartnerStore } from '@/stores/our-partners.store';

import SectionTitle from '@/components/SectionTitle.vue';
import Modal from '@/components/Modal.vue';
import Input from '@/components/form/Input.vue';
import Button from '@/components/form/Button.vue';
import DragDropImage from '@/components/DragDropImage.vue';
import Label from '@/components/form/Label.vue';

import Table from './Table.vue';

const { t } = useI18n();
let store = useOurPartnerStore();

// render data from store
// await store.getOurPartners();

const createModal = ref(false);
const showCreateModal = () => {
  store.resetItem();

  createModal.value = true;
};

const addOurPartner = () => {
  store.addOurPartner();

  // close the modal
  createModal.value = false;

  // reset item store data
  store.resetItem();
};

const editModal = ref(false);
const showEditModal = (data: OurPartnerType) => {
  editModal.value = true;

  // update store item data
  store.item = data;
};

const updateOurPartner = () => {
  store.updateOurPartner();

  // close the modal
  editModal.value = false;
};
</script>

<template>
  <!-- title -->
  <SectionTitle class="flex justify-between">
    <span> {{ t('our_partners.title') }} </span>

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
    <form class="space-y-4" @submit.prevent="addOurPartner">
      <Modal :open="createModal" :hide-modal="() => (createModal = false)" :modal-title="t('our_partners.title')">
        <template #body>
          <!------ ar title ------>
          <Input v-model="store.item.title.ar" type="text" :label="t('our_partners.arabic-title')" />

          <!------ en title ------>
          <Input v-model="store.item.title.en" type="text" :label="t('our_partners.english-title')" />

          <!------ arabic description ------>
          <div class="text-gray-800">
            <Label>{{ t('our_partners.arabic-description') }}</Label>
            <ckeditor :editor="ClassicEditor" v-model="store.item.description.ar" tag-name="textarea" />
          </div>

          <!------ english description ------>
          <div class="text-gray-800">
            <Label>{{ t('our_partners.english-description') }}</Label>
            <ckeditor :editor="ClassicEditor" v-model="store.item.description.en" tag-name="textarea" />
          </div>

          <hr />

          <!------ Drag and drop file ------>
          <div>
            <Label> {{ t('image') }}</Label>
            <DragDropImage v-model="store.item.image" />
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
    <form class="space-y-4" @submit.prevent="updateOurPartner">
      <Modal :open="editModal" :hide-modal="() => (editModal = false)" :modal-title="t('our_partners.title')">
        <template #body>
          <!------ ar title ------>
          <Input v-model="store.item.title.ar" type="text" :label="t('our_partners.arabic-title')" />

          <!------ en title ------>
          <Input v-model="store.item.title.en" type="text" :label="t('our_partners.english-title')" />

          <!------ arabic description ------>
          <div class="text-gray-800">
            <Label>{{ t('our_partners.arabic-description') }}</Label>
            <ckeditor :editor="ClassicEditor" v-model="store.item.description.ar" tag-name="textarea" />
          </div>

          <!------ english description ------>
          <div class="text-gray-800">
            <Label>{{ t('our_partners.english-description') }}</Label>
            <ckeditor :editor="ClassicEditor" v-model="store.item.description.en" tag-name="textarea" />
          </div>

          <hr />

          <!------ Drag and drop file ------>
          <div>
            <Label> {{ t('image') }}</Label>

            <DragDropImage v-model="store.item.image" />
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
