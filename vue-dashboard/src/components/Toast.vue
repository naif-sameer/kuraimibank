<script lang="ts" setup>
import { useToastStore } from '@/stores/toast.store';

const toastStore = useToastStore();
</script>

<template>
  <div class="flex flex-col-reverse fixed bottom-4 left-4 gap-4 w-80">
    <TransitionGroup name="fade">
      <template v-for="item in toastStore.items" :key="item.id">
        <section class="px-4 py-4 rounded-lg w-full bg-white shadow relative">
          <div class="flex justify-between gap-2">
            <!------ icon ------>
            <div
              class="mt-1 w-5 h-5 rounded-full flex items-center justify-center"
              :class="{
                'bg-purple-700 text-white': item.variant === 'primary',
                'bg-red-700 text-white': item.variant === 'danger',
                'bg-green-700 text-white': item.variant === 'success',
                'bg-orange-700 text-white': item.variant === 'warning',
              }"
            >
              <i class="fa fa-info text-xs" />
            </div>

            <!------ content ------>
            <div class="flex-1">
              <!------ header ------>
              <header class="w-full">
                <h3
                  class="text-lg"
                  :class="{
                    'text-purple-700': item.variant === 'primary',
                    'text-red-700': item.variant === 'danger',
                    'text-green-700': item.variant === 'success',
                    'text-orange-700': item.variant === 'warning',
                  }"
                >
                  <span class="capitalize"> {{ item.title ?? item.variant }} </span>
                </h3>
              </header>

              <!------ body ------>
              <div class="mt-2">
                <p class="text-gray-500 text-sm">{{ item.body }}</p>
              </div>
            </div>

            <!------ close btn ------>
            <div class="relative px-4">
              <button
                class="hover:text-red-500 hover:bg-red-50 transition-colors cursor-pointer absolute -top-2 -right-2 rounded-full"
                @click="toastStore.closeToast(item.id)"
              >
                <i class="fa fa-close py-2 px-4" />
              </button>
            </div>
          </div>
        </section>
      </template>
    </TransitionGroup>
  </div>
</template>

<style>
.fade-enter-active {
  transition: all 0.3s ease-out;
}

.fade-leave-active {
  transition: all 0.3s cubic-bezier(1, 0.5, 0.8, 1);
}

.fade-enter-from,
.fade-leave-to {
  transform: translateX(-20px);
  opacity: 0;
}
</style>
