import axios from '@/helpers/axios';
import { ServicePointType } from '@/types';

export async function getServicePointsApi() {
  return (await axios.get('service-points')).data.map((item: any) => ({
    ...item,
    is_active: !!item.is_active,

    name: item.name,
    address: item.address,
    working_hours: item.working_hours,
    city: JSON.parse(item.city.name),
  }));
}

export async function createServicePointApi(data: ServicePointType) {
  return await axios.post(`service-points/create`, data);
}

export async function updateServicePointApi(data: ServicePointType) {
  return await axios.put(`/service-points/${data.id}/edit`, JSON.stringify(data));
}

export async function deleteServicePointApi(id: number, is_active: boolean) {
  return await axios.put(`service-points/${id}/toggle`, { is_active: !is_active });
}
