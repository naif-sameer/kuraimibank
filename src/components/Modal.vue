<script setup lang="ts">
interface IModalType {
  open: boolean;
  hideModal: () => void;
  modalTitle: string;
}

defineProps<IModalType>();
</script>

<template>
  <!-- Main modal -->
  <div
    tabindex="-1"
    aria-hidden="true"
    class="overflow-y-auto overflow-x-hidden w-screen h-screen fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full flex justify-center bg-gray-900/50 items-center"
    :class="{
      hidden: !open,
    }"
  >
    <!--  -->
    <div
      class="w-full h-full absolute top-0 left-0 -z-10"
      @click="hideModal"
    ></div>

    <div class="relative p-4 w-full max-w-2xl md:h-auto">
      <!------ modal content ------>
      <section class="relative bg-white rounded-lg shadow">
        <!------ modal header ------>
        <header class="flex justify-between items-start p-4 rounded-t border-b">
          <h3 class="text-xl font-semibold text-gray-900">
            {{ modalTitle }}
          </h3>
          <button
            type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
            @click="hideModal"
          >
            <div class="w-6 h-6">
              <i class="fa fa-close text-xl"></i>
            </div>
          </button>
        </header>

        <!------ modal body ------>
        <div class="p-6 space-y-6 text-white">
          <slot name="body" />
        </div>

        <!------ modal footer ------>
        <footer
          v-if="$slots.footer"
          class="flex items-center p-4 space-x-2 rounded-b border-t border-gray-200"
        >
          <slot name="footer" />
        </footer>
      </section>
    </div>
  </div>
</template>
