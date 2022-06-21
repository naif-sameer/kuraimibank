import { defineStore } from 'pinia';
import { useLocalStorage } from '@/helpers/useLocalStorage';
import { CountriesType } from '@/types';
import {
  getCountriesApi,
  createCountryApi,
  updateCountryApi,
  deleteCountryApi,
} from '@/api';

export const useCountriesStore = defineStore({
  id: 'countries',
  state: (): {
    item: CountriesType;
    items: Array<CountriesType>;
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

    getCountries() {
      const { getData, setData } = useLocalStorage('countries');

      if (getData().length > 1) {
        // @ts-ignore
        this.items = getData();
      }

      // api call
      getCountriesApi().then((res) => {
        // @ts-ignore
        this.items = res;
        setData(res);
      });
    },

    addCountry() {
      createCountryApi(this.getData);

      this.getCountries();
    },

    updateCountry() {
      updateCountryApi(this.getData);

      this.getCountries();
    },

    activeToggle(id: number, is_active: boolean) {
      deleteCountryApi(id, is_active);

      // fetch new data
      this.getCountries();
    },
  },
});
