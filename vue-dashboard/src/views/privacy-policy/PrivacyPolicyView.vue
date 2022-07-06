<script setup lang="ts">
import { useI18n } from 'vue-i18n';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

import SectionTitle from '@/components/SectionTitle.vue';
import Input from '@/components/form/Input.vue';
import Button from '@/components/form/Button.vue';

import { usePrivacyPolicyStore } from '@/stores/privacy-policy.store';

import Label from '@/components/form/Label.vue';
import Card from '@/components/Card.vue';

const { t } = useI18n();
let store = usePrivacyPolicyStore();
</script>

<template>
  <!-- title -->
  <SectionTitle class="flex justify-between"> {{ t('privacy_policy.title') }} </SectionTitle>

  <!-- content -->
  <Card>
    <form class="space-y-8" @submit.prevent="store.updatePrivacyPolicy">
      <div class="space-y-4">
        <!------ arabic title ------>
        <Input v-model="store.item.title.ar" type="text" :label="t('privacy_policy.arabic-title')" />

        <!------ english title ------>
        <Input v-model="store.item.title.en" type="text" :label="t('privacy_policy.english-title')" />
      </div>

      <div class="space-y-4">
        <!------ arabic sub_title ------>
        <Input v-model="store.item.sub_title.ar" type="text" :label="t('privacy_policy.arabic-sub_title')" />

        <!------ english sub_title ------>
        <Input v-model="store.item.sub_title.en" type="text" :label="t('privacy_policy.english-sub_title')" />
      </div>

      <div class="space-y-4 text-gray-800">
        <!------ arabic description ------>
        <div>
          <Label>{{ t('privacy_policy.arabic-description') }}</Label>
          <ckeditor :editor="ClassicEditor" v-model="store.item.description.ar" tag-name="textarea" />
        </div>

        <!------ english description ------>
        <div>
          <Label>{{ t('privacy_policy.english-description') }}</Label>
          <ckeditor :editor="ClassicEditor" v-model="store.item.description.en" tag-name="textarea" />
        </div>
      </div>

      <Button type="submit">
        {{ t('update') }}
      </Button>
    </form>
  </Card>
</template>
