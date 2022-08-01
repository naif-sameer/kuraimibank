import axios from '@/helpers/axios';
import { FinancialReportType } from '@/types';

export async function getFinancialReportsApi() {
  return (await axios.get('financial-reports')).data.data;
}

export async function createFinancialReportApi(data: FinancialReportType) {
  let formData = new FormData();

  formData.append('title', JSON.stringify(data.title));
  formData.append('pdf', data.pdf);

  return await axios.post(`financial-reports`, formData);
}

export async function updateFinancialReportApi(data: FinancialReportType) {
  let formData = new FormData();

  formData.append('title', JSON.stringify(data.title));
  formData.append('pdf', data.pdf);

  return await axios.post(`/financial-reports/${data.id}`, formData);
}

export async function deleteFinancialReportApi(id: number, is_active: boolean) {
  return await axios.put(`financial-reports/${id}/toggle`, {
    is_active: !is_active,
  });
}
