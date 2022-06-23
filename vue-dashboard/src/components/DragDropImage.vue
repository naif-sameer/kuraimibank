<script setup lang="ts">
import { ref, watch } from 'vue';
import { useI18n } from 'vue-i18n';

let props = defineProps(['modelValue']);
let emit = defineEmits(['update:modelValue']);

const { t } = useI18n();

const inputRef = ref<HTMLInputElement | null>();

const imageSrc = ref('');

watch(
  () => props.modelValue,
  () => {
    // set imageSrc if modelValue from api
    if (typeof props.modelValue === 'string') imageSrc.value = props.modelValue;

    // console.log({ p: props.modelValue }, typeof props.modelValue);
  }
);

const changeInputFile = (event: any) => {
  let file;

  // drop
  if (event.type === 'drop') file = event.dataTransfer.files[0];
  // select
  else file = event.target.files[0];

  // set image to
  imageSrc.value = window.URL.createObjectURL(file);

  emit('update:modelValue', file);
};

const changeFile = () => inputRef.value?.click();
</script>

<template>
  <div class="max-w-xl" @dragover.prevent @drop.prevent @drop="changeInputFile">
    <input
      ref="inputRef"
      @change="changeInputFile"
      type="file"
      name="file_upload"
      class="hidden"
      accept="image/x-png,image/gif,image/jpeg"
    />

    <div
      @click="changeFile"
      class="border-2 border-gray-300 hover:border-gray-400 rounded-md border-dashed cursor-pointer"
    >
      <label
        v-if="!imageSrc"
        class="flex justify-center w-full h-72 px-4 transition bg-white rounded-md appearance-none focus:outline-none cursor-pointer"
      >
        <div class="flex items-center">
          <div class="space-y-4 text-center">
            <div>
              <i class="fa fa-cloud-arrow-up text-purple-800 text-5xl"></i>

              <h3 class="font-bold text-gray-800 text-xl">
                {{ t('drag-and-drop-here') }}
              </h3>
            </div>

            <div
              class="text-purple-600 px-4 py-2 bg-purple-100 w-fit mx-auto rounded"
            >
              {{ t('or-select-file') }}
            </div>
          </div>
        </div>
      </label>

      <div v-else class="border-gray-300">
        <img
          class="h-72 object-contain"
          :src="imageSrc"
          alt="image preview"
          width="600"
          height="300"
        />
      </div>
    </div>
  </div>
</template>
