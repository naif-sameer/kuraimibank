<script setup>
import { useI18n } from 'vue-i18n';
import { onMounted, reactive } from 'vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

import { getValuesPrinciplesData, updateValuesPrinciplesData } from '@/api';

import Button from '@/components/form/Button.vue';
import Label from '@/components/form/Label.vue';
import Card from '@/components/Card.vue';
import SectionTitle from '@/components/SectionTitle.vue';

const { t } = useI18n();

let ValuesPrinciplesData = reactive({
  ar: '',
  en: '',
});

onMounted(() => {
  getValuesPrinciplesData().then((res) => {
    ValuesPrinciplesData.ar = JSON.parse(res).ar;
    ValuesPrinciplesData.en = JSON.parse(res).en;
  });
});
</script>

<template>
  <!-- title -->
  <SectionTitle> {{ t('values_principles.title') }} </SectionTitle>

  <Card>
    <form class="space-y-8" @submit.prevent="updateValuesPrinciplesData(ValuesPrinciplesData)">
      <!-- arabic section -->
      <div>
        <Label>{{ t('values_principles.arabic_title') }} </Label>

        <ckeditor :editor="ClassicEditor" v-model="ValuesPrinciplesData.ar" tag-name="textarea" />
      </div>

      <!-- english section -->
      <div>
        <Label>{{ t('values_principles.english_title') }} </Label>

        <ckeditor :editor="ClassicEditor" v-model="ValuesPrinciplesData.en" tag-name="textarea" />
      </div>

      <Button>{{ t('update') }} </Button>
    </form>
  </Card>
</template>
