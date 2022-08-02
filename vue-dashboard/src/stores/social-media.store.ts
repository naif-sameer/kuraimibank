import { defineStore } from 'pinia';
import { useLocalStorage } from '@/helpers/useLocalStorage';
import { SocialMediaType } from '@/types';
import { getSocialMediaApi, createSocialMediaApi, updateSocialMediaApi, deleteSocialMediaApi } from '@/api';

export const useSocialMediaStore = defineStore({
  id: 'social-media',
  state: (): {
    item: SocialMediaType;
    items: Array<SocialMediaType>;
  } => ({
    item: { id: 0, title: '', link: '', icon: '', is_active: true },
    items: [],
  }),

  actions: {
    resetItem() {
      this.item = { id: 0, title: '', link: '', icon: '', is_active: true };
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
      createSocialMediaApi(this.item);

      this.getSocialMedia();
    },

    updateSocialMedia() {
      updateSocialMediaApi(this.item);

      this.getSocialMedia();
    },

    activeToggle(id: number, is_active: boolean) {
      deleteSocialMediaApi(id, is_active);

      // fetch new data
      this.getSocialMedia();
    },
  },
});
