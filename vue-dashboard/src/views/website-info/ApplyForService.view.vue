<script setup>
import { useI18n } from 'vue-i18n';
import { onMounted, reactive } from 'vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

import Button from '@/components/form/Button.vue';
import Label from '@/components/form/Label.vue';
import Card from '@/components/Card.vue';
import { getApplyForServiceData, updateApplyForServiceData } from '@/api';
import SectionTitle from '@/components/SectionTitle.vue';

const { t } = useI18n();

let applyForServiceData = reactive({
  ar: '',
  en: '',
});

onMounted(() => {
  getApplyForServiceData().then((res) => {
    applyForServiceData.ar = JSON.parse(res).ar;
    applyForServiceData.en = JSON.parse(res).en;
  });
});
</script>

<template>
  <!-- title -->
  <SectionTitle> {{ t('apply_for_service.title') }} </SectionTitle>

  <Card>
    <form class="space-y-8" @submit.prevent="updateApplyForServiceData(applyForServiceData)">
      <!-- arabic section -->
      <div>
        <Label>{{ t('apply_for_service.arabic_title') }} </Label>

        <ckeditor :editor="ClassicEditor" v-model="applyForServiceData.ar" tag-name="textarea" />
      </div>

      <!-- english section -->
      <div>
        <Label>{{ t('apply_for_service.english_title') }} </Label>

        <ckeditor :editor="ClassicEditor" v-model="applyForServiceData.en" tag-name="textarea" />
      </div>

      <Button>{{ t('update') }} </Button>
    </form>
  </Card>
</template>
