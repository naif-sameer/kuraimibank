<script setup>
import { useI18n } from 'vue-i18n';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

import Button from '@/components/form/Button.vue';
import Label from '@/components/form/Label.vue';
import Card from '@/components/Card.vue';
import { updateApplyForServiceData } from '@/api';
import SectionTitle from '@/components/SectionTitle.vue';
import { useWebsiteInfoStore } from '@/stores/website.store';

const { t } = useI18n();

const websiteStore = useWebsiteInfoStore();
</script>

<template>
  <!-- title -->
  <SectionTitle> {{ t('apply_for_service.title') }} </SectionTitle>

  <Card>
    <form class="space-y-8" @submit.prevent="updateApplyForServiceData(websiteStore.applyForService)">
      <!-- arabic section -->
      <div>
        <Label>{{ t('apply_for_service.arabic_title') }} </Label>

        <ckeditor :editor="ClassicEditor" v-model="websiteStore.applyForService.ar" tag-name="textarea" />
      </div>

      <!-- english section -->
      <div>
        <Label>{{ t('apply_for_service.english_title') }} </Label>

        <ckeditor :editor="ClassicEditor" v-model="websiteStore.applyForService.en" tag-name="textarea" />
      </div>

      <Button>{{ t('update') }} </Button>
    </form>
  </Card>
</template>
