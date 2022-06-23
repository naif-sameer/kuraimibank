import axios from '@/helpers/axios';
import { MainServiceType } from '@/types';

export async function getMainServicesApi() {
  return (await axios.get('main-services')).data.map((item: any) => ({
    ...item,
    is_active: !!item.is_active,

    name: JSON.parse(item.name),
    image: `http://localhost:8000/uploads/images/${item.image}`,
  }));
}

export async function createMainServiceApi(data: MainServiceType) {
  let formData = new FormData();

  formData.append('name', JSON.stringify(data.name));
  formData.append('link', data.link);
  formData.append('image', data.image);

  return await axios.post(`main-services/create`, formData);
}

export async function updateMainServiceApi(data: MainServiceType) {
  let formData = new FormData();

  formData.append('name', JSON.stringify(data.name));
  formData.append('link', data.link);

  // add image only if user select new one
  if (typeof data.image !== 'string') formData.append('image', data.image);

  return await axios.post(`/main-services/${data.id}/edit`, formData);
}

export async function deleteMainServiceApi(id: number, is_active: boolean) {
  return await axios.put(`main-services/${id}/toggle`, {
    is_active: !is_active,
  });
}
