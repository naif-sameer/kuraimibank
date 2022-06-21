<script setup lang="ts">
import { useI18n } from 'vue-i18n';
import { onMounted, ref } from 'vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

import SectionTitle from '@/components/SectionTitle.vue';
import Modal from '@/components/Modal.vue';
import Input from '@/components/form/Input.vue';
import Button from '@/components/form/Button.vue';

import { useJobsStore } from '@/stores/jobs.store';
import { JobType } from '@/types';

import Table from './Table.vue';
import Label from '@/components/form/Label.vue';

// render data from store
onMounted(async () => {
  store.getJobs();
});

const { t } = useI18n();
let store = useJobsStore();

const createModal = ref(false);
const showCreateModal = () => {
  store.resetItem();

  createModal.value = true;
};

const addJob = () => {
  store.addJob();

  // close the modal
  createModal.value = false;

  // reset item store data
  store.resetItem();
};

const editModal = ref(false);
const showEditModal = (data: JobType) => {
  editModal.value = true;

  // update store item data
  store.item.title.ar = data.title.ar;
  store.item.title.en = data.title.en;

  store.item.description.ar = data.description.ar;
  store.item.description.en = data.description.en;
  store.item.id = data.id;
};

const updateJob = () => {
  store.updateJob();

  // close the modal
  editModal.value = false;
};
</script>

<template>
  <!-- title -->
  <SectionTitle class="flex justify-between">
    <span>
      {{ t('jobs.title') }}
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
    <form class="space-y-4" @submit.prevent="addJob">
      <Modal
        :open="createModal"
        :hide-modal="() => (createModal = false)"
        :modal-title="t('jobs.title')"
      >
        <template #body>
          <!------ arabic title ------>
          <Input
            v-model="store.item.title.ar"
            type="text"
            :label="t('jobs.arabic-title')"
          />

          <!------ english title ------>
          <Input
            v-model="store.item.title.en"
            type="text"
            :label="t('jobs.english-title')"
          />

          <hr />

          <!------ arabic description ------>
          <div class="text-gray-800">
            <Label>{{ t('jobs.arabic-description') }}</Label>
            <ckeditor
              :editor="ClassicEditor"
              v-model="store.item.description.ar"
              tag-name="textarea"
            />
          </div>

          <!------ english description ------>
          <div class="text-gray-800">
            <Label>{{ t('jobs.english-description') }}</Label>
            <ckeditor
              :editor="ClassicEditor"
              v-model="store.item.description.en"
              tag-name="textarea"
            />
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
    <form class="space-y-4" @submit.prevent="updateJob">
      <Modal
        :open="editModal"
        :hide-modal="() => (editModal = false)"
        :modal-title="t('jobs.title')"
      >
        <div>test</div>
        <template #body>
          <!------ arabic title ------>
          <Input
            v-model="store.item.title.ar"
            type="text"
            :label="t('jobs.arabic-title')"
          />

          <!------ english title ------>
          <Input
            v-model="store.item.title.en"
            type="text"
            :label="t('jobs.english-title')"
          />

          <hr />

          <!------ arabic description ------>
          <div class="text-gray-800">
            <Label>{{ t('jobs.arabic-description') }}</Label>
            <ckeditor
              :editor="ClassicEditor"
              v-model="store.item.description.ar"
              tag-name="textarea"
            />
          </div>

          <!------ english description ------>
          <div class="text-gray-800">
            <Label>{{ t('jobs.english-description') }}</Label>
            <ckeditor
              :editor="ClassicEditor"
              v-model="store.item.description.en"
              tag-name="textarea"
            />
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
