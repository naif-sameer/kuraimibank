import { defineStore } from 'pinia';
import {
  deleteSocialMediaApi,
  getAboutUs,
  getApplyForServiceData,
  getValuesPrinciplesData,
  getStrategyStatementData,
  getBoardMembersData,
} from '@/api';

export const useWebsiteInfoStore = defineStore({
  id: 'website-info',
  state: () => ({
    aboutUs: { ar: '', en: '' },
    applyForService: { ar: '', en: '' },
    valuesPrinciplesData: { ar: '', en: '' },
    strategyStatementData: { ar: '', en: '' },
    boardMembersData: { ar: '', en: '' },
  }),

  actions: {
    async getWebsiteInfo() {
      // api call
      // getSocialMediaApi().then((res) => (this.item = res));

      getAboutUs().then((res) => (this.aboutUs = res));
      getApplyForServiceData().then((res) => (this.applyForService = res));
      getValuesPrinciplesData().then((res) => (this.valuesPrinciplesData = res));
      getStrategyStatementData().then((res) => (this.strategyStatementData = res));
      getBoardMembersData().then((res) => (this.boardMembersData = res));
      // getContactUsData().then(res => this.contactUsData)
    },

    updateSocialMedia() {
      this.getWebsiteInfo();
    },

    activeToggle(id: number, is_active: boolean) {
      deleteSocialMediaApi(id, is_active);

      // fetch new data
      this.getWebsiteInfo();
    },
  },
});
