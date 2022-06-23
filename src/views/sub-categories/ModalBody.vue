<script setup lang="ts">
import { onMounted, reactive } from 'vue';
import { useI18n } from 'vue-i18n';

import { SubCategoryType } from '@/types';
import { getCategoriesApi } from '@/api';

import Input from '@/components/form/Input.vue';
import Label from '@/components/form/Label.vue';
import DragDropImage from '@/components/DragDropImage.vue';
import Select from '@/components/form/Select.vue';

defineProps<{ item: SubCategoryType }>();

const { t } = useI18n();

const categoriesList = reactive([]);
const getCategoriesList = () => {
  getCategoriesApi().then((res) => {
    //@ts-ignore
    categoriesList.push(...res);
  });
};

onMounted(() => {
  getCategoriesList();
});
</script>

<template>
  <!------ ar name ------>
  <Input
    v-model="item.name.ar"
    type="text"
    :label="t('sub_categories.ar-name')"
  />

  <!------ en name ------>
  <Input
    v-model="item.name.en"
    type="text"
    :label="t('sub_categories.en-name')"
  />

  <hr />
  <Input v-model="item.link" type="url" :label="t('link')" />
  <hr />

  <!------ category id ------>
  <Select
    :label="t('categories.title')"
    v-model="item.category_id"
    :options="categoriesList"
  />

  <!------ Drag and drop file ------>
  <div>
    <Label> {{ t('icon') }}</Label>

    <DragDropImage v-model="item.icon" />
  </div>
</template>
