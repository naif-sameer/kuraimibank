import axios from '@/helpers/axios';
import { ServicePointType } from '@/types';

export async function getServicePointsApi() {
  return (await axios.get('service-points')).data.map((item: any) => ({
    ...item,
    is_active: !!item.is_active,

    name: JSON.parse(item.name),
    address: JSON.parse(item.address),
    working_hours: JSON.parse(item.working_hours),
  }));
}

export async function createServicePointApi(data: ServicePointType) {
  let formData = new FormData();

  formData.append('name', JSON.stringify(data.name));
  formData.append('address', JSON.stringify(data.address));
  formData.append('working_hours', JSON.stringify(data.working_hours));
  formData.append('phone', data.phone);
  formData.append('second_phone', data.second_phone);
  formData.append('city_id', data.city_id);

  return await axios.post(`service-points/create`, formData);
}

export async function updateServicePointApi(data: ServicePointType) {
  let formData = new FormData();

  formData.append('name', JSON.stringify(data.name));
  formData.append('address', JSON.stringify(data.address));
  formData.append('working_hours', JSON.stringify(data.working_hours));
  formData.append('phone', `${data.phone}`);
  formData.append('second_phone', `${data.second_phone}`);
  formData.append('city_id', data.city_id);

  return await axios.put(`/service-points/${data.id}/edit`, formData);
}

export async function deleteServicePointApi(id: number, is_active: boolean) {
  return await axios.put(`service-points/${id}/toggle`, {
    is_active: !is_active,
  });
}
