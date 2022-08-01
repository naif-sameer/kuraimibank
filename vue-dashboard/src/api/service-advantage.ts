import axios from '@/helpers/axios';
import { ServiceAdvantageType } from '@/types';

export async function getServiceAdvantagesApi() {
  return (await axios.get('service-advantages')).data.data;
}

export async function createServiceAdvantageApi(data: ServiceAdvantageType) {
  return await axios.post(`service-advantages`, data);
}

export async function updateServiceAdvantageApi(data: ServiceAdvantageType) {
  return await axios.post(`/service-advantages/${data.id}`, data);
}

export async function deleteServiceAdvantageApi(id: number, is_active: boolean) {
  return await axios.put(`service-advantages/${id}/toggle`, {
    is_active: !is_active,
  });
}
