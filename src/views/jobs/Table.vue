<script setup lang="ts">
import { useI18n } from 'vue-i18n';

import { dateFormat } from '@/helpers/dateFormat';
import { useJobsStore } from '@/stores/jobs.store';

import Switch from '@/components/form/Switch.vue';
import Badge from '@/components/Badge.vue';
import TableTd from '@/components/table/TableTd.vue';

let store = useJobsStore();

defineProps<{
  showEditModal: any;
}>();

const { t, locale } = useI18n();
</script>

<template>
  <table class="w-full whitespace-no-wrap">
    <!------ table head ------>
    <thead
      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50"
    >
      <tr>
        <TableTd> {{ t('jobs.title') }} </TableTd>
        <TableTd>
          {{ t('jobs.description') }}
        </TableTd>
        <TableTd>{{ t('status') }}</TableTd>
        <TableTd>{{ t('exchange_rates.updated-date') }}</TableTd>
        <TableTd>{{ t('action') }}</TableTd>
      </tr>
    </thead>

    <!------ table body ------>
    <tbody class="bg-white divide-y text-gray-700">
      <tr v-for="item in store.items">
        <TableTd>
          <span class="font-semibold">
            {{ locale === 'en' ? item.title.en : item.title.ar }}
          </span>
        </TableTd>

        <TableTd>
          <div class="flex">
            <div
              class="font-semibold flex max-w-[8rem] overflow-hidden whitespace-nowrap"
              v-html="
                locale === 'en' ? item.description.en : item.description.ar
              "
            ></div>
            <span> ... </span>
          </div>
        </TableTd>

        <TableTd class="w-36">
          <Badge v-if="item.is_active" type="primary"> {{ t('active') }}</Badge>
          <Badge v-else type="danger"> {{ t('not-active') }}</Badge>
        </TableTd>

        <TableTd>
          <span class="text-sm">{{ dateFormat(item.updated_at) }}</span>
        </TableTd>

        <TableTd class="gap-3 flex">
          <!-- edit modal button -->
          <i
            @click="showEditModal(item)"
            class="fa fa-edit cursor-pointer text-purple-600"
          ></i>

          <!-- active toggle button -->
          <Switch
            :is-active="item.is_active"
            @click="store.activeToggle(item.id, item.is_active)"
          />
        </TableTd>
      </tr>
    </tbody>
  </table>
</template>
