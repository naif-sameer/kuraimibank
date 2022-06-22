import { defineStore } from 'pinia';
import { useLocalStorage } from '@/helpers/useLocalStorage';
import { ServicePointType } from '@/types';
import {
  getServicePointsApi,
  createServicePointApi,
  updateServicePointApi,
  deleteServicePointApi,
} from '@/api';

export const useServicePointStore = defineStore({
  id: 'service-points',
  state: (): {
    item: ServicePointType;
    items: Array<ServicePointType>;
  } => ({
    item: {
      id: 0,
      name: {
        ar: '',
        en: '',
      },
      address: {
        ar: '',
        en: '',
      },
      working_hours: {
        ar: '',
        en: '',
      },

      phone: '',
      second_phone: '',
      city_id: '',

      is_active: true,
    },
    items: [],
  }),

  actions: {
    resetItem() {
      this.item = {
        id: 0,

        name: {
          ar: '',
          en: '',
        },
        address: {
          ar: '',
          en: '',
        },
        working_hours: {
          ar: '',
          en: '',
        },
        phone: '',
        second_phone: '',
        city_id: '',

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
