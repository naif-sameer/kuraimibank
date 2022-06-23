<script setup>
import { useI18n } from 'vue-i18n';
import { onMounted, reactive } from 'vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

import Button from '@/components/form/Button.vue';
import Label from '@/components/form/Label.vue';
import Card from '@/components/Card.vue';
import { getAboutUs, updateAboutUs } from '@/api';

const { t } = useI18n();

let aboutUsData = reactive({
  ar: '',
  en: '',
});

onMounted(() => {
  getAboutUs().then((res) => {
    aboutUsData.ar = JSON.parse(res).ar;
    aboutUsData.en = JSON.parse(res).en;
  });
});
</script>

<template>
  <Card>
    <h3 class="text-xl mb-4">{{ t('about_us.title') }}</h3>
    <form class="space-y-8" @submit.prevent="updateAboutUs(aboutUsData)">
      <!-- arabic section -->
      <div>
        <Label>{{ t('about_us.arabic_title') }} </Label>

        <ckeditor
          :editor="ClassicEditor"
          v-model="aboutUsData.ar"
          tag-name="textarea"
        />
      </div>

      <!-- english section -->
      <div>
        <Label>{{ t('about_us.english_title') }} </Label>

        <ckeditor
          :editor="ClassicEditor"
          v-model="aboutUsData.en"
          tag-name="textarea"
        />
      </div>

      <Button>{{ t('update') }} </Button>
    </form>
  </Card>
</template>
