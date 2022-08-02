import axios from '@/helpers/axios';
import { ServicePointType } from '@/types';

export async function getServicePointsApi() {
  return (await axios.get('service-points')).data.data;
}

export async function createServicePointApi(data: ServicePointType) {
  return await axios.post(`service-points`, data);
}

export async function updateServicePointApi(data: ServicePointType) {
  return await axios.put(`/service-points/${data.id}`, data);
}

export async function deleteServicePointApi(id: number, is_active: boolean) {
  return await axios.put(`service-points/${id}/toggle`, { is_active: !is_active });
}
