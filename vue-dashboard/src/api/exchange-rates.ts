import axios from '@/helpers/axios';
import { ExchangeRatesType } from '@/types';

export async function getExchangeRatesData() {
  return (await axios.get('exchange-rates')).data.data;
}

export async function createExchangeRatesData(data: ExchangeRatesType) {
  return await axios.post(`exchange-rates`, data);
}

export async function updateExchangeRatesData(data: ExchangeRatesType) {
  return await axios.put(`/exchange-rates/${data.id}`, data);
}

export async function deleteExchangeRatesData(id: number, is_active: boolean) {
  return await axios.put(`exchange-rates/${id}/toggle`, {
    is_active: !is_active,
  });
}
