<script setup lang="ts">
const randomInputID = Math.floor(Math.random() * 1e8 * Date.now());

defineProps(['modelValue', 'label', 'required', 'accept']);

let emit = defineEmits(['update:modelValue']);

const updateValue = (event: any) => {
  emit('update:modelValue', event.target.files[0]);
};
</script>

<template>
  <div>
    <label class="text-gray-700" :for="`input-${randomInputID}-${label}`">
      {{ label }}
    </label>

    <input
      :accept="accept"
      @change="updateValue"
      :id="`input-${randomInputID}-${label}`"
      type="file"
      :required="required"
      class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring"
    />
  </div>
</template>
