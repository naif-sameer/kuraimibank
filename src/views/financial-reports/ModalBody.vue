<script setup lang="ts">
import { FinancialReportType } from '@/types';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import { useI18n } from 'vue-i18n';

import Input from '@/components/form/Input.vue';
import Label from '@/components/form/Label.vue';
import InputFile from '@/components/form/InputFile.vue';

defineProps<{ item: FinancialReportType }>();

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

  <!------ pdf  file ------>
  <InputFile accept="application/pdf" :label="t('pdf')" v-model="item.pdf" />
</template>
