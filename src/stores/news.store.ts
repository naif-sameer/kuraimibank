import { defineStore } from 'pinia';
import { useLocalStorage } from '@/helpers/useLocalStorage';
import { NewsType } from '@/types';
import { getNewsApi, createNewsApi, updateNewsApi, deleteNewsApi } from '@/api';

export const useNewsStore = defineStore({
  id: 'news',
  state: (): {
    item: NewsType;
    items: Array<NewsType>;
  } => ({
    item: {
      id: 0,
      title: {
        ar: '',
        en: '',
      },
      description: {
        ar: '',
        en: '',
      },
      image: '',

      is_active: true,
    },
    items: [],
  }),

  actions: {
    resetItem() {
      this.item = {
        id: 0,

        title: {
          ar: '',
          en: '',
        },
        description: {
          ar: '',
          en: '',
        },
        image: '',

        is_active: true,
      };
    },

    getNews() {
      const { getData, setData } = useLocalStorage('news');

      if (getData().length > 1) {
        // @ts-ignore
        this.items = getData();
      }

      // api call
      getNewsApi().then((res) => {
        // @ts-ignore
        this.items = res;
        setData(res);
      });
    },

    addNews() {
      createNewsApi(this.item);

      this.getNews();
    },

    updateNews() {
      updateNewsApi(this.item);

      this.getNews();
    },

    activeToggle(id: number, is_active: boolean) {
      deleteNewsApi(id, is_active);

      // fetch new data
      this.getNews();
    },
  },
});
