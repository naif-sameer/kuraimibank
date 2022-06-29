import { defineStore } from 'pinia';
import { useLocalStorage } from '@/helpers/useLocalStorage';
import { ServicePointType } from '@/types';
import { getServicePointsApi, createServicePointApi, updateServicePointApi, deleteServicePointApi } from '@/api';

export const useServicePointStore = defineStore({
  id: 'service-points',
  state: (): {
    item: ServicePointType;
    items: Array<ServicePointType>;
  } => ({
    item: {
      id: 0,
      name: { ar: '', en: '' },
      address: { lat: 0, lon: 0 },
      working_hours: { start: '', end: '' },

      phone: '',
      second_phone: '',

      is_active: true,
    },
    items: [],
  }),

  actions: {
    resetItem() {
      this.item = {
        id: 0,

        name: { ar: '', en: '' },
        address: { lat: 0, lon: 0 },
        working_hours: { start: '', end: '' },
        phone: '',
        second_phone: '',

        is_active: true,
      };
    },

    getServicePoints() {
      const { getData, setData } = useLocalStorage('service-points');

      if (getData().length > 1) {
        // @ts-ignore
        this.items = getData();
      }

      // api call
      getServicePointsApi().then((res) => {
        // @ts-ignore
        this.items = res;
        setData(res);
      });
    },

    getServicePoint(id: number) {
      let servicePoint = this.items.find((item) => item.id === id);

      if (servicePoint) this.item = servicePoint;
    },

    addServicePoint() {
      createServicePointApi(this.item);

      this.getServicePoints();
    },

    updateServicePoint() {
      updateServicePointApi(this.item);

      this.getServicePoints();
    },

    activeToggle(id: number, is_active: boolean) {
      deleteServicePointApi(id, is_active);

      // fetch new data
      this.getServicePoints();
    },
  },
});
