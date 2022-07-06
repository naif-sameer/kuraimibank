<script setup>
import { useI18n } from 'vue-i18n';
import { onMounted, reactive } from 'vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

import Button from '@/components/form/Button.vue';
import Label from '@/components/form/Label.vue';
import Card from '@/components/Card.vue';
import { getStrategyStatementData, updateStrategyStatementData } from '@/api';
import SectionTitle from '@/components/SectionTitle.vue';

const { t } = useI18n();

let StrategyStatementData = reactive({
  ar: '',
  en: '',
});

// render data from store
getStrategyStatementData().then((res) => {
  StrategyStatementData.ar = res.ar;
  StrategyStatementData.en = res.en;
});
</script>

<template>
  <!-- title -->
  <SectionTitle> {{ t('strategy_statement.title') }} </SectionTitle>

  <Card>
    <form class="space-y-8" @submit.prevent="updateStrategyStatementData(StrategyStatementData)">
      <!-- arabic section -->
      <div>
        <Label>{{ t('strategy_statement.arabic_title') }} </Label>

        <ckeditor :editor="ClassicEditor" v-model="StrategyStatementData.ar" tag-name="textarea" />
      </div>

      <!-- english section -->
      <div>
        <Label>{{ t('strategy_statement.english_title') }} </Label>

        <ckeditor :editor="ClassicEditor" v-model="StrategyStatementData.en" tag-name="textarea" />
      </div>

      <Button>{{ t('update') }} </Button>
    </form>
  </Card>
</template>
