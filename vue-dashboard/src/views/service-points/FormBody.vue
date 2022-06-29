<script setup lang="ts">
import { useI18n } from 'vue-i18n';

import { ServicePointType } from '@/types';

import Input from '@/components/form/Input.vue';

defineProps<{ item: ServicePointType; isReadonly?: boolean }>();

const { t } = useI18n();
</script>

<template>
  <!------ ar name ------>
  <Input :readonly="isReadonly" v-model="item.name.ar" type="text" :label="t('service_points.arabic-name')" />

  <!------ en name ------>
  <Input :readonly="isReadonly" v-model="item.name.en" type="text" :label="t('service_points.english-name')" />

  <hr />

  <!------ ar working_hours ------>
  <div class="flex flex-col md:flex-row gap-4">
    <Input :readonly="isReadonly" :label="'start working_hours'" type="time" v-model="item.working_hours.start" />
    <Input :readonly="isReadonly" :label="'end working_hours'" type="time" v-model="item.working_hours.end" />
  </div>

  <hr />

  <!------ phone ------>
  <Input :readonly="isReadonly" v-model="item.phone" type="text" :label="t('phone')" />
  <hr />

  <!------ second_phone ------>
  <Input :readonly="isReadonly" v-model="item.second_phone" type="text" :label="t('second-phone')" />
</template>
