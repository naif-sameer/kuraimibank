<script setup lang="ts">
import { useI18n } from 'vue-i18n';

import { randomInputID } from '@/helpers/form';
import { CountriesType } from '@/types';

import Label from './Label.vue';

defineProps<{
  label: string;
  options: Array<CountriesType>;
  modelValue: any;
  readonly?: boolean;
}>();

const { locale, t } = useI18n();

let emit = defineEmits(['update:modelValue']);

const updateValue = (event: any) => {
  emit('update:modelValue', event.target.value);
  console.log('google');
};
</script>

<template>
  <div>
    <Label :for="randomInputID">{{ label }}</Label>

    <select
      :disabled="readonly"
      :id="randomInputID"
      @change="updateValue"
      class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring"
    >
      <option disabled :selected="modelValue === ''">
        {{ label }}
      </option>
      <template v-for="option in options" :key="option.id">
        <option :value="option.id" :selected="modelValue === option.id">
          {{ locale === 'en' ? option.title.en : option.title.ar }}
        </option>
      </template>
    </select>
  </div>
</template>
