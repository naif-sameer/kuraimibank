<script setup lang="ts">
import { MainServiceType } from '@/types';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import { useI18n } from 'vue-i18n';

import Input from '@/components/form/Input.vue';
import Label from '@/components/form/Label.vue';
import DragDropImage from '@/components/DragDropImage.vue';

defineProps<{ item: MainServiceType }>();

const { t } = useI18n();
</script>

<template>
  <!------ ar name ------>
  <Input
    v-model="item.name.ar"
    type="text"
    :label="t('main_services.ar-name')"
  />

  <!------ en name ------>
  <Input
    v-model="item.name.en"
    type="text"
    :label="t('main_services.en-name')"
  />

  <hr />

  <!------ link ------>
  <Input v-model="item.link" type="url" :label="t('link')" />

  <hr />

  <!------ Drag and drop file ------>
  <div>
    <Label> {{ t('image') }}</Label>

    <DragDropImage v-model="item.image" />
  </div>
</template>
