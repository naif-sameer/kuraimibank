<script setup>
import { useI18n } from 'vue-i18n';
import { onMounted, reactive } from 'vue';

import Button from '@/components/form/Button.vue';
import Label from '@/components/form/Label.vue';
import Card from '@/components/Card.vue';
import Input from '@/components/form/Input.vue';

import { getContactUsData, updateContactUsData } from '@/api';

const { t } = useI18n();

let ContactUsData = reactive({
  email: '',
  phone: '',
  fax: '',
  free_phone: '',
  mail_box: '',
});

onMounted(() => {
  getContactUsData().then((res) => {
    ContactUsData.email = JSON.parse(res).email;
    ContactUsData.phone = JSON.parse(res).phone;
    ContactUsData.fax = JSON.parse(res).fax;
    ContactUsData.free_phone = JSON.parse(res).free_phone;
    ContactUsData.mail_box = JSON.parse(res).mail_box;
  });
});
</script>

<template>
  <Card>
    <h3 class="text-xl mb-4">{{ t('contact_us.title') }}</h3>
    <form
      class="space-y-8"
      @submit.prevent="updateContactUsData(ContactUsData)"
    >
      <!-- phone -->
      <div>
        <Label>{{ t('contact_us.phone') }} </Label>

        <Input required type="number" v-model="ContactUsData.phone" />
      </div>

      <!-- email -->
      <div>
        <Label>{{ t('contact_us.email') }} </Label>

        <Input required type="email" v-model="ContactUsData.email" />
      </div>

      <!-- fax -->
      <div>
        <Label>{{ t('contact_us.fax') }} </Label>

        <Input required type="number" v-model="ContactUsData.fax" />
      </div>

      <!-- free_phone -->
      <div>
        <Label>{{ t('contact_us.free_phone') }} </Label>

        <Input required type="number" v-model="ContactUsData.free_phone" />
      </div>

      <!-- mail_box -->
      <div>
        <Label>{{ t('contact_us.mail_box') }} </Label>

        <Input required type="text" v-model="ContactUsData.mail_box" />
      </div>

      <Button>{{ t('update') }} </Button>
    </form>
  </Card>
</template>
