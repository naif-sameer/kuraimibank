<script setup lang="ts">
import { onMounted, reactive } from 'vue';
import { useI18n } from 'vue-i18n';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

import { ServiceType } from '@/types';

import Input from '@/components/form/Input.vue';
import Label from '@/components/form/Label.vue';
import DragDropImage from '@/components/DragDropImage.vue';
import Select from '@/components/form/Select.vue';

defineProps<{ item: ServiceType }>();

const { t } = useI18n();

const categoriesList = reactive<Array<any>>([]);
const getCategoriesList = () => {
  //@ts-ignore
  categoriesList.push({ id: 1, title: { ar: 'main', en: 'main' } } as any);
  categoriesList.push({ id: 2, title: { ar: 'main', en: 'main' } } as any);
  // TODO get categories from api
};

onMounted(() => {
  getCategoriesList();
});
</script>

<template>
  <!------ ar name ------>
  <Input v-model="item.title.ar" type="text" :label="t('services.ar-name')" />

  <!------ en name ------>
  <Input v-model="item.title.en" type="text" :label="t('services.en-name')" />

  <hr />
  <!------ arabic description ------>
  <div class="text-gray-800">
    <Label>{{ t('services.ar-description') }}</Label>
    <ckeditor :editor="ClassicEditor" v-model="item.description.ar" tag-name="textarea" />
  </div>

  <!------ english description ------>
  <div class="text-gray-800">
    <Label>{{ t('services.en-description') }}</Label>
    <ckeditor :editor="ClassicEditor" v-model="item.description.en" tag-name="textarea" />
  </div>

  <!------ arabic other_advantage ------>
  <div class="text-gray-800">
    <Label>{{ t('services.ar-other-advantage') }}</Label>
    <ckeditor :editor="ClassicEditor" v-model="item.other_advantage.ar" tag-name="textarea" />
  </div>

  <!------ english other_advantage ------>
  <div class="text-gray-800">
    <Label>{{ t('services.en-other-advantage') }}</Label>
    <ckeditor :editor="ClassicEditor" v-model="item.other_advantage.en" tag-name="textarea" />
  </div>

  <!------ arabic service_conditions ------>
  <div class="text-gray-800">
    <Label>{{ t('services.ar-service-condition') }}</Label>
    <ckeditor :editor="ClassicEditor" v-model="item.service_conditions.ar" tag-name="textarea" />
  </div>

  <!------ english service_conditions ------>
  <div class="text-gray-800">
    <Label>{{ t('services.en-service-condition') }}</Label>
    <ckeditor :editor="ClassicEditor" v-model="item.service_conditions.en" tag-name="textarea" />
  </div>
  <hr />

  <!------ category id ------>
  <Select :label="t('categories.title')" v-model="item.service_id" :options="categoriesList" />

  <!------ Drag and drop file ------>
  <div>
    <Label> {{ t('image') }}</Label>

    <DragDropImage v-model="item.image" />
  </div>
</template>
