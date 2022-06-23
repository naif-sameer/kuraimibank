export type ServicePointType = {
  id: number;

  name: {
    ar: string;
    en: string;
  };
  address: {
    ar: string;
    en: string;
  };
  working_hours: {
    ar: string;
    en: string;
  };
  phone: string;
  second_phone: string;
  city_id: string;

  city?: string;

  is_active: boolean;
  updated_at?: string;
};
