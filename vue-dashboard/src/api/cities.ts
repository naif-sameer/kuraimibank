import axios from '@/helpers/axios';
import { CityType } from '@/types';

export const getCitiesApi = async () => {
  let { data, status } = await axios.get('cities');

  return { status, items: data.data };
};

export const createCityApi = (data: CityType) => axios.post(`cities`, data);

export const updateCityApi = (data: CityType) => axios.put(`/cities/${data.id}`, JSON.stringify(data));

export const deleteCityApi = (id: number, is_active: boolean) => {
  return axios.put(`cities/${id}/toggle`, { is_active: !is_active });
};
