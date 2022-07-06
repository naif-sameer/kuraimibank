<script setup>
import { useI18n } from 'vue-i18n';
import { onMounted, reactive } from 'vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

import Button from '@/components/form/Button.vue';
import Label from '@/components/form/Label.vue';
import Card from '@/components/Card.vue';
import { getAboutUs, updateAboutUs } from '@/api';
import SectionTitle from '@/components/SectionTitle.vue';

const { t } = useI18n();

let aboutUsData = reactive({
  ar: '',
  en: '',
});

// render data from store
getAboutUs().then((res) => {
  aboutUsData.ar = res.ar;
  aboutUsData.en = res.en;
});
</script>

<template>
  <!-- title -->
  <SectionTitle class="flex justify-between"> {{ t('about_us.title') }} </SectionTitle>

  <Card>
    <form class="space-y-8" @submit.prevent="updateAboutUs(aboutUsData)">
      <!-- arabic section -->
      <div>
        <Label>{{ t('about_us.arabic_title') }} </Label>

        <ckeditor :editor="ClassicEditor" v-model="aboutUsData.ar" tag-name="textarea" />
      </div>

      <!-- english section -->
      <div>
        <Label>{{ t('about_us.english_title') }} </Label>

        <ckeditor :editor="ClassicEditor" v-model="aboutUsData.en" tag-name="textarea" />
      </div>

      <Button>{{ t('update') }} </Button>
    </form>
  </Card>
</template>
