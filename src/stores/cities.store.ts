import { defineStore } from 'pinia';
import { useLocalStorage } from '@/helpers/useLocalStorage';
import { CityType } from '@/types';
import {
  getCitiesApi,
  createCityApi,
  updateCityApi,
  deleteCityApi,
} from '@/api';

export const useCitiesStore = defineStore({
  id: 'cities',
  state: (): {
    item: CityType;
    items: Array<CityType>;
  } => ({
    item: {
      id: 0,
      name: {
        ar: '',
        en: '',
      },
      country_id: 0,
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
        country_id: 0,
        is_active: true,
      };
    },

    getCities() {
      const { getData, setData } = useLocalStorage('cities');

      if (getData().length > 1) {
        // @ts-ignore
        this.items = getData();
      }

      // api call
      getCitiesApi().then((res) => {
        // @ts-ignore
        this.items = res;
        setData(res);
      });
    },

    addCity() {
      createCityApi(this.getData);

      this.getCities();
    },

    updateCity() {
      updateCityApi(this.getData);

      this.getCities();
    },

    activeToggle(id: number, is_active: boolean) {
      deleteCityApi(id, is_active);

      // fetch new data
      this.getCities();
    },
  },
});
