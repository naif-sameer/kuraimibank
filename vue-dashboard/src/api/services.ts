import axios from '@/helpers/axios';
import { ServiceType } from '@/types';

export async function getServicesApi() {
  return (await axios.get('services')).data.data;
}

export async function createServiceApi(data: ServiceType) {
  let formData = new FormData();

  formData.append('title', JSON.stringify(data.title));
  formData.append('description', JSON.stringify(data.description));
  formData.append('other_advantage', JSON.stringify(data.other_advantage));
  formData.append('service_conditions', JSON.stringify(data.service_conditions));
  formData.append('service_id', data.service_id);
  formData.append('image', data.image);

  return await axios.post(`services`, formData);
}

export async function updateServiceApi(data: ServiceType) {
  let formData = new FormData();

  formData.append('name', JSON.stringify(data.title));
  formData.append('description', JSON.stringify(data.description));
  formData.append('other_advantage', JSON.stringify(data.other_advantage));
  formData.append('service_conditions', JSON.stringify(data.service_conditions));
  formData.append('service_id', data.service_id);

  // add image if user select new one
  if (typeof data.image !== 'string') formData.append('image', data.image);

  return await axios.post(`/services/${data.id}`, formData);
}

export async function deleteServiceApi(id: number, is_active: boolean) {
  return await axios.put(`services/${id}/toggle`, {
    is_active: !is_active,
  });
}
