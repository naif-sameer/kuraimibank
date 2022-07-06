<script setup lang="ts">
import { useI18n } from 'vue-i18n';

const randomInputID = Math.floor(Math.random() * 1e8 * Date.now());

withDefaults(
  defineProps<{
    modelValue: string | number;
    label: string;
    type?: string;
    required?: boolean;
    readonly?: boolean;
    clearInput?: () => {};
  }>(),
  {
    type: 'text',
  }
);

let emit = defineEmits(['update:modelValue']);
const updateValue = (event: any) => {
  emit('update:modelValue', event.target.value);
};

const { locale } = useI18n();
</script>

<template>
  <div class="w-full">
    <label class="text-gray-700" :for="`input-${randomInputID}-${label}`">
      {{ label }}
    </label>

    <div class="relative">
      <input
        :value="modelValue"
        @input="updateValue"
        :id="`input-${randomInputID}-${label}`"
        :type="type"
        :placeholder="label"
        :required="required"
        :readonly="readonly"
        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring"
      />

      <i
        v-if="clearInput"
        @click="clearInput"
        class="fa fa-remove absolute top-1/2 transform -translate-y-1/2 py-2 px-4 hover:text-red-500 hover:bg-red-100 cursor-pointer transition-colors duration-75"
        :class="locale === 'en' ? 'right-0' : 'left-0'"
      />
    </div>
  </div>
</template>

<style>
input[type='time'] {
  display: inline-block;
  position: relative;
}

input[type='time']::-webkit-calendar-picker-indicator {
  background: transparent;
  color: transparent;
  width: auto;
  height: auto;
  cursor: pointer;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
}
</style>
