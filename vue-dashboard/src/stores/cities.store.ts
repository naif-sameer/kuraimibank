import { defineStore } from 'pinia';
import { useLocalStorage } from '@/helpers/useLocalStorage';
import { CityType } from '@/types';
import { getCitiesApi, createCityApi, updateCityApi, deleteCityApi } from '@/api';
import { useToastStore } from './toast.store';
import { HttpCodeEnum } from '@/Enum';

const toastStore = useToastStore();

type StateType = { item: CityType; items: Array<CityType>; editModal: boolean };

export const useCitiesStore = defineStore({
  id: 'cities',
  state: (): StateType => ({
    item: { id: 0, name: { ar: '', en: '' }, country_id: 0, is_active: true },
    items: [],
    editModal: false,
  }),

  actions: {
    resetItem() {
      this.item = { id: 0, name: { ar: '', en: '' }, country_id: 0, is_active: true };
    },

    showEditModal(data: any) {
      this.editModal = true;
      this.item = data;
    },

    closeEditModal() {
      this.editModal = false;
    },

    getCache() {
      const { getData } = useLocalStorage('cities');

      // @ts-ignore
      if (getData().length > 1) this.items = getData();
    },

    setItems(items: Array<CityType>) {
      const { setData } = useLocalStorage('cities');

      this.items = items;
      setData(items);
    },

    async getCities() {
      this.getCache();

      // api call
      let { status, items } = await getCitiesApi();

      if (status === HttpCodeEnum.Ok) {
        if (this.items.length === 0) toastStore.makeSuccessToast('get cities list successfully');

        this.setItems(items);
      } else toastStore.makeServerErrorToast();
    },

    async addCity() {
      let { status } = await createCityApi(this.item);

      if (status === HttpCodeEnum.Ok) toastStore.makeSuccessToast('add new city successfully');
      else toastStore.makeServerErrorToast();
    },

    async updateCity() {
      const { status } = await updateCityApi(this.item);

      if (status === HttpCodeEnum.Ok) {
        this.resetItem();

        let items = this.items.map((item) => (item.id === this.item.id ? this.item : item));
        this.setItems(items);

        this.editModal = false;

        toastStore.makeSuccessToast(`'${this.item.name.ar}' city updated successfully `);
      } else toastStore.makeServerErrorToast();
    },

    async activeToggle(id: number, is_active: boolean) {
      let { status } = await deleteCityApi(id, is_active);

      if (status === HttpCodeEnum.Ok) {
        const items = this.items.map((item) => (item.id === id ? { ...item, is_active: !item.is_active } : item));
        this.setItems(items);

        toastStore.makeSuccessToast(`'${this.item.name.ar}' city active toggle updated successfully `);
      } else toastStore.makeServerErrorToast();
    },
  },
});
