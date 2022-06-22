<script setup lang="ts">
import { useI18n } from 'vue-i18n';

import { dateFormat } from '@/helpers/dateFormat';
import { useServicePointStore } from '@/stores/service-points.store';

import TableTd from '@/components/table/TableTd.vue';
import Switch from '@/components/form/Switch.vue';
import Badge from '@/components/Badge.vue';

let store = useServicePointStore();

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
        <thead
          class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50"
        >
          <tr>
            <TableTd> {{ t('name') }} </TableTd>
            <TableTd> {{ t('address') }} </TableTd>
            <TableTd> {{ t('working-hours') }} </TableTd>
            <TableTd> {{ t('phone') }} </TableTd>
            <TableTd> {{ t('second-phone') }} </TableTd>
            <TableTd> {{ t('city') }} </TableTd>

            <TableTd>{{ t('status') }}</TableTd>
            <TableTd>{{ t('updated-date') }}</TableTd>
            <TableTd>{{ t('action') }}</TableTd>
          </tr>
        </thead>

        <!------ table body ------>
        <tbody class="bg-white divide-y text-gray-700">
          <tr v-for="item in store.items">
            <TableTd>
              <span class="font-semibold">
                {{ locale === 'en' ? item.name.en : item.name.ar }}
              </span>
            </TableTd>

            <TableTd>
              <span>
                {{ locale === 'en' ? item.address.en : item.address.ar }}
              </span>
            </TableTd>

            <TableTd>
              <span>
                {{
                  locale === 'en'
                    ? item.working_hours.en
                    : item.working_hours.ar
                }}
              </span>
            </TableTd>

            <TableTd>
              <span> {{ item.phone }} </span>
            </TableTd>
            <TableTd>
              <span> {{ item.second_phone }} </span>
            </TableTd>

            <TableTd>
              <span> {{ item.city }} </span>
            </TableTd>

            <TableTd class="w-36">
              <Badge v-if="item.is_active" type="primary">
                {{ t('active') }}</Badge
              >
              <Badge v-else type="danger"> {{ t('not-active') }}</Badge>
            </TableTd>

            <TableTd>
              <span class="text-sm">{{ dateFormat(item.updated_at) }}</span>
            </TableTd>

            <TableTd>
              <div class="gap-3 flex">
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
              </div>
            </TableTd>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
