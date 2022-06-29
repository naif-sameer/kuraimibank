<script lang="ts" setup>
import { useServicePointStore } from '@/stores/service-points.store';
import { useI18n } from 'vue-i18n';

import Button from '@/components/form/Button.vue';

import FormBody from './FormBody.vue';
import Card from '@/components/Card.vue';
import SectionTitle from '@/components/SectionTitle.vue';
import Breadcrumbs from '@/components/Breadcrumbs.vue';
import { useRouter } from 'vue-router';
import Map from '@/components/Map.vue';
import { onMounted } from 'vue';

const { push } = useRouter();
const { t } = useI18n();
let store = useServicePointStore();

onMounted(() => {
  store.resetItem();
});

const addItem = () => {
  store.addServicePoint();

  // redirect
  push('/service-points');
};

const updateMapLocation = (address: any, addressDetails: any) => {
  store.item.address = address;

  store.item.addressDetails = addressDetails;
};
</script>

<template>
  <SectionTitle>
    <Breadcrumbs
      :items="[
        { text: t('service_points.title'), href: '/service-points' },
        { text: t('add'), disabled: true, href: '/service-points/add' },
      ]"
    />
  </SectionTitle>

  <Card>
    <form class="space-y-4" @submit.prevent="addItem">
      <FormBody :item="store.item" />

      <Map :update-map-location="updateMapLocation" :address="store.item.address" />

      <Button type="submit"> {{ t('add') }} </Button>
    </form>
  </Card>
</template>
