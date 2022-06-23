import { defineStore } from 'pinia';
import { useLocalStorage } from '@/helpers/useLocalStorage';
import { PrivacyPolicyType } from '@/types';
import { getPrivacyPolicyApi, updatePrivacyPolicyApi } from '@/api';

export const usePrivacyPolicyStore = defineStore({
  id: 'privacy_policy',
  state: (): { item: PrivacyPolicyType } => ({
    item: {
      id: 0,
      title: {
        ar: '',
        en: '',
      },
      sub_title: {
        ar: '',
        en: '',
      },
      description: {
        ar: '',
        en: '',
      },
      is_active: true,
    },
  }),

  getters: {
    getData: ({ item }) => item,
  },

  actions: {
    resetItem() {
      this.item = {
        id: 0,
        title: {
          ar: '',
          en: '',
        },
        sub_title: {
          ar: '',
          en: '',
        },
        description: {
          ar: '',
          en: '',
        },
        is_active: true,
      };
    },

    getPrivacyPolicy() {
      const { getData, setData } = useLocalStorage('privacy_policy');

      if (getData().length > 1) {
        // @ts-ignore
        this.items = getData();
      }

      // api call
      getPrivacyPolicyApi().then((res) => {
        // @ts-ignore
        this.item = res;
        setData(res);
      });
    },

    updatePrivacyPolicy() {
      updatePrivacyPolicyApi(this.getData);

      this.getPrivacyPolicy();
    },
  },
});
