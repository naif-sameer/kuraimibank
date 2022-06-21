import { defineStore } from 'pinia';
import { useLocalStorage } from '@/helpers/useLocalStorage';
import { ExchangeRatesType } from '@/types';
import {
  deleteExchangeRatesData,
  getExchangeRatesData,
  updateExchangeRatesData,
  createExchangeRatesData,
} from '@/api';

export const useExchangeRatesStore = defineStore({
  id: 'exchange-rates',
  state: (): {
    item: ExchangeRatesType;
    items: Array<ExchangeRatesType>;
  } => ({
    item: {
      id: 0,
      name: {
        ar: '',
        en: '',
      },
      sale: '',
      is_active: true,
      buy: '',
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
        sale: '',
        is_active: true,
        buy: '',
      };
    },

    getExchangeRates() {
      const { getData, setData } = useLocalStorage('exchange-rates');

      if (getData().length > 1) {
        // @ts-ignore
        this.items = getData();
      }

      // api call
      getExchangeRatesData().then((res) => {
        // @ts-ignore
        this.items = res;
        setData(res);
      });
    },

    addExchangeRates() {
      createExchangeRatesData(this.getData);

      this.getExchangeRates();
    },

    updateExchangeRates() {
      updateExchangeRatesData(this.getData);

      this.getExchangeRates();
    },

    activeToggle(id: number, is_active: boolean) {
      deleteExchangeRatesData(id, is_active);

      // fetch new data
      this.getExchangeRates();
    },
  },
});
