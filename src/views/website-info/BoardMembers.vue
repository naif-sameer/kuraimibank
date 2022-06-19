<script setup>
import { useI18n } from 'vue-i18n';
import { onMounted, reactive } from 'vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

import Button from '@/components/form/Button.vue';
import Label from '@/components/form/Label.vue';
import Card from '@/components/Card.vue';
import { getBoardMembersData, updateBoardMembersData } from '@/api';

const { t } = useI18n();

let BoardMembersData = reactive({
  ar: '',
  en: '',
});

onMounted(() => {
  getBoardMembersData().then((res) => {
    BoardMembersData.ar = JSON.parse(res).ar;
    BoardMembersData.en = JSON.parse(res).en;
  });
});
</script>

<template>
  <Card>
    <h3 class="text-xl mb-4">{{ t('board_members.title') }}</h3>
    <form
      class="space-y-8"
      @submit.prevent="updateBoardMembersData(BoardMembersData)"
    >
      <!-- arabic section -->
      <div>
        <Label>{{ t('board_members.arabic_title') }} </Label>

        <ckeditor
          :editor="ClassicEditor"
          v-model="BoardMembersData.ar"
          tag-name="textarea"
        />
      </div>

      <!-- english section -->
      <div>
        <Label>{{ t('board_members.english_title') }} </Label>

        <ckeditor
          :editor="ClassicEditor"
          v-model="BoardMembersData.en"
          tag-name="textarea"
        />
      </div>

      <Button>{{ t('update') }} </Button>
    </form>
  </Card>
</template>
