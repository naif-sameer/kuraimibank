export type CityType = {
  id: number;
  name: {
    ar: string;
    en: string;
  };
  country_id: number;
  is_active: boolean;
  updated_at?: string;
};
