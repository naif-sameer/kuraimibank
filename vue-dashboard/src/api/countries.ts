import { HttpCodeEnum } from '@/Enum';
import axios from '@/helpers/axios';
import { useToastStore } from '@/stores/toast.store';
import { CountriesType } from '@/types';

export async function getCountriesApi() {
  const toastStore = useToastStore();

  try {
    let { data, status } = await axios.get('countries');

    if (status === HttpCodeEnum.Ok) {
      toastStore.makeSuccessToast('get countries list successfully');

      let items = data.map((item: any) => ({
        ...item,
        name: item.name,
        is_active: !!item.is_active,
      }));

      return { items };
    }
  } catch (error) {
    toastStore.makeServerErrorToast();
  }

  return { error: true };
}

export async function createCountryApi(data: CountriesType) {
  const toastStore = useToastStore();

  try {
    let formData = new FormData();

    formData.append('name', JSON.stringify(data.name));

    let { status } = await axios.post(`countries/create`, formData);

    if (status === HttpCodeEnum.Ok) toastStore.makeSuccessToast('add new country successfully');
  } catch (error) {
    toastStore.makeServerErrorToast();
  }

  return { error: true };
}

export async function updateCountryApi(country: CountriesType) {
  const toastStore = useToastStore();

  try {
    let { data, status } = await axios.put(`/countries/${country.id}/edit`, JSON.stringify(country));

    if (status === HttpCodeEnum.Ok) toastStore.makeSuccessToast('add new country successfully');
  } catch (error) {
    toastStore.makeServerErrorToast();
  }

  return { error: true };
}

export async function deleteCountryApi(id: number, is_active: boolean) {
  const toastStore = useToastStore();

  return await axios.put(`countries/${id}/toggle`, {
    is_active: !is_active,
  });
}
