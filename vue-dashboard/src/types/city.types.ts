export type CityType = {
  id: number;
  title: {
    ar: string;
    en: string;
  };
  country_id: number;
  is_active: boolean;
  updated_at?: string;
};
