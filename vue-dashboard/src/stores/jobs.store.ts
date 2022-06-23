import { defineStore } from 'pinia';
import { useLocalStorage } from '@/helpers/useLocalStorage';
import { JobType } from '@/types';
import { getJobsApi, createJobApi, updateJobApi, deleteJobApi } from '@/api';

export const useJobsStore = defineStore({
  id: 'jobs',
  state: (): {
    item: JobType;
    items: Array<JobType>;
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
      is_active: true,
    },
    items: [],
  }),

  getters: {
    getData: ({ item }) => item,
  },

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
        is_active: true,
      };
    },

    getJobs() {
      const { getData, setData } = useLocalStorage('jobs');

      if (getData().length > 1) {
        // @ts-ignore
        this.items = getData();
      }

      // api call
      getJobsApi().then((res) => {
        // @ts-ignore
        this.items = res;
        setData(res);
      });
    },

    addJob() {
      createJobApi(this.getData);

      this.getJobs();
    },

    updateJob() {
      updateJobApi(this.getData);

      this.getJobs();
    },

    activeToggle(id: number, is_active: boolean) {
      deleteJobApi(id, is_active);

      // fetch new data
      this.getJobs();
    },
  },
});
