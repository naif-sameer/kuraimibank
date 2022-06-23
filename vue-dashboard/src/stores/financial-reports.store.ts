import { defineStore } from 'pinia';
import { useLocalStorage } from '@/helpers/useLocalStorage';
import { FinancialReportType } from '@/types';
import {
  getFinancialReportsApi,
  createFinancialReportApi,
  updateFinancialReportApi,
  deleteFinancialReportApi,
} from '@/api';

export const useFinancialReportStore = defineStore({
  id: 'financial-reports',
  state: (): {
    item: FinancialReportType;
    items: Array<FinancialReportType>;
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
      pdf: '',

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
        pdf: '',

        is_active: true,
      };
    },

    getFinancialReports() {
      const { getData, setData } = useLocalStorage('financial-reports');

      if (getData().length > 1) {
        // @ts-ignore
        this.items = getData();
      }

      // api call
      getFinancialReportsApi().then((res) => {
        // @ts-ignore
        this.items = res;
        setData(res);
      });
    },

    addFinancialReport() {
      createFinancialReportApi(this.item);

      this.getFinancialReports();
    },

    updateFinancialReport() {
      updateFinancialReportApi(this.item);

      this.getFinancialReports();
    },

    activeToggle(id: number, is_active: boolean) {
      deleteFinancialReportApi(id, is_active);

      // fetch new data
      this.getFinancialReports();
    },
  },
});
