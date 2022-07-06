<script setup>
import { useI18n } from 'vue-i18n';
import { onMounted, reactive } from 'vue';

import Button from '@/components/form/Button.vue';
import Label from '@/components/form/Label.vue';
import Card from '@/components/Card.vue';
import Input from '@/components/form/Input.vue';

import { getContactUsData, updateContactUsData } from '@/api';
import SectionTitle from '@/components/SectionTitle.vue';

const { t } = useI18n();

let ContactUsData = reactive({
  email: '',
  phone: '',
  fax: '',
  free_phone: '',
  mail_box: '',
});

// render data from store
getContactUsData().then((res) => {
  ContactUsData.email = res.email;
  ContactUsData.phone = res.phone;
  ContactUsData.fax = res.fax;
  ContactUsData.free_phone = res.free_phone;
  ContactUsData.mail_box = res.mail_box;
});
</script>

<template>
  <!-- title -->
  <SectionTitle> {{ t('contact_us.title') }} </SectionTitle>

  <Card>
    <form class="space-y-8" @submit.prevent="updateContactUsData(ContactUsData)">
      <!-- phone -->
      <Input required type="number" v-model="ContactUsData.phone" :label="t('contact_us.phone')" />

      <!-- email -->
      <Input required type="email" v-model="ContactUsData.email" :label="t('contact_us.email')" />

      <!-- fax -->
      <Input required type="number" v-model="ContactUsData.fax" :label="t('contact_us.fax')" />

      <!-- free_phone -->
      <Input required type="number" v-model="ContactUsData.free_phone" :label="t('contact_us.free_phone')" />

      <!-- mail_box -->
      <Input required type="text" v-model="ContactUsData.mail_box" :label="t('contact_us.mail_box')" />

      <Button>{{ t('update') }} </Button>
    </form>
  </Card>
</template>
