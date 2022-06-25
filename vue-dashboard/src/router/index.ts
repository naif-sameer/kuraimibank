import { createRouter, createWebHistory } from 'vue-router';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'website-info',
      component: () => import('@/views/website-info/WebsiteInfoView.vue'),
      meta: {
        module: 'website-info',
      },
      children: [
        {
          path: '/',
          component: () => import('@/views/website-info/AboutUs.view.vue'),
          meta: {
            module: 'website-info',
            subModule: 'about-us',
          },
        },
        {
          path: '/apply-for-service',
          component: () => import('@/views/website-info/ApplyForService.view.vue'),
          meta: {
            module: 'website-info',
            subModule: 'apply-for-service',
          },
        },
        {
          path: '/values-principles',
          component: () => import('@/views/website-info/ValuesPrinciples.view.vue'),
          meta: {
            module: 'website-info',
            subModule: 'values-principles',
          },
        },
        {
          path: '/strategy-statement',
          component: () => import('@/views/website-info/StrategyStatement.view.vue'),
          meta: {
            module: 'website-info',
            subModule: 'strategy-statement',
          },
        },
        {
          path: '/board-members',
          component: () => import('@/views/website-info/BoardMembers.view.vue'),
          meta: {
            module: 'website-info',
            subModule: 'board-members',
          },
        },
        {
          path: '/contact-us',
          component: () => import('@/views/website-info/ContactUs.view.vue'),
          meta: {
            module: 'website-info',
            subModule: 'contact-us',
          },
        },
        {
          path: '/privacy-policy',
          name: 'privacy-policy',
          component: () => import('@/views/privacy-policy/PrivacyPolicyView.vue'),
          meta: {
            module: 'website-info',
            subModule: 'privacy-policy',
          },
        },
        {
          path: '/social-media',
          name: 'social-media',
          meta: {
            module: 'website-info',
            subModule: 'social-media',
          },
          component: () => import('@/views/social-media/SocialMediaView.vue'),
        },
      ],
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
      path: '/sub-categories',
      name: 'sub-categories',
      component: () => import('@/views/sub-categories/SubCategoriesView.vue'),
    },

    {
      path: '/jobs',
      name: 'jobs',
      component: () => import('@/views/jobs/JobsView.vue'),
    },

    {
      path: '/our-partners',
      name: 'our-partners',
      component: () => import('@/views/our-partners/OurPartnersView.vue'),
    },

    {
      path: '/financial-reports',
      name: 'financial-reports',
      component: () => import('@/views/financial-reports/FinancialReportsView.vue'),
    },

    {
      path: '/news',
      name: 'news',
      component: () => import('@/views/news/NewsView.vue'),
    },

    {
      path: '/service-points',
      name: 'service-points',
      component: () => import('@/views/service-points/ServicePointsView.vue'),
    },

    {
      path: '/main-services',
      name: 'main-services',
      component: () => import('@/views/main-services/MainServicesView.vue'),
    },

    {
      path: '/services',
      name: 'services',
      component: () => import('@/views/services/ServicesView.vue'),
    },
  ],
  scrollBehavior(to, from, savedPosition) {
    return {
      top: 0,
    };
  },
});

export default router;
