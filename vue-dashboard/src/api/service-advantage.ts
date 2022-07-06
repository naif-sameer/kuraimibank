import axios from '@/helpers/axios';
import { ServiceAdvantageType } from '@/types';

export async function getServiceAdvantagesApi() {
  return (await axios.get('service-advantages')).data.map((item: any) => ({
    ...item,
    is_active: !!item.is_active,

    name: item.name,
    icon: `http://localhost:8000/uploads/images/${item.icon}`,
  }));
}

export async function createServiceAdvantageApi(data: ServiceAdvantageType) {
  let formData = new FormData();

  formData.append('name', JSON.stringify(data.name));
  formData.append('service_id', data.service_id);
  formData.append('icon', data.icon);

  return await axios.post(`service-advantages/create`, formData);
}

export async function updateServiceAdvantageApi(data: ServiceAdvantageType) {
  let formData = new FormData();

  formData.append('name', JSON.stringify(data.name));
  formData.append('service_id', data.service_id);

  // add icon if user select new one
  if (typeof data.icon !== 'string') formData.append('icon', data.icon);

  return await axios.post(`/service-advantages/${data.id}/edit`, formData);
}

export async function deleteServiceAdvantageApi(id: number, is_active: boolean) {
  return await axios.put(`service-advantages/${id}/toggle`, {
    is_active: !is_active,
  });
}
