import { defineStore } from 'pinia';
import { useLocalStorage } from '@/helpers/useLocalStorage';
import { ServiceType } from '@/types';
import { getServicesApi, createServiceApi, updateServiceApi, deleteServiceApi } from '@/api';

export const useServiceStore = defineStore({
  id: 'services',
  state: (): {
    item: ServiceType;
    items: Array<ServiceType>;
  } => ({
    item: {
      id: 0,

      title: { ar: '', en: '' },
      description: { ar: '', en: '' },
      other_advantage: { ar: '', en: '' },
      service_conditions: { ar: '', en: '' },
      service_id: '',
      image: '',

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
        other_advantage: { ar: '', en: '' },
        service_conditions: { ar: '', en: '' },
        service_id: '',
        image: '',

        is_active: true,
      };
    },

    getServices() {
      const { getData, setData } = useLocalStorage('services');

      if (getData().length > 1) {
        // @ts-ignore
        this.items = getData();
      }

      // api call
      getServicesApi().then((res) => {
        // @ts-ignore
        this.items = res;
        setData(res);
      });
    },

    addService() {
      createServiceApi(this.item);

      this.getServices();
    },

    updateService() {
      updateServiceApi(this.item);

      this.getServices();
    },

    activeToggle(id: number, is_active: boolean) {
      deleteServiceApi(id, is_active);

      // fetch new data
      this.getServices();
    },
  },
});
