import { defineStore } from 'pinia';
import { useLocalStorage } from '@/helpers/useLocalStorage';
import { MainServiceType } from '@/types';
import {
  getMainServicesApi,
  createMainServiceApi,
  updateMainServiceApi,
  deleteMainServiceApi,
} from '@/api';

export const useMainServiceStore = defineStore({
  id: 'main-services',
  state: (): {
    item: MainServiceType;
    items: Array<MainServiceType>;
  } => ({
    item: {
      id: 0,

      name: { ar: '', en: '' },
      link: '',
      image: '',

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
        image: '',

        is_active: true,
      };
    },

    getMainServices() {
      const { getData, setData } = useLocalStorage('main-services');

      if (getData().length > 1) {
        // @ts-ignore
        this.items = getData();
      }

      // api call
      getMainServicesApi().then((res) => {
        // @ts-ignore
        this.items = res;
        setData(res);
      });
    },

    addMainService() {
      createMainServiceApi(this.item);

      this.getMainServices();
    },

    updateMainService() {
      updateMainServiceApi(this.item);

      this.getMainServices();
    },

    activeToggle(id: number, is_active: boolean) {
      deleteMainServiceApi(id, is_active);

      // fetch new data
      this.getMainServices();
    },
  },
});
