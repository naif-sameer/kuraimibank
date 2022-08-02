import { defineStore } from 'pinia';
import { useLocalStorage } from '@/helpers/useLocalStorage';
import { JobType } from '@/types';
import { getJobsApi, createJobApi, updateJobApi, deleteJobApi } from '@/api';
import { useToastStore } from './toast.store';

export const useJobsStore = defineStore({
  id: 'jobs',
  state: (): {
    item: JobType;
    items: Array<JobType>;
  } => ({
    item: { id: 0, title: { ar: '', en: '' }, description: { ar: '', en: '' }, is_active: true },
    items: [],
  }),

  actions: {
    resetItem() {
      this.item = { id: 0, title: { ar: '', en: '' }, description: { ar: '', en: '' }, is_active: true };
    },

    async getJobs() {
      const { getData, setData } = useLocalStorage('jobs');

      if (getData().length > 1) {
        // @ts-ignore
        this.items = getData();
      }

      // api call
      await getJobsApi().then((res) => {
        // @ts-ignore
        this.items = res;
        setData(res);
      });
    },

    async addJob() {
      useToastStore().addDone();

      createJobApi(this.item);

      this.getJobs();
    },

    async updateJob() {
      useToastStore().updatedDone();

      updateJobApi(this.item);

      this.getJobs();
    },

    async activeToggle(id: number, is_active: boolean) {
      useToastStore().updatedDone();

      deleteJobApi(id, is_active);

      // fetch new data
      this.getJobs();
    },
  },
});
