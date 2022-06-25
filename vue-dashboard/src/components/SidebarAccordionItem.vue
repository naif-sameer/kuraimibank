<script setup lang="ts">
import { ref, watch } from 'vue';
import { RouterLink, useLink } from 'vue-router';

let props = defineProps<{
  to: string;
  label: string;
  icon: string;
  items: Array<{ to: string; text: string; module: string }>;
  name?: string;
}>();

const { isActive } = useLink({ to: props.to });

const isOpen = ref(false);

// close accordion when route change
watch(isActive, () => (isOpen.value = isActive.value));
</script>

<template>
  <li>
    <div class="relative px-6 py-3">
      <span
        v-if="isActive"
        class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
        aria-hidden="true"
      />

      <div
        class="flex relative cursor-pointer items-center"
        @click.prevent="isOpen = !isOpen"
        :class="isActive ? 'text-gray-200' : 'text-gray-400'"
      >
        <i class="fa" :class="`fa-${icon}`"></i>

        <div class="ms-4 text-sm font-semibold">
          {{ label }}
        </div>

        <div class="absolute right-0 top-1/2 transform -translate-y-1/2 text-sm">
          {{ isOpen ? '&#9650;' : '&#9660;' }}
        </div>
      </div>
    </div>

    <Transition
      class="  "
      enter-active-class="duration-300 ease-out "
      enter-from-class="transform opacity-0 "
      enter-to-class="opacity-100"
      leave-active-class="duration-200 ease-in"
      leave-from-class="opacity-100"
      leave-to-class="transform opacity-0"
    >
      <div class="px-6 bg-gray-900" v-show="isOpen">
        <ul class="list-disc pl-[18px]">
          <li
            v-for="item in items"
            class="ps-4 duration-150 hover:text-gray-200 hover:marker:text-gray-200"
            :class="$route.meta.subModule === item.module ? 'marker:text-gray-200' : 'marker:text-gray-500'"
          >
            <RouterLink
              :class="$route.meta.subModule === item.module && 'text-gray-200 '"
              class="py-3 block capitalize"
              :to="item.to"
            >
              {{ item.text }}
            </RouterLink>
          </li>
        </ul>
      </div>
    </Transition>
  </li>
</template>
