import { defineStore } from 'pinia';
import { useLocalStorage } from '@/helpers/useLocalStorage';
import { SocialMediaType } from '@/types';
import {
  getSocialMediaApi,
  createSocialMediaApi,
  updateSocialMediaApi,
  deleteSocialMediaApi,
} from '@/api';

export const useSocialMediaStore = defineStore({
  id: 'social-media',
  state: (): {
    item: SocialMediaType;
    items: Array<SocialMediaType>;
  } => ({
    item: {
      id: 0,
      name: '',
      link: '',
      icon: '',
      is_active: true,
    },
    items: [],
  }),

  getters: {
    getData: ({ item }) => item,
  },

  actions: {
    resetItem() {
      this.item = {
        id: 0,
        name: '',
        link: '',
        icon: '',
        is_active: true,
      };
    },

    getSocialMedia() {
      const { getData, setData } = useLocalStorage('social-media');

      if (getData().length > 1) {
        // @ts-ignore
        this.items = getData();
      }

      // api call
      getSocialMediaApi().then((res) => {
        // @ts-ignore
        this.items = res;
        setData(res);
      });
    },

    addSocialMedia() {
      createSocialMediaApi(this.getData);

      this.getSocialMedia();
    },

    updateSocialMedia() {
      updateSocialMediaApi(this.getData);

      this.getSocialMedia();
    },

    activeToggle(id: number, is_active: boolean) {
      deleteSocialMediaApi(id, is_active);

      // fetch new data
      this.getSocialMedia();
    },
  },
});
