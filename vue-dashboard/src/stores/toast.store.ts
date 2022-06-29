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

      // this.$;
    },

    makeToast({ body, title, autoHideDelay = 50300, variant = 'primary' }: ToastType) {
      const toastID = getUniqueID();

      this.items.push({ id: toastID, body, title, variant });

      setTimeout(() => (this.items = this.items.filter((item) => item.id !== toastID)), autoHideDelay);
    },

    closeToast(id: number = 0) {
      this.items = this.items.filter((item) => item.id !== id);
    },
  },
});
