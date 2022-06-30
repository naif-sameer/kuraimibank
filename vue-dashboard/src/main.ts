import { createApp } from 'vue';
import { createPinia } from 'pinia';
import '@/assets/base.css';
import { createI18n } from 'vue-i18n';
//@ts-ignore
import CKEditor from '@ckeditor/ckeditor5-vue';

import App from './App.vue';
import router from './router';

import { messages } from '@/locales/i18n';

const i18n = createI18n({
  legacy: false, // you must set `false`, to use Composition API
  locale: 'en', // set locale
  fallbackLocale: 'en', // set fallback locale

  messages,
});

const app = createApp(App);
app.use(createPinia());
app.use(router);
app.use(i18n);
app.use(CKEditor);

app.mount('#app');
