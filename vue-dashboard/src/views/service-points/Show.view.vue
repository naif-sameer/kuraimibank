<script lang="ts" setup>
import { useI18n } from 'vue-i18n';
import { RouterLink, useRoute } from 'vue-router';
import { onMounted } from 'vue';

import { useServicePointStore } from '@/stores/service-points.store';

import Button from '@/components/form/Button.vue';
import Card from '@/components/Card.vue';
import SectionTitle from '@/components/SectionTitle.vue';
import Breadcrumbs from '@/components/Breadcrumbs.vue';

import FormBody from './FormBody.vue';
import Map from '@/components/Map.vue';

const { t } = useI18n();
let store = useServicePointStore();

const { params } = useRoute();

onMounted(() => store.getServicePoint(Number(params.id)));
</script>

<template>
  <div>
    <SectionTitle class="flex justify-between">
      <Breadcrumbs
        :items="[
          { text: t('service_points.title'), href: '/service-points' },
          { text: t('show'), disabled: true, href: '/service-points/show' },
        ]"
      />

      <RouterLink :to="`/service-points/${store.item.id}/edit`">
        <Button size="sm">{{ t('edit') }}</Button>
      </RouterLink>
    </SectionTitle>

    <Card>
      <form class="space-y-4">
        <FormBody :is-readonly="true" :item="store.item" />

        <Map class="mt-4" :address="store.item.address" />
      </form>
    </Card>
  </div>
</template>
