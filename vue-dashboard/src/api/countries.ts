import axios from '@/helpers/axios';
import { CountriesType } from '@/types';

export async function getCountriesApi() {
  return (await axios.get('countries')).data.map((item: any) => ({
    ...item,
    name: JSON.parse(item.name),
    is_active: !!item.is_active,
  }));
}

export async function createCountryApi(data: CountriesType) {
  let formData = new FormData();

  formData.append('name', JSON.stringify(data.name));

  return await axios.post(`countries/create`, formData);
}

export async function updateCountryApi(data: CountriesType) {
  return await axios.put(`/countries/${data.id}/edit`, JSON.stringify(data));
}

export async function deleteCountryApi(id: number, is_active: boolean) {
  return await axios.put(`countries/${id}/toggle`, {
    is_active: !is_active,
  });
}
