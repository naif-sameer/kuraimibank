<script setup lang="ts">
import { useI18n } from 'vue-i18n';
import { RouterLink } from 'vue-router';

import { dateFormat, timeFormat } from '@/helpers/dateFormat';
import { useServicePointStore } from '@/stores/service-points.store';

import TableTd from '@/components/table/TableTd.vue';
import Switch from '@/components/form/Switch.vue';
import Badge from '@/components/Badge.vue';
import SectionTitle from '@/components/SectionTitle.vue';
import Button from '@/components/form/Button.vue';

let store = useServicePointStore();

const { t, locale } = useI18n();
</script>

<template>
  <!-- title -->
  <SectionTitle class="flex justify-between">
    <RouterLink class="hover:text-blue-500" to="/service-points"> {{ t('service_points.title') }} </RouterLink>

    <RouterLink to="/service-points/add">
      <Button size="sm">{{ t('add') }}</Button></RouterLink
    >
  </SectionTitle>

  <div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <!------ table head ------>
        <thead class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
          <tr>
            <TableTd> {{ t('name') }} </TableTd>
            <!-- <TableTd> {{ t('address') }} </TableTd> -->
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
            <TableTd primary long>
              <RouterLink :to="`/service-points/${item.id}/show`">
                {{ locale === 'en' ? item.name.en : item.name.ar }}
              </RouterLink>
            </TableTd>

            <!-- <TableTd long>
              {{ locale === 'en' ? item.address.en : item.address.ar }}
            </TableTd> -->

            <TableTd>
              {{
                `${t('time.from')} ${item.working_hours.start} ${t('time.am')} - ${t('time.to')} ${timeFormat(
                  item.working_hours.end
                )} ${t('time.pm')}`
              }}
            </TableTd>

            <TableTd> {{ item.phone }} </TableTd>

            <TableTd> {{ item.second_phone }} </TableTd>

            <TableTd> {{ item.city?.ar }} </TableTd>

            <TableTd class="w-36">
              <Badge v-if="item.is_active" type="primary"> {{ t('active') }}</Badge>
              <Badge v-else type="danger"> {{ t('not-active') }}</Badge>
            </TableTd>

            <TableTd>
              <span class="text-sm">{{ dateFormat(item.updated_at) }}</span>
            </TableTd>

            <TableTd>
              <template #body>
                <div class="gap-3 flex">
                  <!------ edit ------>
                  <RouterLink :to="`/service-points/${item.id}/edit`">
                    <i class="fa fa-edit cursor-pointer text-purple-600" />
                  </RouterLink>

                  <!-- active toggle button -->
                  <Switch :is-active="item.is_active" @click="store.activeToggle(item.id, item.is_active)" />
                </div>
              </template>
            </TableTd>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
