export type ExchangeRatesType = {
  id: number;
  name: {
    ar: string;
    en: string;
  };
  sale: string | number;
  buy: string | number;
  is_active: boolean;
  updated_at?: string;
};
