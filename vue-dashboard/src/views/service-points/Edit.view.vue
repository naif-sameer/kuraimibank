<script lang="ts" setup>
import { onMounted } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import { useI18n } from 'vue-i18n';

import { useServicePointStore } from '@/stores/service-points.store';

import Button from '@/components/form/Button.vue';
import Card from '@/components/Card.vue';
import SectionTitle from '@/components/SectionTitle.vue';
import Breadcrumbs from '@/components/Breadcrumbs.vue';
import Map from '@/components/Map.vue';

import FormBody from './FormBody.vue';

const { t } = useI18n();
const { push } = useRouter();
let store = useServicePointStore();

const { params } = useRoute();

onMounted(() => store.getServicePoint(Number(params.id)));

const updateItem = () => {
  store.updateServicePoint();

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
        { text: t('edit'), disabled: true, href: '/service-points/edit' },
      ]"
    />
  </SectionTitle>

  <Card>
    <form class="space-y-4" @submit.prevent="updateItem">
      <FormBody :item="store.item" />

      <Map :update-map-location="updateMapLocation" :address="store.item.address" />

      <Button type="submit"> {{ t('update') }} </Button>
    </form>
  </Card>
</template>
