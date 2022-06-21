import { createRouter, createWebHistory } from 'vue-router';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('@/views/website-info/WebsiteInfoView.vue'),
    },
    {
      path: '/exchange-rates',
      name: 'exchange-rates',
      component: () => import('@/views/exchange-rates/ExchangeRatesView.vue'),
    },
  ],
});

export default router;
