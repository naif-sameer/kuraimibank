import { defineStore } from 'pinia';
import { useLocalStorage } from '@/helpers/useLocalStorage';
import { OurPartnerType } from '@/types';
import {
  getOurPartnersApi,
  createOurPartnerApi,
  updateOurPartnerApi,
  deleteOurPartnerApi,
} from '@/api';

export const useOurPartnerStore = defineStore({
  id: 'our-partners',
  state: (): {
    item: OurPartnerType;
    items: Array<OurPartnerType>;
  } => ({
    item: {
      id: 0,
      title: {
        ar: '',
        en: '',
      },
      description: {
        ar: '',
        en: '',
      },
      image: '',

      is_active: true,
    },
    items: [],
  }),

  actions: {
    resetItem() {
      this.item = {
        id: 0,

        title: {
          ar: '',
          en: '',
        },
        description: {
          ar: '',
          en: '',
        },
        image: '',

        is_active: true,
      };
    },

    getOurPartners() {
      const { getData, setData } = useLocalStorage('our-partners');

      if (getData().length > 1) {
        // @ts-ignore
        this.items = getData();
      }

      // api call
      getOurPartnersApi().then((res) => {
        // @ts-ignore
        this.items = res;
        setData(res);
      });
    },

    addOurPartner() {
      createOurPartnerApi(this.item);

      this.getOurPartners();
    },

    updateOurPartner() {
      updateOurPartnerApi(this.item);

      this.getOurPartners();
    },

    activeToggle(id: number, is_active: boolean) {
      deleteOurPartnerApi(id, is_active);

      // fetch new data
      this.getOurPartners();
    },
  },
});
