<script setup lang="ts">
import { ServicePointType } from '@/types';
import { useI18n } from 'vue-i18n';

import Input from '@/components/form/Input.vue';
import Select from '@/components/form/Select.vue';
import { onMounted, reactive } from 'vue';
import { getCitiesApi } from '@/api';

defineProps<{ item: ServicePointType }>();

const { t } = useI18n();

const citiesList = reactive([]);
const getCitiesList = () => {
  getCitiesApi().then((res) => {
    //@ts-ignore
    citiesList.push(...res);
  });
};

onMounted(() => {
  getCitiesList();
});
</script>

<template>
  <!------ ar name ------>
  <Input
    v-model="item.name.ar"
    type="text"
    :label="t('service_points.arabic-name')"
  />

  <!------ en name ------>
  <Input
    v-model="item.name.en"
    type="text"
    :label="t('service_points.english-name')"
  />

  <hr />
  <!------ ar address ------>
  <Input
    v-model="item.address.ar"
    type="text"
    :label="t('service_points.arabic-address')"
  />

  <!------ en address ------>
  <Input
    v-model="item.address.en"
    type="text"
    :label="t('service_points.english-address')"
  />

  <hr />
  <!------ ar working_hours ------>
  <Input
    v-model="item.working_hours.ar"
    type="text"
    :label="t('service_points.arabic-working_hours')"
  />

  <!------ en working_hours ------>
  <Input
    v-model="item.working_hours.en"
    type="text"
    :label="t('service_points.english-working_hours')"
  />
  <hr />

  <!------ phone ------>
  <Input v-model="item.phone" type="text" :label="t('phone')" />
  <hr />

  <!------ second_phone ------>
  <Input v-model="item.second_phone" type="text" :label="t('second-phone')" />
  <hr />

  <!------ city_id ------>
  <Select :label="t('city')" v-model="item.city_id" :options="citiesList" />
  <hr />
</template>
