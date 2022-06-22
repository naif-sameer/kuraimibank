<script setup lang="ts">
import { NewsType } from '@/types';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import { useI18n } from 'vue-i18n';

import Input from '@/components/form/Input.vue';
import Label from '@/components/form/Label.vue';
import DragDropImage from '@/components/DragDropImage.vue';

defineProps<{ item: NewsType }>();

const { t } = useI18n();
</script>

<template>
  <!------ ar title ------>
  <Input
    v-model="item.title.ar"
    type="text"
    :label="t('financial_report.arabic-title')"
  />

  <!------ en title ------>
  <Input
    v-model="item.title.en"
    type="text"
    :label="t('financial_report.english-title')"
  />

  <hr />
  <!------ arabic description ------>
  <div class="text-gray-800">
    <Label>{{ t('financial_report.arabic-description') }}</Label>
    <ckeditor
      :editor="ClassicEditor"
      v-model="item.description.ar"
      tag-name="textarea"
    />
  </div>

  <!------ english description ------>
  <div class="text-gray-800">
    <Label>{{ t('financial_report.english-description') }}</Label>
    <ckeditor
      :editor="ClassicEditor"
      v-model="item.description.en"
      tag-name="textarea"
    />
  </div>

  <hr />

  <!------ Drag and drop file ------>
  <div>
    <Label> {{ t('image') }}</Label>

    <DragDropImage v-model="item.image" />
  </div>
</template>
