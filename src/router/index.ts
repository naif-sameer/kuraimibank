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
    {
      path: '/countries',
      name: 'countries',
      component: () => import('@/views/countries/CountriesView.vue'),
    },
    {
      path: '/cities',
      name: 'cities',
      component: () => import('@/views/cities/CitiesView.vue'),
    },

    {
      path: '/categories',
      name: 'categories',
      component: () => import('@/views/categories/CategoriesView.vue'),
    },

    {
      path: '/jobs',
      name: 'jobs',
      component: () => import('@/views/jobs/JobsView.vue'),
    },

    {
      path: '/privacy-policy',
      name: 'privacy-policy',
      component: () => import('@/views/privacy-policy/PrivacyPolicyView.vue'),
    },

    {
      path: '/social-media',
      name: 'social-media',
      component: () => import('@/views/social-media/SocialMediaView.vue'),
    },
  ],
});

export default router;
