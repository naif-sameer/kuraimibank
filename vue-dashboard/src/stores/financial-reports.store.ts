import { defineStore } from 'pinia';
import { useLocalStorage } from '@/helpers/useLocalStorage';
import { FinancialReportType } from '@/types';
import {
  getFinancialReportsApi,
  createFinancialReportApi,
  updateFinancialReportApi,
  deleteFinancialReportApi,
} from '@/api';
import { useToastStore } from './toast.store';

export const useFinancialReportStore = defineStore({
  id: 'financial-reports',
  state: (): {
    item: FinancialReportType;
    items: Array<FinancialReportType>;
  } => ({
    item: { id: 0, title: { ar: '', en: '' }, pdf: '', is_active: true },
    items: [],
  }),

  actions: {
    resetItem() {
      this.item = { id: 0, title: { ar: '', en: '' }, pdf: '', is_active: true };
    },

    async getFinancialReports() {
      const { getData, setData } = useLocalStorage('financial-reports');

      if (getData().length > 1) {
        // @ts-ignore
        this.items = getData();
      }

      // api call
      await getFinancialReportsApi().then((res) => {
        // @ts-ignore
        this.items = res;
        setData(res);
      });
    },

    async addFinancialReport() {
      useToastStore().addDone();

      createFinancialReportApi(this.item);

      this.getFinancialReports();
    },

    async updateFinancialReport() {
      useToastStore().updatedDone();

      updateFinancialReportApi(this.item);

      this.getFinancialReports();
    },

    async activeToggle(id: number, is_active: boolean) {
      useToastStore().updatedDone();

      deleteFinancialReportApi(id, is_active);

      // fetch new data
      this.getFinancialReports();
    },
  },
});
