import { defineStore } from 'pinia';
import { useLocalStorage } from '@/helpers/useLocalStorage';
import { ServiceAdvantageType } from '@/types';
import {
  getServiceAdvantagesApi,
  createServiceAdvantageApi,
  updateServiceAdvantageApi,
  deleteServiceAdvantageApi,
} from '@/api';

export const useServiceAdvantageStore = defineStore({
  id: 'service-advantages',
  state: (): {
    item: ServiceAdvantageType;
    items: Array<ServiceAdvantageType>;
  } => ({
    item: {
      id: 0,

      title: { ar: '', en: '' },
      description: { ar: '', en: '' },
      service_id: '',

      is_active: true,
    },
    items: [],
  }),

  actions: {
    resetItem() {
      this.item = {
        id: 0,

        title: { ar: '', en: '' },
        description: { ar: '', en: '' },
        service_id: '',

        is_active: true,
      };
    },

    getServiceAdvantages() {
      const { getData, setData } = useLocalStorage('service-advantages');

      if (getData().length > 1) {
        // @ts-ignore
        this.items = getData();
      }

      // api call
      getServiceAdvantagesApi().then((res) => {
        // @ts-ignore
        this.items = res;
        setData(res);
      });
    },

    addServiceAdvantage() {
      createServiceAdvantageApi(this.item);

      this.getServiceAdvantages();
    },

    updateServiceAdvantage() {
      updateServiceAdvantageApi(this.item);

      this.getServiceAdvantages();
    },

    activeToggle(id: number, is_active: boolean) {
      deleteServiceAdvantageApi(id, is_active);

      // fetch new data
      this.getServiceAdvantages();
    },
  },
});
