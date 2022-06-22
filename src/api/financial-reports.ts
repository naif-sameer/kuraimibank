import axios from '@/helpers/axios';
import { FinancialReportType } from '@/types';

export async function getFinancialReportsApi() {
  return (await axios.get('financial-reports')).data.map((item: any) => ({
    ...item,
    is_active: !!item.is_active,

    title: JSON.parse(item.title),
    description: JSON.parse(item.description),
    pdf: `http://localhost:8000/uploads/pdf/${item.pdf}`,
  }));
}

export async function createFinancialReportApi(data: FinancialReportType) {
  let formData = new FormData();

  formData.append('title', JSON.stringify(data.title));
  formData.append('description', JSON.stringify(data.description));
  formData.append('pdf', data.pdf);

  return await axios.post(`financial-reports/create`, formData);
}

export async function updateFinancialReportApi(data: FinancialReportType) {
  let formData = new FormData();

  formData.append('title', JSON.stringify(data.title));
  formData.append('description', JSON.stringify(data.description));
  formData.append('pdf', data.pdf);

  return await axios.post(`/financial-reports/${data.id}/edit`, formData);
}

export async function deleteFinancialReportApi(id: number, is_active: boolean) {
  return await axios.put(`financial-reports/${id}/toggle`, {
    is_active: !is_active,
  });
}
