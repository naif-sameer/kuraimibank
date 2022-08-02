<script setup lang="ts">
import { useI18n } from 'vue-i18n';

import { dateFormat } from '@/helpers/dateFormat';
import { useSocialMediaStore } from '@/stores/social-media.store';

import Switch from '@/components/form/Switch.vue';
import Badge from '@/components/Badge.vue';
import TableTd from '@/components/table/TableTd.vue';

let store = useSocialMediaStore();

defineProps<{
  showEditModal: any;
}>();

const { t } = useI18n();
</script>

<template>
  <table class="w-full whitespace-no-wrap">
    <!------ table head ------>
    <thead class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
      <tr>
        <TableTd> {{ t('icon') }} </TableTd>
        <TableTd> {{ t('name') }} </TableTd>
        <TableTd> {{ t('link') }} </TableTd>

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
              :src="item.icon"
              alt="social media icon"
              width="60"
              height="60"
            />
          </div>
        </TableTd>

        <TableTd>{{ item.title }} </TableTd>

        <TableTd>{{ item.link }} </TableTd>

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
</template>
