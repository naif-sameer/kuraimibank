import { defineStore } from 'pinia';
import { useLocalStorage } from '@/helpers/useLocalStorage';
import { CountriesType } from '@/types';
import { getCountriesApi, createCountryApi, updateCountryApi, deleteCountryApi } from '@/api';
import { HttpCodeEnum } from '@/Enum';
import { useToastStore } from './toast.store';

type StateType = {
  item: CountriesType;
  items: Array<CountriesType>;
  editModal: boolean;
};

export const useCountriesStore = defineStore({
  id: 'countries',
  state: (): StateType => ({
    item: { id: 0, title: { ar: '', en: '' }, is_active: true },
    items: [],
    editModal: false,
  }),

  actions: {
    resetItem() {
      this.item = { id: 0, title: { ar: '', en: '' }, is_active: true };
    },
    showEditModal(data: any) {
      this.editModal = true;
      this.item = data;
    },

    closeEditModal() {
      this.editModal = false;
    },

    getCache() {
      const { getData } = useLocalStorage('countries');

      // @ts-ignore
      if (getData().length > 1) this.items = getData();
    },

    setItems(items: Array<CountriesType>) {
      const { setData } = useLocalStorage('countries');

      this.items = items;
      setData(items);
    },

    async getCountries() {
      this.getCache();

      // api call
      let { items, error } = await getCountriesApi();

      if (!error) this.setItems(items);
    },

    async addCountry() {
      let { error } = await createCountryApi(this.item);

      if (!error) this.getCountries();
    },

    async updateCountry() {
      updateCountryApi(this.item);

      this.getCountries();
    },

    async activeToggle(id: number, is_active: boolean) {
      deleteCountryApi(id, is_active);

      // fetch new data
      this.getCountries();
    },
  },
});
