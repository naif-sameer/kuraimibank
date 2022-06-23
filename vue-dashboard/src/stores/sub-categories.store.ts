import { defineStore } from 'pinia';
import { useLocalStorage } from '@/helpers/useLocalStorage';
import { SubCategoryType } from '@/types';
import {
  getSubCategoriesApi,
  createSubCategoryApi,
  updateSubCategoryApi,
  deleteSubCategoryApi,
} from '@/api';

export const useSubCategoryStore = defineStore({
  id: 'sub-categories',
  state: (): {
    item: SubCategoryType;
    items: Array<SubCategoryType>;
  } => ({
    item: {
      id: 0,

      name: { ar: '', en: '' },
      link: '',
      icon: '',
      category_id: '',

      is_active: true,
    },
    items: [],
  }),

  actions: {
    resetItem() {
      this.item = {
        id: 0,

        name: { ar: '', en: '' },
        link: '',
        icon: '',
        category_id: '',

        is_active: true,
      };
    },

    getSubCategories() {
      const { getData, setData } = useLocalStorage('sub-categories');

      if (getData().length > 1) {
        // @ts-ignore
        this.items = getData();
      }

      // api call
      getSubCategoriesApi().then((res) => {
        // @ts-ignore
        this.items = res;
        setData(res);
      });
    },

    addSubCategory() {
      createSubCategoryApi(this.item);

      this.getSubCategories();
    },

    updateSubCategory() {
      updateSubCategoryApi(this.item);

      this.getSubCategories();
    },

    activeToggle(id: number, is_active: boolean) {
      deleteSubCategoryApi(id, is_active);

      // fetch new data
      this.getSubCategories();
    },
  },
});
