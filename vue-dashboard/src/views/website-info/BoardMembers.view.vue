<script setup>
import { useI18n } from 'vue-i18n';
import { onMounted, reactive } from 'vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

import { getBoardMembersData, updateBoardMembersData } from '@/api';

import Button from '@/components/form/Button.vue';
import Label from '@/components/form/Label.vue';
import Card from '@/components/Card.vue';
import SectionTitle from '@/components/SectionTitle.vue';

const { t } = useI18n();

let BoardMembersData = reactive({
  ar: '',
  en: '',
});

// render data from store
getBoardMembersData().then((res) => {
  BoardMembersData.ar = res.ar;
  BoardMembersData.en = res.en;
});
</script>

<template>
  <!-- title -->
  <SectionTitle> {{ t('board_members.title') }} </SectionTitle>

  <Card>
    <form class="space-y-8" @submit.prevent="updateBoardMembersData(BoardMembersData)">
      <!-- arabic section -->
      <div>
        <Label>{{ t('board_members.arabic_title') }} </Label>

        <ckeditor :editor="ClassicEditor" v-model="BoardMembersData.ar" tag-name="textarea" />
      </div>

      <!-- english section -->
      <div>
        <Label>{{ t('board_members.english_title') }} </Label>

        <ckeditor :editor="ClassicEditor" v-model="BoardMembersData.en" tag-name="textarea" />
      </div>

      <Button>{{ t('update') }} </Button>
    </form>
  </Card>
</template>
