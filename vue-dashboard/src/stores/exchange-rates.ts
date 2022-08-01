import { defineStore } from 'pinia';
import { useLocalStorage } from '@/helpers/useLocalStorage';
import { ExchangeRatesType } from '@/types';
import { deleteExchangeRatesData, getExchangeRatesData, updateExchangeRatesData, createExchangeRatesData } from '@/api';
import { useToastStore } from './toast.store';

export const useExchangeRatesStore = defineStore({
  id: 'exchange-rates',
  state: (): {
    item: ExchangeRatesType;
    items: Array<ExchangeRatesType>;
  } => ({
    item: { id: 0, title: { ar: '', en: '' }, sale: '', is_active: true, buy: '' },
    items: [],
  }),

  actions: {
    resetItem() {
      this.item = { id: 0, title: { ar: '', en: '' }, sale: '', is_active: true, buy: '' };
    },

    async getExchangeRates() {
      const { getData, setData } = useLocalStorage('exchange-rates');

      if (getData().length > 1) {
        // @ts-ignore
        this.items = getData();
      }

      // api call
      await getExchangeRatesData().then((res) => {
        // @ts-ignore
        this.items = res;
        setData(res);
      });
    },

    async addExchangeRates() {
      useToastStore().addDone();

      createExchangeRatesData(this.item);

      this.getExchangeRates();
    },

    async updateExchangeRates() {
      useToastStore().updatedDone();

      updateExchangeRatesData(this.item);

      this.getExchangeRates();
    },

    async activeToggle(id: number, is_active: boolean) {
      useToastStore().updatedDone();

      deleteExchangeRatesData(id, is_active);

      // fetch new data
      this.getExchangeRates();
    },
  },
});
