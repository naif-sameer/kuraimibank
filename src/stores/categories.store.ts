import { defineStore } from 'pinia';
import { useLocalStorage } from '@/helpers/useLocalStorage';
import { CategoryType } from '@/types';
import {
  getCategoriesApi,
  createCategoryApi,
  updateCategoryApi,
  deleteCategoryApi,
} from '@/api';

export const useCategoriesStore = defineStore({
  id: 'categories',
  state: (): {
    item: CategoryType;
    items: Array<CategoryType>;
  } => ({
    item: {
      id: 0,
      name: {
        ar: '',
        en: '',
      },
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
        name: {
          ar: '',
          en: '',
        },
        is_active: true,
      };
    },

    getCategories() {
      const { getData, setData } = useLocalStorage('categories');

      if (getData().length > 1) {
        // @ts-ignore
        this.items = getData();
      }

      // api call
      getCategoriesApi().then((res) => {
        // @ts-ignore
        this.items = res;
        setData(res);
      });
    },

    addCategory() {
      createCategoryApi(this.getData);

      this.getCategories();
    },

    updateCategory() {
      updateCategoryApi(this.getData);

      this.getCategories();
    },

    activeToggle(id: number, is_active: boolean) {
      deleteCategoryApi(id, is_active);

      // fetch new data
      this.getCategories();
    },
  },
});
