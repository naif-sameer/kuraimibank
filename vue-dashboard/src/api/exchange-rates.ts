import axios from '@/helpers/axios';
import { ExchangeRatesType } from '@/types';

export async function getExchangeRatesData() {
  return (await axios.get('exchange-rates')).data.map((item: any) => ({
    ...item,
    name: item.name,
    is_active: !!item.is_active,
  }));
}

export async function createExchangeRatesData(data: ExchangeRatesType) {
  let formData = new FormData();

  formData.append('name', JSON.stringify(data.name));
  formData.append('sale', `${data.sale}`);
  formData.append('buy', `${data.buy}`);

  return await axios.post(`exchange-rates/create`, formData);
}

export async function updateExchangeRatesData(data: ExchangeRatesType) {
  return await axios.put(`/exchange-rates/${data.id}/edit`, JSON.stringify(data));
}

export async function deleteExchangeRatesData(id: number, is_active: boolean) {
  return await axios.put(`exchange-rates/${id}/toggle`, {
    is_active: !is_active,
  });
}
