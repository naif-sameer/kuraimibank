<script setup lang="ts">
import { useI18n } from 'vue-i18n';

import { dateFormat } from '@/helpers/dateFormat';
import { useNewsStore } from '@/stores/news.store';

import Switch from '@/components/form/Switch.vue';
import Badge from '@/components/Badge.vue';
import TableTd from '@/components/table/TableTd.vue';
import TableTdDescription from '@/components/table/TableTdDescription.vue';

let store = useNewsStore();

defineProps<{
  showEditModal: any;
}>();

const { t, locale } = useI18n();
</script>

<template>
  <div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <!------ table head ------>
        <thead class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
          <tr>
            <TableTd> {{ t('image') }} </TableTd>
            <TableTd> {{ t('title') }} </TableTd>
            <TableTd> {{ t('description') }} </TableTd>

            <TableTd>{{ t('status') }}</TableTd>
            <TableTd>{{ t('updated-date') }}</TableTd>
            <TableTd>{{ t('action') }}</TableTd>
          </tr>
        </thead>

        <!------ table body ------>
        <tbody class="bg-white divide-y text-gray-700">
          <tr v-for="item in store.items">
            <TableTd>
              <div>
                <img
                  class="rounded-full p-2 object-cover object-center w-16 h-16"
                  :src="item.image"
                  alt="social media icon"
                  width="60"
                  height="60"
                />
              </div>
            </TableTd>

            <TableTd>
              <span class="font-semibold">
                {{ locale === 'en' ? item.title.en : item.title.ar }}
              </span>
            </TableTd>

            <TableTdDescription :description="item.description" />

            <TableTd class="w-36">
              <Badge v-if="item.is_active" type="primary"> {{ t('active') }}</Badge>
              <Badge v-else type="danger"> {{ t('not-active') }}</Badge>
            </TableTd>

            <TableTd>
              <span class="text-sm">{{ dateFormat(item.updated_at) }}</span>
            </TableTd>

            <TableTd>
              <div class="gap-3 flex">
                <!-- edit modal button -->
                <i @click="showEditModal(item)" class="fa fa-edit cursor-pointer text-purple-600"></i>

                <!-- active toggle button -->
                <Switch :is-active="item.is_active" @click="store.activeToggle(item.id, item.is_active)" />
              </div>
            </TableTd>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
