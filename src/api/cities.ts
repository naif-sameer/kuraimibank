import axios from '@/helpers/axios';
import { CityType } from '@/types';

export async function getCitiesApi() {
  return (await axios.get('cities')).data.map((item: any) => ({
    ...item,
    name: JSON.parse(item.name),
    is_active: !!item.is_active,
  }));
}

export async function createCityApi(data: CityType) {
  let formData = new FormData();

  formData.append('name', JSON.stringify(data.name));
  formData.append('country_id', `${data.country_id}`);

  return await axios.post(`cities/create`, formData);
}

export async function updateCityApi(data: CityType) {
  return await axios.put(`/cities/${data.id}/edit`, JSON.stringify(data));
}

export async function deleteCityApi(id: number, is_active: boolean) {
  return await axios.put(`cities/${id}/toggle`, {
    is_active: !is_active,
  });
}
