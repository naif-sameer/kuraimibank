<script setup lang="ts">
import { useI18n } from 'vue-i18n';
import { onMounted, reactive, ref } from 'vue';

import { useCitiesStore } from '@/stores/cities.store';

import SectionTitle from '@/components/SectionTitle.vue';
import Modal from '@/components/Modal.vue';
import Input from '@/components/form/Input.vue';
import Button from '@/components/form/Button.vue';

import Table from './Table.vue';
import Select from '@/components/form/Select.vue';
import { getCountriesApi } from '@/api';

// render data from store
onMounted(async () => {
  store.getCities();

  getCountriesList();
});

const { t } = useI18n();
let store = useCitiesStore();

const createModal = ref(false);
const showCreateModal = () => {
  createModal.value = true;
};

const addCity = () => {
  store.addCity();

  // close the modal
  createModal.value = false;

  // reset item store data
  store.resetItem();
};

const editModal = ref(false);
const showEditModal = (data: any) => {
  editModal.value = true;

  // update store item data
  store.item.id = data.id;
  store.item.name.ar = data.name.ar;
  store.item.name.en = data.name.en;
  store.item.country_id = data.country_id;
};

const updateCity = () => {
  store.updateCity();

  // close the modal
  editModal.value = false;
};

const countriesList = reactive([]);
const getCountriesList = () => {
  getCountriesApi().then((res) => {
    //@ts-ignore
    countriesList.push(...res);
  });
};
</script>

<template>
  <!-- title -->
  <SectionTitle class="flex justify-between">
    <span>
      {{ t('cities.title') }}
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
    <form class="space-y-4" @submit.prevent="addCity">
      <Modal
        :open="createModal"
        :hide-modal="() => (createModal = false)"
        :modal-title="t('cities.title')"
      >
        <template #body>
          <!------ arabic name ------>
          <Input
            v-model="store.item.name.ar"
            type="text"
            :label="t('cities.arabic-name')"
          />

          <!------ english name ------>
          <Input
            v-model="store.item.name.en"
            type="text"
            :label="t('cities.english-name')"
          />

          <!------ country ------>
          <Select
            v-model="store.item.country_id"
            :label="t('country')"
            :options="countriesList"
          ></Select>
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
    <form class="space-y-4" @submit.prevent="updateCity">
      <Modal
        :open="editModal"
        :hide-modal="() => (editModal = false)"
        :modal-title="t('cities.title')"
      >
        <template #body>
          <!------ arabic name ------>
          <Input
            v-model="store.item.name.ar"
            type="text"
            :label="t('cities.arabic-name')"
          />

          <!------ english name ------>
          <Input
            v-model="store.item.name.en"
            type="text"
            :label="t('cities.english-name')"
          />

          <!------ country ------>
          <Select
            v-model="store.item.country_id"
            :label="t('country')"
            :options="countriesList"
          ></Select>
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
