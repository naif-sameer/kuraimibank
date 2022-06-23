import axios from '@/helpers/axios';
import { ServiceType } from '@/types';

export async function getServicesApi() {
  return (await axios.get('services')).data.map((item: any) => ({
    ...item,
    is_active: !!item.is_active,

    name: JSON.parse(item.name),
    description: JSON.parse(item.description),
    other_advantage: JSON.parse(item.other_advantage),
    service_conditions: JSON.parse(item.service_conditions),
    image: `http://localhost:8000/uploads/images/${item.image}`,
  }));
}

export async function createServiceApi(data: ServiceType) {
  let formData = new FormData();

  formData.append('name', JSON.stringify(data.name));
  formData.append('description', JSON.stringify(data.description));
  formData.append('other_advantage', JSON.stringify(data.other_advantage));
  formData.append(
    'service_conditions',
    JSON.stringify(data.service_conditions)
  );
  formData.append('category_id', data.category_id);
  formData.append('image', data.image);

  return await axios.post(`services/create`, formData);
}

export async function updateServiceApi(data: ServiceType) {
  let formData = new FormData();

  formData.append('name', JSON.stringify(data.name));
  formData.append('description', JSON.stringify(data.description));
  formData.append('other_advantage', JSON.stringify(data.other_advantage));
  formData.append(
    'service_conditions',
    JSON.stringify(data.service_conditions)
  );
  formData.append('category_id', data.category_id);

  // add image if user select new one
  if (typeof data.image !== 'string') formData.append('image', data.image);

  return await axios.post(`/services/${data.id}/edit`, formData);
}

export async function deleteServiceApi(id: number, is_active: boolean) {
  return await axios.put(`services/${id}/toggle`, {
    is_active: !is_active,
  });
}
