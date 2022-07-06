import axios from '@/helpers/axios';
import { CityType } from '@/types';

export const getCitiesApi = async () => {
  let { data, status } = await axios.get('cities');

  let items = data.map((item: any) => ({
    ...item,
    name: item.name,
    is_active: !!item.is_active,
  }));

  return { status, items };
};

export const createCityApi = (data: CityType) => axios.post(`cities/create`, data);

export const updateCityApi = (data: CityType) => axios.put(`/cities/${data.id}/edit`, JSON.stringify(data));

export const deleteCityApi = (id: number, is_active: boolean) => {
  return axios.put(`cities/${id}/toggle`, { is_active: !is_active });
};
