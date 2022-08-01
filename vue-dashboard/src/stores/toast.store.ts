import { defineStore } from 'pinia';
import { ToastType } from '@/types';
import { getUniqueID } from '@/helpers/global';

export const useToastStore = defineStore({
  id: 'toast',
  state: (): { item: ToastType; items: Array<ToastType> } => ({
    item: { id: 0, title: '', body: '' },
    items: [],
  }),

  actions: {
    resetItem() {
      this.item = { id: 0, title: '', body: '' };
    },

    makeToast({ body, title, autoHideDelay = 3000, variant = 'primary' }: ToastType) {
      const toastID = getUniqueID();

      this.items.push({ id: toastID, body, title, variant });

      setTimeout(() => (this.items = this.items.filter((item) => item.id !== toastID)), autoHideDelay);
    },

    closeToast(id: number = 0) {
      this.items = this.items.filter((item) => item.id !== id);
    },

    makeSuccessToast(message: string) {
      this.makeToast({
        body: message,
        title: 'success',
        variant: 'success',
      });
    },

    makeServerErrorToast(message: string | null = null) {
      this.makeToast({
        body: message ?? 'check your connection or connect to the support',
        title: 'connection error',
        variant: 'danger',
      });
    },
  },
});
