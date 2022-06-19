<script setup>
import { useI18n } from 'vue-i18n';
import { onMounted, reactive } from 'vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

import Button from '@/components/form/Button.vue';
import Label from '@/components/form/Label.vue';
import Card from '@/components/Card.vue';
import { getStrategyStatementData, updateStrategyStatementData } from '@/api';

const { t } = useI18n();

let StrategyStatementData = reactive({
  ar: '',
  en: '',
});

onMounted(() => {
  getStrategyStatementData().then((res) => {
    StrategyStatementData.ar = JSON.parse(res).ar;
    StrategyStatementData.en = JSON.parse(res).en;
  });
});
</script>

<template>
  <Card>
    <h3 class="text-xl mb-4">{{ t('strategy_statement.title') }}</h3>
    <form
      class="space-y-8"
      @submit.prevent="updateStrategyStatementData(StrategyStatementData)"
    >
      <!-- arabic section -->
      <div>
        <Label>{{ t('strategy_statement.arabic_title') }} </Label>

        <ckeditor
          :editor="ClassicEditor"
          v-model="StrategyStatementData.ar"
          tag-name="textarea"
        />
      </div>

      <!-- english section -->
      <div>
        <Label>{{ t('strategy_statement.english_title') }} </Label>

        <ckeditor
          :editor="ClassicEditor"
          v-model="StrategyStatementData.en"
          tag-name="textarea"
        />
      </div>

      <Button>{{ t('update') }} </Button>
    </form>
  </Card>
</template>
